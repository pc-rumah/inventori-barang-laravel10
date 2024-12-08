@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Barang</h5>
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
                            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                        aria-describedby="nama_barangHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Gambar Barang</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar"
                                        aria-describedby="gambarHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                                    <input type="number" name="jumlah" class="form-control" id="jumlah"
                                        aria-describedby="jumlahHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Kategori Barang</label>
                                    <select class="form-select" name="kategori_id" aria-label="Default select example">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Kondisi Barang</label>
                                    <select class="form-select" name="kondisi" aria-label="Default select example">
                                        <option selected>Pilih Kondisi</option>
                                        <option value="Prima">Prima</option>
                                        <option value="Cukup Baik">Cukup Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
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
