<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/admin_css/style.css') }}">
    <title>@yield('title', 'Your App Name')</title>
</head>
<body>
    <div class="container">
        <nav class="menu">
            <div class="logo-container">
            <img src="{{ asset('assets/images/logo-manji.png') }}" alt="Example Image">
            <div class="logo-label">
                <p>Админ панел</p>
                <h3>ООУ Петар Поп Арсов</h3>
            </div>
        </div>
            <div class="menu-container">
                <a href="/admin">Дома</a>
                <a href="/admin/news">Новости</a>    
                <a href="/admin/gallery">Галерија</a>
                <a href="/admin/erasmus">Erasmus+</a>
                <a href="/admin/documents">Документи</a>
                <a href="/admin/prvacinja">Првачиња</a>
                <a href="/admin/paralelki">Паралелки</a>
                <a href="/admin/projects">Пројекти</a>
                <a href="{{route('activities.index')}}">Активности</a>
                <a href="{{route('public.procurements.index')}}">Јавни набавки</a>
            </div>
        </nav>

        <main class="content">
            <form method="post" class="logout" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Одјави се</button>
            </form>
            
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/adminScript.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</body>
</html>