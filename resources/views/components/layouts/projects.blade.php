@props(['data', 'name' => 'tab'])
<section id="projects" class="full-height content-grid">
    <div class="tabset">
        <aside class="nav-tabs">
            <ul>
                @foreach ($data as $index => $item)
                    <li>
                        <input type="radio" name="tabset" id="{{ $name }}-{{ $index }}" aria-role="button"
                            aria-controls="{{ $item->id }}" tabindex="0" data-tab-group="projects"
                            @if ($index === 0) checked @endif>
                        <label for="{{ $name }}-{{ $index }}">{{ $item->name }}</label>
                    </li>
                @endforeach
            </ul>
        </aside>
        <main class="tab-panels">
            @foreach ($data as $item)
                <section id="{{ $item->id }}" class="tab-panel">
                    <header class="tab-panel__banner">
                        <picture>
                            <source media="(min-width: 1240px)" srcset="{{ url('/img/dummyx1040.png') }}" />
                            <source media="(min-width: 600px)" srcset="{{ url('/img/dummyx840.png') }}" />
                            <source media="(max-width: 599px)" srcset="{{ url('/img/dummyx540.png') }}" />
                            <img loading="lazy" src="{{ url('/img/dummyx1040.png') }}">
                        </picture>
                    </header>
                    <main class="tab-panel__content">
                        <h2 class="title">{{ $item->name }}</h2>
                        <p>{{ $item->description }}</p>
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
