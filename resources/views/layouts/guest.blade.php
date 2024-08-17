<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tape quiz admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/nucleo-icons.css') }}">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            {{ $slot }}
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url({{ asset('images/tree.jpg') }}); background-position: center;
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-3"></span>
                                <p class="text-white position-relative"><span class="text-3xl">"</span>And today, in studying, I have written down many Scriptures so you can study It. And also…And the tapes will reveal much of It, as you study.
                                    And there is so many things!</p>
                                 <h4 class="mt-5 text-white font-weight-bolder position-relative">63-0318 - The First Seal</h4>
{{--                                <p>Rev. William Marrion Branham</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('resources/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('resources/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('resources/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('resources/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('resources/js/plugins/jkanban/jkanban.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('resources/js/argon-dashboard.min.js?v=2.0.5') }}"></script>
    </body>
</html>
