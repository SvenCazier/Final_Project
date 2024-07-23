<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sven Cazier</title>
    <link rel="alternate" hreflang="en" href="{{ url('') }}/en" />
    <link rel="alternate" hreflang="nl" href="{{ url('') }}/nl" />
    <link rel="alternate" hreflang="fr" href="{{ url('') }}/fr" />
    <link rel="alternate" hreflang="es" href="{{ url('') }}/es" />
    <link rel="alternate" hreflang="x-default" href="{{ url('') }}/en" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#5a07ff">
    <meta name="theme-color" content="#ffffff">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <x-nav.nav class="expanded" />
    </header>
    <main class="main-content">
        <x-layouts.home />
        <x-layouts.about />
        <x-layouts.projects :data="$projects" name="project" />
        <x-layouts.contact />
    </main>
    <x-layouts.footer />
</body>

</html>
