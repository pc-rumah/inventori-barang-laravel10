<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

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
        $data = Barang::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get(['nama_barang', 'gambar', 'jumlah', 'kondisi', 'created_at']);
        return $data;
    }

    // Menambahkan header pada file Excel
    public function headings(): array
    {
        return [
            'Nama Barang',
            'Gambar',
            'Stok',
            'Kondisi',
            'Tanggal Dibuat',
        ];
    }
}
