<nav class="sticky">
    <h3><a href="{{ url('') }}/{{ app()->getLocale() }}">Admin</a></h3>
    <ul>
        @auth
            <li>
                <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/logout">
                    <button>Logout</button>
                </x-forms.form>
            </li>
        @endauth
    </ul>
</nav>
