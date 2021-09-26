<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Курсовой проект</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Зарегестрироваться</a>
                @endif
            @endauth
        </div>
    @endif
    <div>
        <p class="header-text">Курсовой проект по дисциплине: Веб-программирование</p>
        <p class="description-text">на тему: «Разработка веб – приложения коллекции монет/марок»</p>
        <p class="description-text">Автор: Шарангия Игорь Сергеевич</p>
        <p class="description-text">Студент: 3 курса</p>
        <p class="description-text">Группы: 19-ЗКБс-ПР1</p>
        <p class="description-text">Github проекта: <a href="https://github.com/Igor-kor/web-prog-kp">https://github.com/Igor-kor/web-prog-kp</a>
        </p>
    </div>
</div>
</body>
</html>
