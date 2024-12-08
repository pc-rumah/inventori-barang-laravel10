@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah User</h5>
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
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label">Nama User</label>
                                    <input type="text" name="nama_user" class="form-control" id="nama_user"
                                        aria-describedby="nama_userHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="role_user" class="form-label">Role User</label>
                                    <select class="form-select" name="role_user" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
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
