@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <a class="btn btn-primary m-1" href="{{ route('barang.create') }}">Tambah Barang</a>
                        </div>
                        <div class="col-lg-8">
                            {{ $barang->links() }}
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
                                            <td class="border-bottom-0">
                                                <a href="{{ route('barang.edit', $item) }}"
                                                    class="btn btn-warning mb-2">Edit</a>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                                    data-bs-target="#alert-hapus-barang{{ $item->id }}">Delete</button>

                                                {{-- pop up hapus data barang --}}
                                                @if (isset($item))
                                                    <div class="modal fade" id="alert-hapus-barang{{ $item->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="confirmDelete{{ $item->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="confirmDelete{{ $item->id }}Label">
                                                                        Konfirmasi Hapus Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus Data ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form id="deleteForm"
                                                                        action="{{ route('barang.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- pop up hapus data barang --}}
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
