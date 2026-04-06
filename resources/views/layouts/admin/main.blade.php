<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Aplikasi Monitoring Cargo</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset("assets/dashboard/bootstrap-4.3.1-dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/dashboard/fontawesome-free-5.7.2-web/css/all.css") }}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <style>
    /* nunito-400 - latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        src: url('assets/dashboard/Nunito/static/Nunito-Regular.ttf') format('truetype');
        font-display: swap;
        }

        /* nunito-600 - latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        src: url('assets/dashboard/Nunito/static/Nunito-SemiBold.ttf') format('truetype');
        font-display: swap;
        }

        /* nunito-700 - latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        src: url('assets/dashboard/Nunito/static/Nunito-Bold.ttf') format('truetype');
        font-display: swap;
        }

    </style>
    <link href="{{ asset("assets/dashboard/bootstrap-5.3.2-dist/css/bootstrap.min.css") }}" rel="stylesheet">

  @stack('styles')
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <!-- Navbar -->
            @include('layouts.admin.partials.navbar')

            <!-- Sidebar -->
            @include('layouts.admin.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Aplikasi Monitoring Cargo</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('layouts.admin.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/dashboard/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset("assets/dashboard/floating-ui-1.14.5/dist/umd/popper.min.js") }}">
    </script>
    <script src="{{ asset("assets/dashboard/bootstrap-4.3.1-dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/jquery.nicescroll-3.7.6/dist/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset('assets/dashboard/moment-2.24.0/moment.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset("assets/dashboard/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js") }}"></script>
  @stack('scripts')
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>


</body>

</html>
