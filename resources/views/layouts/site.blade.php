<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="n0K3asBJjJj2Qb0tg4g5JRTRXN0msBhviA_LWn26gbs" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">


    <meta name="description" content="@yield('meta_description', 'Reunion web & marketing agencija se bavi dizajnom i izradom web stranica, web aplikacija, kao i digitalnlim marketingom. Vezane usluge su oglašavanje (Google ads, Facebook & Instagram ads), kao i profesionalna fotografija.')">
    <meta name="keywords" content="@yield('meta_keywords', 'marketing agencija mostar')">
    <meta name="author" content="@yield('meta_author', 'Ramiz Maksumić')">
    <meta name="publisher" content="@yield('meta_publisher', 'Reunion web & marketing agencija')">

    <!-- OpenGraph -->
    <meta property="og:title" content="@yield('og_title', 'Reunion agencija')">
    <meta property="og:description" content="@yield('og_description', 'Web i marketing rješenja')">
    <meta property="og:image" content="@yield('og_image', asset('images/default-og.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- canonical -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <link href="/assets/fonts/fontawesome/css/all.min.css" rel="stylesheet">


    <title>@yield('title', 'Reunion web & marketing agencija Mostar')</title>

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