<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Game On!') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #DBB350;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #DBD333;
        }

        nav a {
            color: #fff;
        }

        nav a:hover {
            color:rgb(0, 0, 0);
        }

        footer a {
            text-decoration: none;
        }

        footer p {
            margin-top: 10px;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin-top: 100px;
            text-align: center;
        }

        .game-logo {
            height: 50px;
            margin-right: 20px;
        }

        .footer-links {
            color: #fff;
        }

        .footer-links:hover {
            color: #FFFAE5;
        }

        .footer {
            margin-top: 20px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
