<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="n0K3asBJjJj2Qb0tg4g5JRTRXN0msBhviA_LWn26gbs" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Reunion web & marketing agencija se bavi dizajnom i izradom web stranica, web aplikacija, kao i digitalnlim marketingom. Vezane usluge su oglašavanje (Google ads, Facebook & Instagram ads), kao i profesionalna fotografija.">
    <link href="/assets/fonts/fontawesome/css/all.min.css" rel="stylesheet">


    <title>{{ config('app.name', 'Reunion web & marketing agencija Mostar') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-x-hidden">
    <div class="min-h-screen flex flex-col">
        {{-- ovdje ide tvoj header/navbar --}}
        @include('partials.nav')

        <main class="flex-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>

</html>