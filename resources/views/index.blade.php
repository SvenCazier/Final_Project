<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sven Cazier</title>
    <link rel="alternate" hreflang="en" href="url_of_page/en" />
    <link rel="alternate" hreflang="nl" href="url_of_page/nl" />
    <link rel="alternate" hreflang="x-default" href="url_of_page" />



    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <x-nav class="expanded" />
    </header>
    <main>
        <section id="home" class="content-grid hero full-height">
            <div class="left">
                <h1 class="title">FULL STACK DEVELOPER</h1>
            </div>
        </section>
        <section id="about" class="content-grid text">
            <h2 class="title article__title--main"><span class="article__title--underline">About</span> Me</h2>
            <article class="article">
                <h3 class="article__title">Once Upon a Time...</h3>
                <p class="article__content">
                    There was a kid who spent countless hours playing games on the MS-DOS computer at home, finding
                    endless joy in the pixelated adventures and whirring sounds of the machine. At age 10, he stood
                    before his classmates and gave his first presentation about the wonders of the internet. From that
                    moment, he was captivated, hooked on the boundless possibilities that the digital world had to
                    offer.
                </p>
            </article>
            <article class="article">
                <h3 class="article__title">The Academic Wanderer</h3>
                <p class="article__content">
                    In high school, I dabbled in a bit of everything: Latin, Economics, Maths, Modern Languages—you name
                    it. Despite my love for these subjects, nothing truly clicked until I discovered informatics.
                    College was supposed to be my grand adventure in tech, but it turned out to be a bit too much
                    "monkey see, monkey do" for my liking. Student life, however, was a blast.
                </p>
            </article>
            <article class="article">
                <h4 class="article__title">The Family Biz Coder</h4>
                <p class="article__content">
                    Post-college, I joined the family business but couldn't shake off my coding addiction. I even ended
                    up coding all the assignments for my American girlfriend at the time. She constantly told me,
                    "You're so good at this; you should really get your degree!" I guess I should thank her for the
                    push.
                </p>
            </article>
            <article class="article">
                <h4 class="article__title">"We'll Fast-forward To A Few Years Later" (- Alanis Morissette)</h4>
                <p class="article__content">
                    Fast forward to now, and I've completed the VDAB course for full-stack developers to expand my
                    skills. One memorable experience was the SCRUM project, where I learned the magic of teamwork and
                    agile methodologies. It was incredibly fun; we constantly introduced new ways to make the daily
                    stand-up meetings entertaining and engaging. Our team was always there for each other, brainstorming
                    solutions and supporting one another through challenges. It felt like piecing together a tech puzzle
                    with a bunch of brilliant minds, and it made the entire experience unforgettable.
                </p>
            </article>
            <article class="article">
                <h4 class="article__title">Tech Wizardry</h4>
                <p class="article__content">
                    In my voyage through the vast seas of programming, I've amassed a diverse arsenal of languages and
                    tools, each adding a new spell to my tech repertoire. It all began in high school with <b
                        class="lang-tag">VBA</b>, where I
                    took my first plunge into the world of coding. College ushered me deeper into the coding realms,
                    where I encountered <b class="lang-tag">Assembler</b>, <b class="lang-tag">Java</b>, and <b
                        class="lang-tag">COBOL</b>, alongside the foundational trio of <b class="lang-tag">HTML</b>, <b
                        class="lang-tag">CSS</b>, and
                    <b class="lang-tag">JavaScript</b>, complemented by their backend companions <b
                        class="lang-tag">SQL</b> and <b class="lang-tag">PHP</b>.
                </p>
                <p class="article__content">
                    My quest for innovation led me to ponder why PHP couldn't be more like JavaScript, until I stumbled
                    upon the Good Witch of the <b class="lang-tag">Node.js</b>, accompanied by <b
                        class="lang-tag">NoSQL</b> and <b class="lang-tag">ReQL</b>. This definitely wasn't Kansas
                    anymore. I dipped my toes into <b class="lang-tag">Python</b> and thanks to my then girlfriend I got
                    to learn
                    <b class="lang-tag">C++</b>, <b class="lang-tag">Spring</b> for Java and <b
                        class="lang-tag">Flask</b> for Python as well.
                </p>
                <p class="article__content">
                    Emboldened by my newfound knowledge, I embarked on creating my own Metube in Node.js, leveraging
                    ReQL and <b class="lang-tag">EJS</b> as a template engine, all shielded by an <b
                        class="lang-tag">NGINX</b> proxy, serving hundreds of videos.
                    Sadly, its demise came swiftly when the HDD on which it all ran locked up.
                </p>
                <p class="article__content">
                    Continuously seeking new horizons, I found myself entangled in a love-hate affair with <b
                        class="lang-tag">Angular</b>'s
                    <b class="lang-tag">TypeScript</b>, a relationship I'm still navigating. Thanks to VDAB, I now
                    delved into the realms of
                    <b class="lang-tag">SASS</b>, <b class="lang-tag">Laravel</b>, <b class="lang-tag">Twig</b>, and <b
                        class="lang-tag">Blade</b> as well.
                </p>
                <p class="article__content">
                    Throughout my journey, I have also encountered <b class="lang-tag">Twitter Bootstrap</b>, <b
                        class="lang-tag">Tailwind CSS</b>, and <b class="lang-tag">JQuery</b>. While
                    initially
                    enamored by their convenience, I've since found myself gravitating towards their vanilla
                    counterparts. There's a certain charm in crafting solutions from scratch, allowing for greater
                    customization and control. It's a journey marked by discovery, experimentation, and the constant
                    pursuit of excellence.
                </p>
            </article>
            <article class="article">
                <h4 class="article__title">The Grand Quest</h4>
                <p class="article__content">
                    I'm on a mission to solve complex problems and create seamless, user-friendly applications. I thrive
                    in collaborative environments and am always eager to learn something new. My ultimate goal? To make
                    a lasting impact with the solutions I develop.
                </p>
            </article>
        </section>
        {{-- <section id="projects">
            <x-cards.card />
        </section> --}}
        <section id="contact">
            <div class="left"></div>
            <div class="right">
                <x-forms.form id="contactForm" method="POST" action="/{{ app()->getLocale() }}/contact">
                    <x-forms.input :label="__('general_form.name')" name="name" type="text" autocomplete="name" />
                    <x-forms.input :label="__('general_form.email')" name="email" type="email" autocomplete="email" />
                    <x-forms.select :label="__('general_form.subject')" name="subject">
                        @foreach (App\Enums\ContactFormSubject::cases() as $subject)
                            <option value="{{ $subject->value }}">{{ __($subject->label()) }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.textarea :label="__('general_form.message')" name="message" />
                    <x-button>{{ __('buttons.send') }}</x-button>
                </x-forms.form>
            </div>
        </section>
    </main>
    <footer>
        <section>
            <ul class="socials">
                <li>
                    <a href="#">
                        <svg viewBox="0 0 98 96" role="img" preserveAspectRatio="xMidYMid slice" role="img">
                            <title>LinkedIn logo</title>
                            <g>
                                <path class="svg--back" d="M48.9,96c-13.6,0-27.1,0-40.7,0c-3.6,0-6.6-2.5-7.1-5.9C1,89.8,1,89.4,1,89C1,61.7,1,34.3,1,7c0-3.9,2.9-6.9,6.9-7
  c4.3,0,8.7,0,13,0c23,0,46,0,68.9,0c3.7,0,6.2,2.5,6.9,4.9c0.2,0.7,0.3,1.3,0.3,2c0,27.4,0,54.8,0,82.1c0,3.9-3,6.9-6.9,6.9
  c-5.1,0-10.2,0-15.4,0C66.2,96,57.5,96,48.9,96z" />
                                <path class="svg--front" d="M52.2,42.2c0-1.9,0-3.6,0-5.2c0-0.8-0.2-1.1-1.1-1.1c-3.9,0-7.8,0-11.8,0c-0.9,0-1.1,0.3-1.1,1.2
  c0,14.6,0,29.2,0,43.8c0,0.9,0.2,1.2,1.2,1.2c4.1,0,8.1,0,12.2,0c0.9,0,1.2-0.3,1.1-1.2c0-7.3,0-14.7,0-22c0-1.5,0.1-3.1,0.4-4.5
  c0.6-3.1,2-5.6,5.3-6.4c1-0.2,2.1-0.3,3.1-0.3c3.5,0,5.6,1.6,6.3,5c0.4,1.8,0.6,3.7,0.6,5.6c0.1,7.5,0,15.1,0,22.6
  c0,0.9,0.2,1.2,1.2,1.2c4.1,0,8.1,0,12.2,0c0.9,0,1.1-0.3,1.1-1.1c0-8.1,0-16.2,0-24.3c0-3.3-0.2-6.6-0.9-9.9
  c-0.9-3.8-2.6-7.2-6-9.4c-2.1-1.4-4.5-2-7-2.3c-3-0.3-6.1-0.4-9,0.8C56.7,36.9,54.2,39,52.2,42.2z" />
                                <path class="svg--front" d="M15,59c0,7.3,0,14.6,0,21.9c0,0.9,0.3,1.1,1.1,1.1c4.1,0,8.2,0,12.3,0c0.8,0,1.1-0.2,1.1-1.1
  c0-14.7,0-29.3,0-44c0-0.9-0.3-1-1.1-1c-4,0-8.1,0-12.1,0c-1.3,0-1.3,0-1.3,1.2C15,44.4,15,51.7,15,59z" />
                                <path class="svg--front"
                                    d="M22.2,29.7c4.6,0,8.4-3.7,8.4-8.2c0-4.7-3.7-8.4-8.3-8.4c-4.7,0-8.4,3.7-8.4,8.3C14,26,17.6,29.7,22.2,29.7z" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li><a href="#">GitHub</a></li>
            </ul>
        </section>
        <span class="divider"></span>
        <section>&copy {{ now()->year }} Sven Cazier</section>
    </footer>
</body>

</html>
