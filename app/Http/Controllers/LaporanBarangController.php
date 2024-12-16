<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;


class LaporanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::paginate(10);
        return view('laporan.index', compact('barang'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        return Excel::download(new BarangExport($request->start_date, $request->end_date), 'laporan_barang.xlsx');
    }
}
