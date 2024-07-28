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
    <main class="login">
        <section class="content-grid">
            <x-forms.form method="POST" action="/{{ app()->getLocale() }}/login">
                <x-forms.input label="{{ __('general_form.email') }}" name="email" type="text" />
                <x-forms.input label="{{ __('general_form.password') }}" name="password" type="password" />
                <x-forms.error :error="$errors->first('invalid_credentials')" />
                <x-button>{{ __('admin.login') }}</x-button>
            </x-forms.form>
        </section>
    </main>
</body>

</html>
