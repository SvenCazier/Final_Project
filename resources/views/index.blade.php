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
