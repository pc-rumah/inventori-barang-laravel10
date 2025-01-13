<x-guest-layout>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div>
                                <input type="email" id="email" class="form-control"
                                    value="{{ old('email', $request->email) }}" placeholder="Email" name="email"
                                    required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="passwordHelp" placeholder="Password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <input type="password" class="form-control" id="update_password_password_confirmation"
                                    name="password_confirmation"
                                    aria-describedby="update_password_password_confirmationHelp"
                                    placeholder="Confirm Password">

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
