<nav id="navbar">
    <h3><a href="#home">Sven Cazier</a></h3>
    <ul id="navMain" class="nav__main">
        <li><a class="main-link" href="#about">{{ __('nav.about') }}</a></li>
        <li><a class="main-link" href="#projects">{{ __('nav.projects') }}</a></li>
        <li><a class="main-link" href="#contact">{{ __('nav.contact') }}</a></li>
        <li id="navSecondary" class="nav__secondary">
            <ul class="nav__secondary__list">
                <li class="nav__locale">
                    <button class="submenu-selector"
                        aria-label="{{ __('locales.selectedLang') }} {{ __(App\Enums\Locale::getFullLanguageName(app()->getLocale())) }}">
                        {{ app()->getLocale() }}
                    </button>
                    <ul class="submenu">
                        @foreach (App\Enums\Locale::values() as $locale)
                            <li>
                                <a @if ($locale === app()->getLocale()) class="locale-link active" @else class="locale-link" @endif
                                    aria-label="{{ __('locales.labelText') }} {{ __(App\Enums\Locale::getFullLanguageName($locale)) }}"
                                    href="/{{ $locale }}" tabindex="0">{{ $locale }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav__settings">
                    <button class="submenu-selector" aria-label="{{ __('nav.settings') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <title>{{ __('nav.settings') }}</title>
                            <path class="svg--white"
                                d="m31.86,18.84v-5.96h-2.95c-.34-1.46-.93-2.82-1.72-4.04l2.14-2.13-4.22-4.2-2.17,2.17c-1.22-.75-2.57-1.29-4.02-1.61V0h-5.99v3.14c-1.43.35-2.77.94-3.97,1.72l-2.22-2.21L2.52,6.85l2.3,2.29c-.18.3-.34.6-.5.91-.49.93-.86,1.95-1.11,2.97H0v5.96h3.27c.1.39.21.77.34,1.16,0,.03.02.05.03.08,0,0,0,.01,0,.03.32.92.73,1.8,1.24,2.61l-2.31,2.3,4.22,4.2,2.28-2.27c1.19.75,2.51,1.31,3.91,1.65v3.13h5.92v-3.06c1.48-.33,2.86-.89,4.1-1.66l2.09,2.08,4.22-4.2-2.09-2.07c.78-1.24,1.36-2.62,1.69-4.09h2.92,0Zm-6.16,4.16l1.94,1.94-2.38,2.37-1.92-1.91c-1.61,1.23-3.54,2.06-5.64,2.34v2.76h-3.34v-2.78c-2.05-.3-3.93-1.12-5.5-2.32l-2.05,2.05-2.38-2.37,2.11-2.04c-1.16-1.56-1.95-3.41-2.24-5.42H1.36v-3.32h2.86l.1-.23c.31-1.93,1.07-3.71,2.18-5.22l-2.08-2.07,2.38-2.37,2.02,2.07c1.56-1.2,3.43-2.03,5.47-2.34V1.35h3.34v2.75c2.08.27,3.99,1.07,5.59,2.26l1.97-1.96,2.31,2.37-1.92,1.92c1.18,1.55,2,3.39,2.31,5.4h2.95v3.32h-2.91c-.25,2.07-1.05,3.97-2.23,5.58h0Z" />
                            <path class="svg--white"
                                d="m16,8.61c-4.02,0-7.35,3.25-7.35,7.32s3.34,7.32,7.35,7.32,7.35-3.32,7.35-7.32-3.34-7.32-7.35-7.32Zm0,13.28c-3.34,0-5.99-2.65-5.99-5.96s2.72-5.96,5.99-5.96,5.99,2.65,5.99,5.96c0,3.32-2.72,5.96-5.99,5.96Z" />
                        </svg>
                    </button>
                    <ul class="submenu">
                        <li><x-slider name="switch-dark-mode" /><span>{{ __('settings.darkmode') }}</span></li>
                        <li><x-slider name="switch-dyslexia-mode" /><span>{{ __('settings.dyslexiamode') }}</span></li>
                    </ul>
                </li>
            </ul>

        </li>
    </ul>
    <div id="navHamburger" class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
