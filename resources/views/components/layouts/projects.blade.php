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
                            <img
                                src="https://www.guardianoffshore.com.au/wp-content/uploads/2015/03/banner-placeholder.jpg">
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
