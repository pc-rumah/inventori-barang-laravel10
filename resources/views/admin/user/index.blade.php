@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body p-4">
                    <a class="btn btn-primary m-1" href="{{ route('user.create') }}">Tambah User</a>
                    @if (Session::has('success'))
                        <div id="alert-sukses" class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama User</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isEmpty())
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori Belum Ada</h6>
                                    </td>
                                @else
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $item->name }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                @if ($item->roles->isNotEmpty())
                                                    {{ $item->roles->first()->name }}
                                                    <!-- Jika ada banyak role -->
                                                @else
                                                    Tidak ada role
                                                @endif
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
                                                                        Konfirmasi Hapus User
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus User
                                                                    {{ $item->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form id="deleteForm-{{ $item->id }}"
                                                                        action="{{ route('user.destroy', $item->id) }}"
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
