@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Barang</h5>
                    @if ($errors->any())
                        <div id="alert-error" class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('kategori.update', $kategori) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
                                        class="form-control" id="nama_kategori" aria-describedby="nama_kategoriHelp">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
