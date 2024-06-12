<nav id="navbar">
    <h3><a href="#home">Sven Cazier</a></h3>
    <ul id="navMain" class="nav__main">
        <li><a href="#about">{{ __('nav.about') }}</a></li>
        <li><a href="#projects">{{ __('nav.projects') }}</a></li>
        <li><a href="#contact">{{ __('nav.contact') }}</a></li>
        <li>
            <ul class="nav__locale">
                <li>{{ app()->getLocale() }}</li>
                @foreach (App\Enums\Locale::values() as $locale)
                    @if ($locale !== app()->getLocale())
                        <li>
                            <a class="locale-link"
                                aria-label="{{ __('locales.labelText') }} {{ __(App\Enums\Locale::getFullLanguageName($locale)) }}"
                                href="/{{ $locale }}">{{ __($locale) }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
    <div id="navHamburger" class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
