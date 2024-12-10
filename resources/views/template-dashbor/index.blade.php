<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashbor/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('dashbor/assets/css/styles.min.css') }}" />
    <style>
        .card-img {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        {{-- sidebar --}}
        @include('template-dashbor.sidebar')
        {{-- sidebar --}}


        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('template-dashbor.header')
        </div>
        <!--  Main wrapper -->

        @yield('content')
    </div>

    <script src="{{ asset('dashbor/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashbor/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashbor/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashbor/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashbor/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashbor/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('dashbor/assets/js/dashboard.js') }}"></script>
    <script src="https://kit.fontawesome.com/6eb7d2936c.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertMessage = document.getElementById('alert-sukses');
            if (alertMessage) {
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertMessage = document.getElementById('alert-error');
            if (alertMessage) {
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
    <script>
        function setDeleteAction(url) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = url;
        }
    </script>

</body>

</html>
