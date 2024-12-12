<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BarangExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $startDate;
    protected $endDate;

    // Konstruktor untuk menerima parameter
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        // Ambil data dan ubah format `created_at`
        return Barang::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get(['nama_barang', 'jumlah', 'kondisi', 'created_at'])
            ->map(function ($item) {
                return [
                    'nama_barang' => $item->nama_barang,
                    'kategori' => $item->kategori_id,
                    'jumlah' => $item->jumlah,
                    'kondisi' => $item->kondisi,
                    'created_at' => Carbon::parse($item->created_at)->format('d-m-Y'), // Format Tanggal-Bulan-Tahun
                ];
            });
    }

    // Menambahkan header pada file Excel
    public function headings(): array
    {
        return [
            'Nama Barang',
            'Kategori',
            'Stok',
            'Kondisi',
            'Tanggal Dibuat',
        ];
    }

    // public function drawings()
    // {
    //     $drawings = [];
    //     $barangs = Barang::whereBetween('created_at', [$this->startDate, $this->endDate])->get();

    //     foreach ($barangs as $key => $barang) {
    //         $drawing = new Drawing();
    //         $drawing->setName('Gambar');
    //         $drawing->setDescription('Gambar Barang');
    //         $drawing->setPath(public_path('/storage/' . $barang->gambar)); // Ubah sesuai dengan path gambar Anda
    //         $drawing->setHeight(100); // Atur tinggi gambar
    //         $drawing->setCoordinates('B' . ($key + 2)); // Kolom 'B' mulai dari baris ke-2 (sesuai data Anda)
    //         $drawings[] = $drawing;
    //     }

    //     return $drawings;
    // }
}
