@props(['data', 'name' => 'tab'])
<section id="projects" class="content-grid">
    <h2 class="title article__title--main center">
        <span class="article__title--underline">{{ __('projects.title_underline') }}</span>
        {{ __('projects.title_normal') }}
    </h2>
    <div class="tabset">
        <aside class="nav-tabs no-print">
            <ul>
                @foreach ($data as $index => $item)
                    <li>
                        <input type="radio" name="tabset" id="{{ $name }}-{{ $index }}"
                            aria-controls="{{ $item->id }}" data-tab-group="projects"
                            @if ($index === 0) checked @endif>
                        <label for="{{ $name }}-{{ $index }}" role="button"
                            tabindex="0">{{ $item->name }}</label>
                    </li>
                @endforeach
            </ul>
        </aside>
        <main class="tab-panels no-split">
            @foreach ($data as $item)
                <section id="{{ $item->id }}" class="tab-panel">
                    <header class="tab-panel__banner no-print">
                        <picture>
                            <source media="(min-width: 1240px)" srcset="{{ url("/img/{$item->image}x1040.png") }}" />
                            <source media="(min-width: 600px)" srcset="{{ url("/img/{$item->image}x840.png") }}" />
                            <source media="(max-width: 599px)" srcset="{{ url("/img/{$item->image}x540.png") }}" />
                            <img loading="lazy" src="{{ url("/img/{$item->image}x1040.png") }}"
                                alt="{{ $item->name }}">
                        </picture>
                    </header>
                    <main class="tab-panel__content no-split">
                        <h2 class="title">{{ $item->name }}</h2>
                        <p>{{ __($item->description) }}</p>
                        <article class="project__links">
                            @if ($item->live_url)
                                <a href="{{ $item->live_url }}" class="button button--outline"
                                    target="_blank">{{ __('projects.View live version') }}</a>
                            @endif
                            @if ($item->github_url)
                                <a href="{{ $item->github_url }}" class="button button--outline"
                                    target="_blank">{{ __('projects.View GitHub repository') }}</a>
                            @endif
                        </article>
                    </main>
                    <footer class="tab-panel__footer">
                        <ul class="skills">
                            @foreach ($item->technologies as $technology)
                                <li>{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    </footer>
                </section>
            @endforeach
        </main>
    </div>
</section>
