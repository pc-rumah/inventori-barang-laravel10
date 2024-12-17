@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body p-4">
                    <a class="btn btn-primary m-1" href="{{ route('kategori.create') }}">Tambah Kategori</a>
                    @if (Session::has('success'))
                        <div id="alert-sukses" class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div id="alert-error" class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('error'))
                        <div id="alert-error" class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @php
                        // dd(session()->all());
                    @endphp
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori</h6>
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
                                @if ($kategori->isEmpty())
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori Belum Ada</h6>
                                    </td>
                                @else
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->nama_kategori }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <a href="{{ route('kategori.edit', $item) }}"
                                                    class="btn btn-warning mb-2">Edit</a>
                                            </td>
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                                    data-bs-target="#alert-hapus-kategori{{ $item->id }}">
                                                    Hapus
                                                </button>

                                                {{-- pop up hapus data kategori --}}
                                                @if (isset($item))
                                                    <div class="modal fade" id="alert-hapus-kategori{{ $item->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="confirmDelete{{ $item->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="confirmDeleteModalLabel-{{ $item->id }}">
                                                                        Konfirmasi Hapus Kategori
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus kategori ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form id="deleteForm-{{ $item->id }}"
                                                                        action="{{ route('kategori.destroy', $item->id) }}"
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
                                                {{-- pop up hapus data kategori --}}
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
