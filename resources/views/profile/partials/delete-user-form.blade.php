<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Delete Account</h5>
        <div class="card">
            <div class="card-body">


                <div class="mb-3">
                    <p>Once your account is deleted, all of its resources and data will be permanently deleted.
                        Before deleting your account, please download any data or information that you wish to
                        retain.</p>
                </div>
                <div class="mb-3">
                    <button id="confirmDeleteAccount" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#alert-hapus-account">Delete</button>
                </div>

                <div class="modal fade" id="alert-hapus-account" tabindex="-1" aria-labelledby="confirmDeleteAccount"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteAccount">
                                    Konfirmasi Hapus Account
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus Account ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form id="confirmDeleteAccount" action="{{ route('profile.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Current
                                            Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            aria-describedby="passwordHelp">
                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                    </div>

                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
