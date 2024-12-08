@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Sistem</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fab fa-chrome"></i>
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $browser }}</h5>
                            <h6 class="text-muted mb-0">Browser</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fab fa-hashtag"></i>
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $browserVersion }}</h5>
                            <h6 class="text-muted mb-0">Browser Version</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $platform }}</h5>
                            <h6 class="text-muted mb-0">Operating System</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $platformVersion }}</h5>
                            <h6 class="text-muted mb-0">Version System</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
