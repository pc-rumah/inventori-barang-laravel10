<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="card-title fw-semibold mb-4">Profile Update</h5>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" value="{{ old('name', $user->name) }}" id="name"
                            name="name" aria-describedby="nameHelp">
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ old('email', $user->email) }}"
                            name="email" id="email">
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                    Your email address is unverified.

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        A new verification link has been sent to your email address
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
