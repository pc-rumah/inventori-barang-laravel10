@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            @if ($errors->updatePassword->any())
                <div id="alert-error" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->updatePassword->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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

            {{-- @php
                dd(session()->all());
            @endphp --}}

            @if (session('status') === 'profile-updated')
                <div id="alert-sukses" class="alert alert-success">Berhasil Meng-Update Profile</div>
            @endif
            @if (session('status') === 'password-updated')
                <div id="alert-sukses" class="alert alert-success">Berhasil Meng-Update Password</div>
            @endif

            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @if (Auth::user()->hasRole('admin'))
            @else
                @include('profile.partials.delete-user-form')
            @endif
        </div>
    </div>
@endsection
