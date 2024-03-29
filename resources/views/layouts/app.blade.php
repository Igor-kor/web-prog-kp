<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    @if (Auth::check())
        <meta name="user_id" content="{{ Auth::user()->id }}"/>
    @endif

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                @auth
                    <x-nav-link :href="route('coins')" :active="request()->routeIs('coins')">
                        {{ __('Coins') }}
                    </x-nav-link>
                    <x-nav-link :href="route('new_coin')" :active="request()->routeIs('new_coin')">
                        {{ __('New Coin') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mycollectcoin')" :active="request()->routeIs('mycollectcoin')">
                        {{ __('My Coins Colection') }}
                    </x-nav-link>

                    <x-nav-link :href="route('marks')" :active="request()->routeIs('marks')">
                        {{ __('Marks') }}
                    </x-nav-link>
                    <x-nav-link :href="route('new_mark')" :active="request()->routeIs('new_mark')">
                        {{ __('New Mark') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mycollectmark')" :active="request()->routeIs('mycollectmark')">
                        {{ __('My Marks Colection') }}
                    </x-nav-link>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
</nav>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
