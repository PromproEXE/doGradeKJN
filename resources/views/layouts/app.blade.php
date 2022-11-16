<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- CUSTOM BOOTSTRAP -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- CSS --}}
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('js/all.js')}}"></script>
    
    {{-- VUE3 --}}
    <script src="https://unpkg.com/vue@3"></script>

    {{-- AXIOS --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- LODASH --}}
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js" integrity="sha256-qXBd/EfAdjOA2FGrGAG+b3YBn2tn5A6bhz+LSgYD96k=" crossorigin="anonymous"></script>

    @yield('embed')
</head>
<body>
    <div id="vue-wrap">
        @include('layouts.navbar_frontend')

        <main class="mb-3">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
    <script>
        @yield('script')
    </script>
</body>
</html>
