<nav class="sticky">
    <h3><a href="{{ url('') }}/{{ app()->getLocale() }}">Admin</a></h3>
    @auth
        <li>
            <x-forms.form method="DELETE" action="/{{ app()->getLocale() }}/logout">
                <button>{{ __('admin.logout') }}</button>
            </x-forms.form>
        </li>
    @endauth
    </ul>
</nav>
