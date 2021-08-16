<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Swapi') }}</title>

    <!-- Scripts -->
{{--    </script>--}}

<!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Styles -->
    @stack('style')
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

</head>
<body>
<section class="contianer-fluid bg-purple d-flex justify-content-center align-items-center">
    <div class="dashboard">
        <div class="admin-div">
            <div class="admin-profile">
                <img src="{{asset('image/admin.png')}}" alt="" style="width: 5em" />
                <h4>Said</h4>
            </div>
            <div class="admin-side">
                <div class="links-div">
                    <div class="links">
                        <i class="fas fa-users"></i>
                        <a href="{{ route('admin.index') }}" class="a-links">Users</a>
                    </div>
                    <div class="links">
                        <i class="fas fa-inbox"></i>
                        <a href="{{ route('admin.pagePost') }}" class="a-links">Posts</a>
                    </div>
                    <div class="links">
                        <i class="fas fa-flag"></i>
                        <a href="{{ route('admin.pageReport') }}" class="a-links">Reports</a>
                    </div>
                    <div class="links">
                        <i class="fas fa-envelope"></i>
                        <a href="{{ route('admin.pageMessage') }}" class="a-links">Message</a>
                    </div>
                </div>

                    <form action="{{ route('logout') }}" class="LogOut" method="POST">
                        @csrf
                        <button style="background:transparent; border:none;">
                            <img src="{{asset('image/logout.svg')}}" alt="" style="width: 25px; margin-left:20px" />
                        </button>
                        <a href="{{ route('home') }}" class="a-LogOut"><img src="{{asset('image/house.svg')}}" alt="" style="width: 25px; margin-left:10px" /></a>
                    </form>
            </div>
        </div>

        <div class="content-side">
            <!-- <h1>Manage section</h1> -->
            <div class="stats-div">
                <div class="stats">
                    <span>75</span>
                    <h4>Users</h4>
                </div>
                <div class="stats">
                    <span>67</span>
                    <h4>Posts</h4>
                </div>
                <div class="stats">
                    <span>10</span>
                    <h4>Reports</h4>
                </div>
                <div class="stats">
                    <span>30</span>
                    <h4>Messages</h4>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</section>









<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
