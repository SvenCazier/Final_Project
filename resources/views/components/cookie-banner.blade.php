<aside id="cookieBanner" class="cookie-banner elevate no-print">
    <input id="cookie-banner-toggle" type="checkbox" class="cookie-banner-toggle">
    <div id="cookieBannerContent" class="cookie-banner-content">
        <header class="cookie-banner-content__header">
            <h3 class="cookie-banner-content__title">
                {{ __('cookiebanner.title') }}
            </h3>
        </header>
        <main class="cookie-banner-content__body">
            <p class="cookie-banner-content__paragraph">
                {!! __('cookiebanner.text') !!}
            </p>
        </main>
        <footer class="cookie-banner-content__footer">
            <div class="cookie__footer__main-buttons">
                <button id="acceptCookies" class="button button--contained"
                    tabindex="1">{{ __('cookiebanner.accept') }}</button>
                <button id="declineCookies" class="button button--text"
                    tabindex="2">{{ __('cookiebanner.decline') }}</button>
            </div>
            <button id="clearCookies" class="button button--outline"
                tabindex="3">{{ __('cookiebanner.clear') }}</button>
        </footer>
    </div>
    <div class="cookie-banner-toggle-container">
        <label for="cookie-banner-toggle" class="cookie-icon-label" role="button"
            aria-label="{{ __('cookiebanner.toggle') }}" title="{{ __('cookiebanner.toggle') }}" tabindex="4">
            <svg class="cookie-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <path class="svg--stroke"
                    d="M25.9,13.4c1.3,1.9,2.9,2.5,5,1.2c0.1,0.7,0.1,1.5,0.1,2.2c-0.4,8.3-7.5,14.7-15.7,14.2 C7,30.6,0.6,23.6,1,15.3C1.4,7,8.7,0.6,17,1c-0.7,2.3-0.1,4.3,1.8,5C17,11.5,20.8,15,25.9,13.4L25.9,13.4z" />
                <path class="svg--fill"
                    d="M25.5,0.4c0.8,0,1.5,0.7,1.5,1.5s-0.7,1.5-1.5,1.5S24,2.7,24,1.9C24,1.1,24.7,0.4,25.5,0.4C25.5,0.4,25.5,0.4,25.5,0.4z" />
                <path class="svg--fill"
                    d="M8.5,12.3c1.2,0,2.2,1,2.2,2.2s-1,2.2-2.2,2.2s-2.2-1-2.2-2.2S7.2,12.3,8.5,12.3C8.5,12.3,8.5,12.3,8.5,12.3z" />
                <path class="svg--fill"
                    d="M15.5,15.2c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3c-0.7,0-1.3-0.6-1.3-1.3C14.3,15.8,14.8,15.2,15.5,15.2 C15.5,15.2,15.5,15.2,15.5,15.2z" />
                <path class="svg--fill"
                    d="M9.9,20.5c0.9,0,1.6,0.7,1.6,1.6c0,0.9-0.7,1.6-1.6,1.6c-0.9,0-1.6-0.7-1.6-1.6C8.4,21.2,9.1,20.5,9.9,20.5L9.9,20.5z" />
                <path class="svg--fill"
                    d="M13.3,8.5c0.7,0,1.2,0.6,1.2,1.2s-0.6,1.2-1.2,1.2c-0.7,0-1.2-0.6-1.2-1.2S12.7,8.5,13.3,8.5C13.3,8.5,13.3,8.5,13.3,8.5z" />
                <path class="svg--fill"
                    d="M20.1,21.1c1.1,0,2.1,0.9,2.1,2.1s-0.9,2.1-2.1,2.1S18,24.3,18,23.1S18.9,21.1,20.1,21.1L20.1,21.1z" />
                <path class="svg--fill"
                    d="M24.4,6.2c0.8,0,1.4,0.6,1.4,1.4S25.2,9,24.4,9S23,8.4,23,7.6S23.6,6.2,24.4,6.2L24.4,6.2z" />
            </svg>
        </label>
    </div>
</aside>
