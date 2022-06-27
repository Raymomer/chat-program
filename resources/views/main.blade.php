<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Vue</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/vant@2.12/lib/index.css" />
    <script src="https://unpkg.com/vue@2.6/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vant@2.12/lib/vant.min.js"></script>



</head>

<body>
    <div id="app">
        {{-- <main class="py-3">
            <example-component></example-component>
        </main> --}}
        <login-component></login-component>
        {{-- {{ $content }} --}}
    </div>

</body>

</html>
