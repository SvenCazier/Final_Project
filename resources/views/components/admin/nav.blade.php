<nav class="sticky">
    <h3><a href="{{ url('') }}/{{ app()->getLocale() }}">Admin</a></h3>
    <ul>
        <li>
            <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/logout">
                <x-button style="text">Logout</x-button>
            </x-forms.form>
        </li>
    </ul>
</nav>
