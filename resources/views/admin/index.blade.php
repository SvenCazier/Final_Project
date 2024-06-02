<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin@Sven Cazier</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <x-admin.nav />
    </header>
    <main>
        <x-tables.inbox :tableData="$submissions" />
    </main>
</body>

</html>
