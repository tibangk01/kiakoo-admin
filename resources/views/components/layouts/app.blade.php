<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau De Bord | {{ config('app.name' ?? 'KIAKOO') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminLte/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminLte/css/datatable-custom.css') }}">


    @livewireStyles

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">

            <img class="animation__shake" src="{{ asset('adminLte/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">

        </div>

        <x-dashboard.navigation />

        <x-dashboard.side-bar />

        <div class="content-wrapper">

            <x-dashboard.content-header />

            <section class="content">

                <div class="container-fluid">

                    {{ $slot }}

                </div>

            </section>

        </div>

        <footer class="main-footer">

            <strong>&copy; {{ date('Y') }} <a class="text-info"
                    href="#">{{ config('app.name') ?? 'KIAKOO' }}</a></strong> | <a class="text-info"
                target="_blank" href="#">ww.kiakoo.xyz</a>

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1
            </div>

        </footer>

        <aside class="control-sidebar control-sidebar-dark"></aside>

    </div>

    <script src="{{ asset('adminLte/plugins/jquery/jquery.min.js') }}"></script>
    <script src={{ asset('adminLte/plugins/jquery-ui/jquery-ui.min.js') }}></script>
    <script src={{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('adminLte/plugins/select2/js/select2.full.min.js') }}"></script>


    <script src="{{ asset('adminLte/plugins/moment/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src={{ asset('adminLte/plugins/summernote/summernote-bs4.min.js') }}></script>

    <script src={{ asset('adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>

    <script src={{ asset('adminLte/js/adminlte.min.js') }}></script>

    <script src="{{ asset('adminLte/js/custom.js') }}"></script>

    <script src="{{ asset('adminLte/js/datetimepicker.js') }}"></script>
    <script src="{{ asset('adminLte/js/select2.js') }}"></script>
    <script src="{{ asset('adminLte/js/summernote.js') }}"></script>
    <script src="{{ asset('adminLte/js/image-preview.js') }}"></script>
    {{-- <script src="{{ asset('adminLte/js/datatable.js') }}"></script> --}}
    <script>
        $(".dataTable").DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Tout"],
            ],
            language: {
                url: "{{ asset('adminLte/json/French.json') }}"
            },
        });
    </script>

    @livewireScripts
</body>
</body>

</html>
