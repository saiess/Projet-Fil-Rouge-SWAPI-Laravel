<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Swapi') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/FAQ.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/loader.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/nav.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/slide.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/main.js') }}" defer></script>--}}
{{--    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>--}}
{{--    <script src="{{ asset('js/aos-master/dist/aos.js') }}"></script>--}}
{{--    <script>--}}
{{--        AOS.init();--}}
{{--    </script>--}}

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Styles -->
    @stack('style')
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

</head>
<body onload="loader()">
<!-- loader  -->
<div class="loadergif">
    <img src="{{asset('image/load.svg')}}" alt="#" />
</div>


@yield('content')



<script src="{{ asset('js/FAQ.js') }}" defer></script>
<script src="{{ asset('js/loader.js') }}" defer></script>
<script src="{{ asset('js/nav.js') }}" defer></script>
<script src="{{ asset('js/slide.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
