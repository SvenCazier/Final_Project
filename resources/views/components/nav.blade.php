<nav id="navbar">
    <h3><a href="#home">Sven Cazier</a></h3>
    <ul class="nav__main">
        <li><a href="#about">{{ __('nav.about') }}</a></li>
        <li><a href="#projects">{{ __('nav.projects') }}</a></li>
        <li><a href="#contact">{{ __('nav.contact') }}</a></li>
        <li>
            <ul class="nav__locale">
                @foreach (App\Enums\Locale::values() as $locale)
                    <li>
                        <a href="#">{{ __($locale) }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
