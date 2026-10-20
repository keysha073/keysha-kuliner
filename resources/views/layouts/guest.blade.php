<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Keysha Kuliner')</title>

    <link href="{{ asset('guest/Chefer/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('guest/Chefer/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('guest/Chefer/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('guest/Chefer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/Chefer/assets/js/main.js') }}"></script>
</body>
</html>