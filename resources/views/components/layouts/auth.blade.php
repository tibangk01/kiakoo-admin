<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') ?? 'Kiaokoo' }} | Connexion</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminLte/css/adminlte.min.css') }}">

</head>

<body class="hold-transition login-page">


    {{ $slot }}

    <script src="{{ asset('adminLte/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>

    <script src="{{ asset('adminLte/js/adminlte.min.js') }}"></script>

</body>

</html>
