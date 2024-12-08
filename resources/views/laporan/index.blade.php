@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body p-4">
                    <a class="btn btn-primary m-1" href="{{ route('barang.create') }}">Export Excel</a>
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
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
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
                                                <img style="w-75" src="{{ asset('/storage/' . $item->gambar) }}"
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
