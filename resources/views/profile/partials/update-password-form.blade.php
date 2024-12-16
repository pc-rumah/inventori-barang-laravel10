<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">
                <h5 class="card-title fw-semibold mb-4">Password Update</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="update_password_current_password"
                            name="current_password" aria-describedby="current_passwordHelp">
                        <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password" id="update_password_password"
                            aria-describedby="update_password_passwordHelp">
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="update_password_password_confirmation"
                            name="password_confirmation" aria-describedby="update_password_password_confirmationHelp">
                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
