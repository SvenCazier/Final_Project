<section id="projects" class="full-height tabset">
    <picture class="project-background">
        <img src="img/jim@1918x907.png" alt="">
    </picture>
    <aside class="nav-tabs">
        <h2>Projects</h2>
        <ul>
            <li>
                <input type="radio" name="tabset" id="project1" aria-role="button" aria-controls="MeTube" checked
                    tabindex="0" data-tab-group="projects">
                <label for="project1">MeTube</label>
            </li>
            <li>
                <input type="radio" name="tabset" id="project2" aria-role="button" aria-controls="Jim(Bot)"
                    tabindex="0" data-tab-group="projects">
                <label for="project2">JIM(Bot)</label>
            </li>
            <li>
                <input type="radio" name="tabset" id="project3" aria-role="button"
                    aria-controls="9c64d46c-22cd-4ed5-9f35-f85c6b9e3204" tabindex="0" data-tab-group="projects">
                <label for="project3">Caesar Code</label>
            </li>
            <li>
                <input type="radio" name="tabset" id="project4" aria-role="button" aria-controls="Schattenjager"
                    tabindex="0" data-tab-group="projects">
                <label for="project4">Schattenjager</label>
            </li>
            <li>
                <input type="radio" name="tabset" id="project5" aria-role="button" aria-controls="Pizza"
                    tabindex="0" data-tab-group="projects">
                <label for="project5">Pizza</label>
            </li>
            <li>
                <input type="radio" name="tabset" id="project6" aria-role="button" aria-controls="Prularia"
                    tabindex="0" data-tab-group="projects">
                <label for="project6">Prularia</label>
            </li>
        </ul>
    </aside>
    <main class="main-content tab-panels">
        <section id="MeTube" class="tab-panel active">
            <main>
                <h2 class="title">MeTube</h2>
                <p>
                    MeTube, inspired by YouTube, is a project designed as a platform for hosting my own videos.
                    Originally developed using pure Node.js with the EJS templating engine, this second iteration runs
                    on an API developed in Node.js and a frontend built in Angular. Furthermore, it features chapters,
                    subtitles, and a Fuzzy Matching search algorithm now.
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>SCSS</li>
                    <li>JavaScript</li>
                    <li>TypeScript</li>
                    <li>Node.js</li>
                    <li>Express.js</li>
                    <li>Angular</li>
                    <li>RethinkDB</li>
                </ul>
            </footer>
        </section>
        <section id="Jim(Bot)" class="tab-panel">
            <main>
                <h2 class="title">JIM(Bot)</h2>
                <p>
                    JIM(Bot) supports a Whiteout Survival alliance with a PHP-backed website and JimBot, a Discord bot
                    that personifies an event API. JimBot seamlessly integrates with both Discord and the alliance's
                    website, facilitating real-time event management and enhancing communication and coordination among
                    alliance members.
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>SCSS</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>Twig</li>
                    <li>Node.js</li>
                    <li>Express.js</li>
                    <li>MongoDB</li>
                </ul>
            </footer>
        </section>
        <section id="9c64d46c-22cd-4ed5-9f35-f85c6b9e3204" class="tab-panel">
            <main>
                <h2 class="title">Ceasar Code</h2>
                </h2>
                <p>
                    Implemented as a JavaScript class, this project implements the Caesar Cipher using modulo
                    arithmetic, with the possibility of importing a file.
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>JavaScript</li>
                </ul>
            </footer>
        </section>
        <section id="Schattenjager" class="tab-panel">
            <main>
                <h2 class="title">Schattenjager</h2>
                <p>
                    Schattenjager is a Pacman-style game implemented in JavaScript, challenging players with adjustable
                    levels of randomly placed walls, lives, treasures, and enemy movement speeds. Navigate through the
                    maze, collect treasures, avoid enemies, and see if you can conquer its challenges!
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>CSS3</li>
                    <li>JavaScript</li>
                </ul>
            </footer>
        </section>
        <section id="Pizza" class="tab-panel">
            <main>
                <h2 class="title">Pizza</h2>
                <p>
                    Pizza is a web application structured in a layered MVC format for a pizza webshop. It features
                    a quirky approach to managing customer data to minimize duplicate entries, ensuring seamless guest
                    checkout and registration. Find out more by checking it out on GitHub.
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>CSS3</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                </ul>
            </footer>
        </section>
        <section id="Prularia" class="tab-panel">
            <main>
                <h2 class="title">Prularia</h2>
                <p>
                    Prularia is a webshop application developed collaboratively using SCRUM methodology, where I
                    integrated several previously developed components to streamline our development process. Given that
                    it was a collaborative project, not all code was written by me, but as a general rule you could say
                    that sections with lots of comments were at least visited by me.
                </p>
            </main>
            <footer class="tech-section">
                <ul class="skills">
                    <li>HTML5</li>
                    <li>CSS</li>
                    <li>PHP</li>
                    <li>JavaScript</li>
                    <li>MySQL</li>
                </ul>
            </footer>
        </section>
    </main>
</section>


{{-- <ul>
    @foreach ($projects as $index => $project)
        <li>
            <input type="radio" name="tabset" id="project{{ $index + 1 }}" aria-role="button" aria-controls="{{ $project['name'] }}"
                   tabindex="0" data-tab-group="projects" @if ($index === 0) checked @endif>
            <label for="project{{ $index + 1 }}">{{ $project['name'] }}</label>
        </li>
    @endforeach
</ul> --}}

{{-- <main class="main-content tab-panels">
    <section id="{project_id}" class="tab-panel">
        <main>
            <h2 class="title">{project_name}</h2>
            <p><strong>Overall Impression:</strong> {overall_impression}</p>
            <p><strong>History:</strong> {history}</p>
        </main>
        <footer class="tech-section">
            <ul class="skills">
                <li><strong>Languages:</strong></li>
                {languages}
                <li><strong>Frameworks:</strong></li>
                {frameworks}
                <li><strong>Libraries:</strong></li>
                {libraries}
                <li><strong>Tools:</strong></li>
                {tools}
                <li><strong>Databases:</strong></li>
                {databases}
                <li><strong>Other Technologies:</strong></li>
                {other_technologies}
            </ul>
        </footer>
    </section>
</main> --}}
