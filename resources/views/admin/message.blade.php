<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin@Sven Cazier</title>
    @vite(['resources/sass/app.scss', 'resources/js/admin.js'])
</head>

<body>
    <header>
        <x-admin.nav />
    </header>
    <main>
        <section class="content-grid">
            <x-cards.message :messageData="$message" />
        </section>
    </main>
</body>

</html>
