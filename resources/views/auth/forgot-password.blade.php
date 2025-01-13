<x-guest-layout>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h3 class="heading-section">Forgot your password? No problem. Just let us know your email address and
                        we will email you a password reset link that will allow you to choose a new one. 😎👌🗿🔥</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form action="{{ route('password.email') }}" method="POST" class="signin-form">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="Email"
                                    name="email" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <button type="submit" class="form-control btn btn-primary submit px-3">Email Password Reset
                                Link</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
