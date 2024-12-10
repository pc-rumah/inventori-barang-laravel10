@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body p-4">
                    <a class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#export-excel">Export Excel</a>
                    <div class="modal fade" id="export-excel" tabindex="-1" aria-labelledby="export-excel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="export-excel">
                                        Export Data</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('laporan.export') }}" method="GET">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="start_date">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="end_date">Tanggal Akhir</label>
                                                <input type="date" name="end_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="submit" class="btn btn-success">Export</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (Session::has('success'))
                        <div id="alert-sukses" class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Gambar</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jumlah</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kondisi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($barang->isEmpty())
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">barang Belum Ada</h6>
                                    </td>
                                @else
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->nama_barang }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <img style="" src="{{ asset('/storage/' . $item->gambar) }}"
                                                    class="card-img" alt="{{ $item->nama_barang }}">
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->jumlah }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->kategori->nama_kategori }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    @if ($item->kondisi == 'Prima')
                                                        <span class="badge bg-success">Prima</span>
                                                    @elseif ($item->kondisi == 'Cukup Baik')
                                                        <span class="badge bg-warning">Cukup Baik</span>
                                                    @elseif ($item->kondisi == 'Rusak')
                                                        <span class="badge bg-danger">Rusak</span>
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->created_at->format('d-m-Y') }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
