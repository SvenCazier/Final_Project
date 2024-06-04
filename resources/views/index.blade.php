<!DOCTYPE html>
<html lang="en">

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
        <x-nav></x-nav>
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
                    tools, each adding a new spell to my tech repertoire. It all began in high school with VBA, where I
                    took my first plunge into the world of coding. College ushered me deeper into the coding realms,
                    where I encountered Assembler, Java, and COBOL, alongside the foundational trio of HTML, CSS, and
                    JavaScript, complemented by their backend companions SQL and PHP.
                </p>
                <p class="article__content">
                    My quest for innovation led me to ponder why PHP couldn't be more like JavaScript, until I stumbled
                    upon the Good Witch of the Node.js, accompanied by NoSQL and ReQL. This definitely wasn’t Kansas
                    anymore. I dipped my toes into Python and thanks to my then girlfriend I got to learn
                    C++, Spring for Java and Flask for Python as well.
                </p>
                <p class="article__content">
                    Emboldened by my newfound knowledge, I embarked on creating my own Metube in Node.js, leveraging
                    ReQL and EJS as a template engine, all shielded by an NGINX proxy, serving hundreds of videos.
                    Sadly, its demise came swiftly when the HDD on which it all ran locked up.
                </p>
                <p class="article__content">
                    Continuously seeking new horizons, I found myself entangled in a love-hate affair with Angular's
                    TypeScript, a relationship I'm still navigating. Thanks to VDAB, I now delved into the realms of
                    SASS, Laravel, Twig, and Blade as well.
                </p>
                <p class="article__content">
                    Throughout my journey, I have also encountered Twitter Bootstrap, Tailwind CSS, and JQuery. While
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
        <section id="projects">
            <x-cards.card />
        </section>
        <section id="contact">
            <div class="left"></div>
            <div class="right">
                <x-forms.form method="POST" action="/contact">
                    <x-forms.input :label="__('general_form.name')" name="name" type="text" />
                    <x-forms.input :label="__('general_form.email')" name="email" type="email" />
                    <x-forms.select :label="__('general_form.subject')" name="subject">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->value }}">{{ __($subject->label()) }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.textarea :label="__('general_form.message')" name="message" />
                    <x-button>{{ __('buttons.send') }}</x-button>
                </x-forms.form>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>
