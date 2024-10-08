<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilgrim EST - Find Your Desired Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Jura', sans-serif;
            background-color: #000;
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #4CAF50;
        }
        .nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }
        .nav .active {
            color: #4CAF50;
        }
        .main-content {
            display: flex;
            flex-grow: 1;
        }
        .left-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 5%;
        }
        .right-side {
            flex: 1;
            background-image: url('{{ asset('images/property.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 4vw;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">Pilgrim EST</div>
        <nav class="nav">
            <a href="{{ url('/?lang=lv') }}">LAT</a>
            <a href="{{ url('/?lang=en') }}" class="active">ENG</a>
            <a href="{{ url('/about') }}">About</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
            @endif
        </nav>
    </header>
    
    <main class="main-content">
        <div class="left-side">
            <h1>FIND<br>YOUR<br>DESIRED<br>PROPERTY</h1>
        </div>
        <div class="right-side"></div>
    </main>

    <footer class="footer">
        <p>Made with love from Latvia &lt;3</p>
        <p>All rights reserved. © {{ date('Y') }} Pilgrim Estate</p>
    </footer>
</body>
</html>