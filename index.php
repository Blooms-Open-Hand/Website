<?php

$pageTitle = 'Compassionate Home Care & Personalized Support';

$pageDescription ='Compassionate home care and personalized support focused on dignity, safety, independence, and meaningful community living.';

$pageKeywords = ['home care','home care services','adult family home','personalized care','personal care assistance','memory care','medication management','companionship','family support','community care'];


$canonicalUrl ='https://' .($_SERVER['HTTP_HOST'] ?? 'example.com') .'/';

$seoImage ='https://' .($_SERVER['HTTP_HOST'] ?? 'example.com') .'/assets/images/og-home.jpg';

$seoType = 'website';

require_once __DIR__ . '/header.php';

$banners = $pdo->query("SELECT * FROM banners WHERE status = 'published' ORDER BY id DESC")->fetchAll();

$gallery = $pdo->query("SELECT * FROM gallery WHERE status = 'published' ORDER BY id DESC LIMIT 6 ")->fetchAll();

$blogs = $pdo->query("SELECT * FROM blogs WHERE status = 'published' ORDER BY COALESCE(published_at, created_at) DESC LIMIT 6 ")->fetchAll();

$tours = $pdo->query(" SELECT * FROM tours WHERE status = 'upcoming' AND tour_date >= CURDATE() ORDER BY tour_date ASC, tour_time ASC LIMIT 3 ")->fetchAll();

if (!$banners) {

    $banners = [

        [
            'title' =>
                'Compassionate Care. Stronger Communities.',

            'description' =>
                'A welcoming place where people feel supported, respected and connected.',

            'image_url' =>
                'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=2000&q=90',

            'button_text' =>
                'Learn About Us',

            'button_link' =>
                'about.php'
        ]

    ];

}

?>

<!-- =========================================================
     PAGE STYLES
========================================================= -->

<style>

.hero-section {
    position: relative;
    background:#071611;
    overflow: hidden;
}


.hero-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transition: opacity 1.1s ease, visibility 1.1s ease;
}


.hero-slide.active {
    position: relative;
    opacity: 1;
    visibility: visible;
}


.hero-image {
    transform: scale(1.08);
    transition:transform 8s cubic-bezier(.2,.7,.2,1);
}


.hero-slide.active .hero-image {
    transform: scale(1);
}


.hero-overlay {
    background: linear-gradient(
            90deg,
            rgba(2, 12, 9, .94) 0%,
            rgba(2, 12, 9, .78) 38%,
            rgba(2, 12, 9, .40) 68%,
            rgba(2, 12, 9, .08) 100%
        );
}


.hero-content {
    opacity: 0;
    transform: translateY(35px);
}


.hero-slide.active .hero-content {
    animation:
        heroContentIn
        1s
        cubic-bezier(.22,1,.36,1)
        .2s
        forwards;
}


@keyframes heroContentIn {

    from {
        opacity: 0;
        transform: translateY(35px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* Hero badge */

.hero-badge {

    backdrop-filter:
        blur(14px);

    -webkit-backdrop-filter:
        blur(14px);

}


/* Hero floating card */

.hero-floating-card {

    animation:
        heroFloat
        6s
        ease-in-out
        infinite;

}


@keyframes heroFloat {

    0%,
    100% {

        transform:
            translateY(0);

    }

    50% {

        transform:
            translateY(-8px);

    }

}


/* Hero progress */

.hero-progress {

    position: absolute;

    bottom: 0;

    left: 0;

    height: 3px;

    width: 0;

    background:
        rgba(255,255,255,.9);

}


.hero-slide.active .hero-progress {

    animation:
        heroProgress
        6s
        linear
        forwards;

}


@keyframes heroProgress {

    from {

        width: 0;

    }

    to {

        width: 100%;

    }

}


/* =========================================================
   SCROLL REVEAL
========================================================= */

.reveal {

    opacity: 0;

    transform:
        translateY(35px);

    transition:
        opacity .8s ease,
        transform .8s cubic-bezier(.22,1,.36,1);

}


.reveal.is-visible {

    opacity: 1;

    transform:
        translateY(0);

}


.reveal-delay-1 {

    transition-delay:
        .12s;

}


.reveal-delay-2 {

    transition-delay:
        .22s;

}


.reveal-delay-3 {

    transition-delay:
        .32s;

}


/* =========================================================
   FLOATING ELEMENTS
========================================================= */

.floating-decoration {

    animation:
        elegantFloat
        7s
        ease-in-out
        infinite;

}


.floating-decoration-slow {

    animation:
        elegantFloat
        10s
        ease-in-out
        infinite;

}


@keyframes elegantFloat {

    0%,
    100% {

        transform:
            translate3d(0,0,0);

    }

    50% {

        transform:
            translate3d(0,-15px,0);

    }

}


/* =========================================================
   CARDS
========================================================= */

.service-card,
.blog-card,
.gallery-card {

    will-change:
        transform;

}


/* =========================================================
   SERVICE CARD
========================================================= */

.service-card {

    position: relative;

    overflow: hidden;

}


.service-card::before {

    content: '';

    position: absolute;

    top: 0;

    left: 0;

    width: 0;

    height: 3px;

    background:
        #059669;

    transition:
        width .5s ease;

}


.service-card:hover::before {

    width: 100%;

}


/* =========================================================
   CAROUSEL
========================================================= */

.carousel-viewport {

    overflow: hidden;

    touch-action:
        pan-y;

}


.carousel-track {

    display: flex;

    gap: 20px;

    transition:
        transform .7s cubic-bezier(.22,1,.36,1);

}


/* =========================================================
   DOTS
========================================================= */

.carousel-dot {

    width: 8px;

    height: 6px;

    border-radius: 999px;

    background:
        #cbd5e1;

    transition:
        width .35s ease,
        background .35s ease;

}


.carousel-dot.active {

    width: 30px;

    background:
        #059669;

}


/* Dark dots */

.dark-dots .carousel-dot {

    background:
        rgba(255,255,255,.25);

}


.dark-dots .carousel-dot.active {

    background:
        #6ee7b7;

}


/* =========================================================
   GALLERY
========================================================= */

.gallery-card {

    position: relative;

}


.gallery-card img {

    transition:
        transform 1s cubic-bezier(.22,1,.36,1);

}


.gallery-card:hover img {

    transform:
        scale(1.08);

}


/* =========================================================
   BLOG
========================================================= */

.blog-image {

    transition:
        transform .8s cubic-bezier(.22,1,.36,1);

}


.blog-card:hover .blog-image {

    transform:
        scale(1.05);

}


/* =========================================================
   BUTTON
========================================================= */

.premium-button {

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        background .3s ease;

}


.premium-button:hover {

    transform:
        translateY(-2px);

    box-shadow:
        0 15px 30px rgba(0,0,0,.12);

}


/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        animation-duration:
            .01ms !important;

        animation-iteration-count:
            1 !important;

        transition-duration:
            .01ms !important;

        scroll-behavior:
            auto !important;

    }

    .reveal {

        opacity: 1;

        transform: none;

    }

}

</style>


<main>
    <section class="hero-section" id="heroSection" aria-label="Home care services introduction">
        <?php foreach ($banners as $i => $banner): ?>
            <div class="hero-slide <?= $i === 0 ? 'active' : '' ?>" data-hero-slide="<?= $i ?>">
                <div class="relative min-h-[680px] lg:min-h-[760px] flex items-center">
                    <img src="<?= h('./admin/' . assetImage($banner['image_url'])) ?>" alt="<?= h($banner['title'] . ' - ' . $organization . ' home care services') ?>" class="hero-image absolute inset-0 w-full h-full object-cover" width="2000" height="1100" <?= $i === 0 ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"' ?>>
                    <div class="hero-overlay absolute inset-0" aria-hidden="true"></div>
                    <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-slate-950/60 to-transparent" aria-hidden="true"></div>
                    <div class="floating-decoration pointer-events-none absolute top-28 right-[8%] hidden lg:block" aria-hidden="true">
                        <div class="w-28 h-28 rounded-full border border-white/10"></div>
                    </div>
                    <div class="floating-decoration-slow pointer-events-none absolute bottom-32 right-[15%] hidden lg:block" aria-hidden="true">
                        <div class="w-16 h-16 rounded-full bg-emerald-400/10 blur-sm"></div>
                    </div>
                    <div class="relative z-10 w-full max-w-7xl mx-auto px-5 py-28 lg:py-36">
                        <div class="hero-content max-w-4xl">
                            <div class="hero-badge inline-flex items-center gap-3 border border-[#059669]/25 bg-[#059669]/10 px-4 py-2 rounded-full text-sm text-[#059669] font-bold shadow-lg">
                                <span>Open Hands. Open Hearts. A True Home for Your Loved One</span>
                            </div>
                            <h1 class="mt-2 text-5xl w-[650px] md:text-6xl lg:text-[76px] font-black tracking-[-0.045em] leading-[.98] text-white max-w-4xl">
                                <?= h($banner['title']) ?>
                            </h1>
                            <p class="mt-7 max-w-2xl text-sm md:text-sm leading-8 text-white/30">
                                <?= h($banner['description']) ?>
                            </p>
                            <div class="mt-9 flex flex-wrap items-center gap-4">
                                <?php if (!empty($banner['button_text'])): ?>
                                    <a href="<?= h($banner['button_link'] ?: '#') ?>" class="premium-button inline-flex items-center gap-3 rounded-full bg-[#059669] px-7 py-2 text-sm font-bold text-white" aria-label="<?= h($banner['button_text']) ?>">
                                        <?= h($banner['button_text']) ?>
                                        <span class="text-lg" aria-hidden="true">→</span>
                                    </a>
                                <?php endif; ?>
                                <a href="schedule.php" class="premium-button inline-flex items-center gap-3 rounded-full border border-white/25 bg-white/5 px-12 py-3 text-sm font-bold text-white backdrop-blur hover:bg-white/10" aria-label="Contact <?= h($organization) ?>">
                                    Schedule a Tour
                                </a>
                            </div>
                            <div class="mt-12 flex flex-wrap items-center gap-x-8 gap-y-4 text-sm text-white/70">
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-300" aria-hidden="true">✓</span>
                                    Person-centered care
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-300" aria-hidden="true">✓</span>
                                    Trusted support
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-emerald-300" aria-hidden="true">✓</span>
                                    Community focused
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="hero-floating-card absolute bottom-20 right-[5%] hidden xl:block" aria-label="Our care philosophy">
                        <div class="w-72 rounded-3xl border border-white/10 bg-white/10 backdrop-blur-xl p-6 text-white shadow-2xl">
                            <div class="text-xs font-bold uppercase tracking-[.18em] text-emerald-300">
                                Our philosophy
                            </div>
                            <div class="mt-3 text-xl font-bold leading-7">
                                Open Hands. Open Hearts.
                            </div>
                            <div class="mt-2 text-sm leading-6 text-white/65">
                                A true home for the people we have the privilege to care for.
                            </div>
                        </div>
                    </aside>
                    <div class="hero-progress" aria-hidden="true"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (count($banners) > 1): ?>

    <div class="absolute z-20 bottom-8 left-0 right-0">

        <div
            class="max-w-7xl mx-auto px-5 flex items-center justify-between"
        >


            <!-- SLIDE NUMBER -->

            <div
                class="hidden sm:flex items-center gap-4 text-white"
                aria-hidden="true"
            >

                <span
                    id="heroCurrent"
                    class="text-sm font-bold"
                >
                    01
                </span>

                <span
                    class="w-16 h-px bg-white/20"
                ></span>

                <span
                    class="text-sm text-white/50"
                >
                    <?= str_pad(count($banners), 2, '0', STR_PAD_LEFT) ?>
                </span>

            </div>


            <!-- DOTS -->

            <div
                id="heroDots"
                class="flex items-center gap-2"
                role="tablist"
                aria-label="Homepage banner navigation"
            >

                <?php foreach ($banners as $i => $banner): ?>

                    <button
                        type="button"
                        data-hero-dot="<?= $i ?>"
                        class="hero-dot h-1.5 rounded-full transition-all duration-500 <?= $i === 0 ? 'w-10 bg-white' : 'w-2 bg-white/30' ?>"
                        aria-label="View banner <?= $i + 1 ?>: <?= h($banner['title']) ?>"
                        aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                        role="tab"
                    ></button>

                <?php endforeach; ?>

            </div>


            <!-- ARROWS -->

            <div
                class="hidden sm:flex items-center gap-2"
            >

                <button
                    type="button"
                    id="heroPrev"
                    class="w-11 h-11 rounded-full border border-white/15 bg-white/5 text-white flex items-center justify-center hover:bg-white hover:text-slate-950 transition"
                    aria-label="Previous homepage banner"
                >
                    ←
                </button>


                <button
                    type="button"
                    id="heroNext"
                    class="w-11 h-11 rounded-full border border-white/15 bg-white/5 text-white flex items-center justify-center hover:bg-white hover:text-slate-950 transition"
                    aria-label="Next homepage banner"
                >
                    →
                </button>

            </div>


        </div>

    </div>

<?php endif; ?>


</section>

<!-- =========================================================
     ABOUT / WHO WE ARE
========================================================= -->

<section
    class="relative overflow-hidden bg-white py-24 lg:py-32"
    aria-labelledby="about-heading"
>


<!-- Floating background -->

<div
    class="floating-decoration pointer-events-none absolute -right-32 top-24 h-80 w-80 rounded-full bg-emerald-50 blur-3xl"
    aria-hidden="true"
></div>


<div
    class="relative max-w-7xl mx-auto px-5"
>

    <div
        class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center"
    >


        <!-- CONTENT -->

        <div>

            <div
                class="reveal flex items-center gap-3 text-xs font-bold uppercase tracking-[.2em] text-emerald-700"
            >

                <span
                    class="w-8 h-px bg-emerald-600"
                    aria-hidden="true"
                ></span>

                Who we are

            </div>


            <h2
                id="about-heading"
                class="reveal reveal-delay-1 mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-[-.045em] leading-[1.02] text-slate-950"
            >

                Care that sees the person, not just the need.

            </h2>


            <p
                class="reveal reveal-delay-2 mt-7 text-lg text-slate-600 leading-8"
            >

                We believe quality care begins with listening. Our approach is centered on dignity, safety, connection and helping people live meaningful lives.

            </p>


            <!-- FEATURES -->

            <div
                class="reveal reveal-delay-3 mt-9 grid sm:grid-cols-2 gap-4"
            >

                <article
                    class="rounded-2xl bg-emerald-50/80 p-6 border border-emerald-100"
                >

                    <div
                        class="w-11 h-11 rounded-xl bg-white text-emerald-700 flex items-center justify-center text-xl shadow-sm"
                        aria-hidden="true"
                    >
                        ♥
                    </div>

                    <h3
                        class="mt-5 font-bold text-slate-950"
                    >
                        Person-centered
                    </h3>

                    <p
                        class="mt-2 text-sm text-slate-600 leading-6"
                    >
                        Support shaped around individual needs and goals.
                    </p>

                </article>


                <article
                    class="rounded-2xl bg-slate-50 p-6 border border-slate-100"
                >

                    <div
                        class="w-11 h-11 rounded-xl bg-white text-emerald-700 flex items-center justify-center text-xl shadow-sm"
                        aria-hidden="true"
                    >
                        ✦
                    </div>

                    <h3
                        class="mt-5 font-bold text-slate-950"
                    >
                        Trusted support
                    </h3>

                    <p
                        class="mt-2 text-sm text-slate-600 leading-6"
                    >
                        Professional, respectful and dependable care.
                    </p>

                </article>

            </div>


            <a
                href="about.php"
                class="reveal reveal-delay-3 mt-9 inline-flex items-center gap-3 text-sm font-bold text-emerald-700 hover:gap-5 transition-all duration-300"
                aria-label="Learn more about <?= h($organization) ?>"
            >

                Discover our story

                <span aria-hidden="true">
                    →
                </span>

            </a>

        </div>


        <!-- IMAGE -->

        <div
            class="reveal relative"
        >

            <div
                class="relative overflow-hidden rounded-[2rem] shadow-2xl"
            >

                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9_wJEVUEuaPwF_Squ_23QUW9Vuu040k6r8uGKVu-pCQ&s=10"
                    class="w-full h-[520px] object-cover hover:scale-105 transition duration-1000"
                    alt="<?= h($organization) ?> providing compassionate, person-centered home care and community support"
                    width="1200"
                    height="800"
                    loading="lazy"
                    decoding="async"
                >

            </div>


            <!-- FLOATING CARD -->

            <aside
                class="floating-decoration absolute -bottom-7 -left-4 md:-left-8 max-w-sm rounded-2xl bg-white p-6 shadow-2xl border border-slate-100"
                aria-label="Our care promise"
            >

                <div
                    class="text-xs font-bold uppercase tracking-[.18em] text-emerald-700"
                >
                    Our promise
                </div>

                <div
                    class="mt-2 text-xl font-black text-slate-950"
                >
                    Open Hands. Open Hearts.
                </div>

                <div
                    class="mt-1 text-sm text-slate-500"
                >
                    A true home for your loved one.
                </div>

            </aside>


        </div>


    </div>

</div>


</section>

<!-- =========================================================
     SERVICES
========================================================= -->

<section
    class="relative overflow-hidden bg-slate-50 py-24 lg:py-32"
    id="servicesSection"
    aria-labelledby="services-heading"
>


<div
    class="pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full bg-emerald-100/50 blur-3xl"
    aria-hidden="true"
></div>


<div
    class="pointer-events-none absolute bottom-0 -left-32 h-80 w-80 rounded-full bg-emerald-100/30 blur-3xl"
    aria-hidden="true"
></div>


<div
    class="relative max-w-7xl mx-auto px-5"
>


    <!-- HEADER -->

    <div
        class="flex flex-col md:flex-row md:items-end justify-between gap-7 mb-12"
    >

        <div class="max-w-2xl">

            <div
                class="reveal flex items-center gap-3 text-xs font-bold uppercase tracking-[.2em] text-emerald-700"
            >

                <span
                    class="w-8 h-px bg-emerald-600"
                    aria-hidden="true"
                ></span>

                What we offer

            </div>


            <h2
                id="services-heading"
                class="reveal reveal-delay-1 mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-[-.045em] leading-[1.02] text-slate-950"
            >

                Support designed around you.

            </h2>


            <p
                class="reveal reveal-delay-2 mt-5 text-lg text-slate-600 leading-8 max-w-xl"
            >

                Thoughtful services delivered with dignity, professionalism and genuine care.

            </p>

        </div>


        <!-- CONTROLS -->

        <div
            class="flex items-center gap-3"
        >

            <button
                type="button"
                id="servicePrev"
                class="w-12 h-12 rounded-full border border-slate-300 bg-white text-slate-700 flex items-center justify-center hover:bg-emerald-600 hover:border-emerald-600 hover:text-white transition-all duration-300"
                aria-label="Previous home care services"
            >
                ←
            </button>


            <button
                type="button"
                id="serviceNext"
                class="w-12 h-12 rounded-full border border-slate-300 bg-white text-slate-700 flex items-center justify-center hover:bg-emerald-600 hover:border-emerald-600 hover:text-white transition-all duration-300"
                aria-label="Next home care services"
            >
                →
            </button>

        </div>

    </div>


    <!-- SERVICE TRACK -->

    <div
        id="serviceViewport"
        class="carousel-viewport"
        aria-label="Home care services"
    >

        <div
            id="serviceTrack"
            class="carousel-track"
        >


            <?php

            $services = [

                [
                    '01',
                    'Personalized Daily Living Assistance',
                    'Hands-on support with essential activities of daily living, delivered with patience, dignity and respect.',
                    '♥'
                ],

                [
                    '02',
                    'Medication Management & Health Monitoring',
                    'Reliable oversight of medications and health indicators, coordinated with physicians and family.',
                    '⌖'
                ],

                [
                    '03',
                    'Memory Care Support',
                    'A calm, secure and familiar environment designed around the needs of residents with memory-related conditions.',
                    '✦'
                ],

                [
                    '04',
                    'Companionship & Social Support',
                    'Meaningful companionship and activities that encourage connection, confidence and belonging.',
                    '♡'
                ],

                [
                    '05',
                    'Personal Care',
                    'Respectful assistance with personal routines while protecting independence, privacy and dignity.',
                    '＋'
                ],

                [
                    '06',
                    'Family Support',
                    'Clear communication and thoughtful support that helps families stay informed and connected.',
                    '⌂'
                ]

            ];


            foreach ($services as $s):

            ?>


                <article
                    class="service-card group shrink-0 w-[86%] sm:w-[60%] md:w-[47%] lg:w-[32%] rounded-3xl bg-white border border-slate-200/80 p-8 md:p-9 hover:-translate-y-2 hover:shadow-2xl hover:shadow-slate-900/5 transition-all duration-500"
                >


                    <!-- NUMBER -->

                    <div
                        class="flex justify-between items-start"
                    >

                        <div
                            class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl group-hover:bg-emerald-600 group-hover:text-white group-hover:rotate-3 transition-all duration-500"
                            aria-hidden="true"
                        >

                            <?= h($s[3]) ?>

                        </div>


                        <span
                            class="text-xs font-bold tracking-widest text-slate-300"
                            aria-hidden="true"
                        >
                            <?= h($s[0]) ?>
                        </span>

                    </div>


                    <h3
                        class="mt-8 text-xl font-bold text-slate-950 leading-7"
                    >

                        <?= h($s[1]) ?>

                    </h3>


                    <p
                        class="mt-4 text-sm text-slate-600 leading-7"
                    >

                        <?= h($s[2]) ?>

                    </p>


                    <a
                        href="services.php"
                        class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-emerald-700 group-hover:gap-4 transition-all duration-300"
                        aria-label="Learn more about <?= h($s[1]) ?>"
                    >

                        Learn more

                        <span aria-hidden="true">
                            →
                        </span>

                    </a>


                </article>


            <?php endforeach; ?>


        </div>

    </div>


    <!-- FOOTER -->

    <div
        class="mt-9 flex items-center justify-between"
    >

        <div
            id="serviceDots"
            class="flex items-center gap-2"
            aria-label="Service carousel navigation"
        ></div>


        <a
            href="services.php"
            class="hidden sm:inline-flex items-center gap-2 text-sm font-bold text-emerald-700"
            aria-label="Explore all home care services offered by <?= h($organization) ?>"
        >

            Explore all services

            <span aria-hidden="true">
                →
            </span>

        </a>

    </div>


</div>


</section>

<!-- =========================================================
     TOURS
========================================================= -->

<?php if ($tours): ?>

<section
    class="relative overflow-hidden bg-white py-24"
    aria-labelledby="tours-heading"
>


<div
    class="max-w-7xl mx-auto px-5"
>


    <div
        class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12"
    >

        <div>

            <div
                class="reveal flex items-center gap-3 text-xs font-bold uppercase tracking-[.2em] text-emerald-700"
            >

                <span
                    class="w-8 h-px bg-emerald-600"
                    aria-hidden="true"
                ></span>

                Visit us

            </div>


            <h2
                id="tours-heading"
                class="reveal reveal-delay-1 mt-5 text-4xl md:text-5xl font-black tracking-[-.04em]"
            >

                Upcoming tours.

            </h2>


            <p
                class="reveal reveal-delay-2 mt-3 text-slate-500"
            >

                Come meet the team and experience our community.

            </p>

        </div>

    </div>


    <div
        class="grid md:grid-cols-3 gap-5"
    >

        <?php foreach ($tours as $index => $t): ?>

            <article
                class="reveal group rounded-3xl border border-slate-200 bg-white p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-500"
            >

                <div
                    class="flex gap-4"
                >

                    <div
                        class="rounded-2xl bg-emerald-50 text-emerald-800 p-3 text-center min-w-[64px] h-fit"
                        aria-hidden="true"
                    >

                        <div
                            class="text-xs font-bold uppercase"
                        >

                            <?= date('M', strtotime($t['tour_date'])) ?>

                        </div>


                        <div
                            class="text-2xl font-black"
                        >

                            <?= date('d', strtotime($t['tour_date'])) ?>

                        </div>

                    </div>


                    <div>

                        <h3
                            class="font-bold text-lg text-slate-950"
                        >

                            <?= h($t['title']) ?>

                        </h3>


                        <p
                            class="text-sm text-slate-500 mt-1"
                        >

                            <span aria-hidden="true">◷</span>

                            <?= h(
                                $t['tour_time']
                                    ? date('g:i A', strtotime($t['tour_time']))
                                    : 'Time TBA'
                            ) ?>

                        </p>

                    </div>

                </div>


                <p
                    class="mt-5 text-sm font-medium text-slate-700"
                >

                    <span aria-hidden="true">⌖</span>

                    <?= h($t['location']) ?>

                </p>


                <p
                    class="mt-3 text-sm text-slate-500 leading-6"
                >

                    <?= h(excerpt($t['description'], 120)) ?>

                </p>

            </article>

        <?php endforeach; ?>

    </div>

</div>


</section>

<?php endif; ?>

<!-- =========================================================
     GALLERY
========================================================= -->

<?php if ($gallery): ?>

<section
    class="relative overflow-hidden bg-slate-950 text-white py-24 lg:py-32"
    id="gallerySection"
    aria-labelledby="gallery-heading"
>


<!-- Background decoration -->

<div
    class="pointer-events-none absolute top-10 right-10 w-48 h-48 rounded-full border border-emerald-400/10"
    aria-hidden="true"
></div>


<div
    class="pointer-events-none absolute bottom-0 -left-32 w-96 h-96 rounded-full bg-emerald-500/5 blur-3xl"
    aria-hidden="true"
></div>


<div
    class="relative max-w-7xl mx-auto px-5"
>


    <!-- HEADER -->

    <div
        class="flex flex-col md:flex-row md:items-end justify-between gap-7 mb-12"
    >

        <div
            class="max-w-2xl"
        >

            <div
                class="reveal flex items-center gap-3 text-xs font-bold uppercase tracking-[.2em] text-emerald-300"
            >

                <span
                    class="w-8 h-px bg-emerald-400"
                    aria-hidden="true"
                ></span>

                Our community

            </div>


            <h2
                id="gallery-heading"
                class="reveal reveal-delay-1 mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-[-.045em]"
            >

                Moments that matter.

            </h2>


            <p
                class="reveal reveal-delay-2 mt-5 text-slate-400 leading-7 max-w-xl"
            >

                A glimpse into the people, places and moments that make our community feel like home.

            </p>

        </div>


        <!-- CONTROLS -->

        <div
            class="flex items-center gap-3"
        >

            <button
                type="button"
                id="galleryPrev"
                class="w-12 h-12 rounded-full border border-white/15 bg-white/5 hover:bg-emerald-600 hover:border-emerald-600 flex items-center justify-center transition"
                aria-label="Previous community gallery image"
            >
                ←
            </button>


            <button
                type="button"
                id="galleryNext"
                class="w-12 h-12 rounded-full border border-white/15 bg-white/5 hover:bg-emerald-600 hover:border-emerald-600 flex items-center justify-center transition"
                aria-label="Next community gallery image"
            >
                →
            </button>

        </div>

    </div>


    <!-- GALLERY TRACK -->

    <div
        id="galleryViewport"
        class="carousel-viewport"
        aria-label="Community photo gallery"
    >

        <div
            id="galleryTrack"
            class="carousel-track"
        >

            <?php foreach ($gallery as $galleryIndex => $g): ?>

                <a
                    href="gallery.php"
                    class="gallery-card group shrink-0 w-[88%] sm:w-[60%] md:w-[47%] lg:w-[32%] aspect-[4/3] overflow-hidden rounded-3xl bg-slate-900"
                    aria-label="View <?= h($g['title']) ?> in the community gallery"
                >


                    <img
                        src="<?= h('./admin/' . assetImage($g['image_url'])) ?>"
                        alt="<?= h($g['title'] . ' - ' . $organization . ' community') ?>"
                        class="w-full h-full object-cover"
                        width="1200"
                        height="900"
                        loading="lazy"
                        decoding="async"
                    >


                    <!-- OVERLAY -->

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/10 to-transparent"
                        aria-hidden="true"
                    ></div>


                    <!-- NUMBER -->

                    <div
                        class="absolute top-5 left-5"
                        aria-hidden="true"
                    >

                        <span
                            class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-black/30 backdrop-blur border border-white/10 text-xs font-bold"
                        >

                            <?= str_pad($galleryIndex + 1, 2, '0', STR_PAD_LEFT) ?>

                        </span>

                    </div>


                    <!-- CONTENT -->

                    <div
                        class="absolute bottom-0 left-0 right-0 p-6"
                    >

                        <div
                            class="text-[11px] uppercase tracking-[.18em] text-emerald-300 font-bold"
                        >
                            Community
                        </div>


                        <div
                            class="mt-2 text-lg font-bold"
                        >

                            <?= h($g['title']) ?>

                        </div>


                        <div
                            class="mt-2 flex items-center gap-2 text-xs text-white/60 group-hover:text-emerald-300 transition"
                        >

                            View gallery

                            <span
                                class="group-hover:translate-x-1 transition"
                                aria-hidden="true"
                            >
                                →
                            </span>

                        </div>

                    </div>


                </a>

            <?php endforeach; ?>

        </div>

    </div>


    <div
        class="mt-9 flex items-center justify-between"
    >

        <div
            id="galleryDots"
            class="dark-dots flex gap-2"
            aria-label="Gallery carousel navigation"
        ></div>


        <a
            href="gallery.php"
            class="hidden sm:inline-flex items-center gap-2 text-sm font-bold text-emerald-300"
            aria-label="View the full <?= h($organization) ?> community gallery"
        >

            View full gallery

            <span aria-hidden="true">
                →
            </span>

        </a>

    </div>


</div>


</section>

<?php endif; ?>

<!-- =========================================================
     BLOG
========================================================= -->

<?php if ($blogs): ?>

<section
    class="relative overflow-hidden bg-white py-24 lg:py-32"
    id="blogSection"
    aria-labelledby="blog-heading"
>


<!-- Decoration -->

<div
    class="pointer-events-none absolute -right-32 top-10 h-80 w-80 rounded-full bg-emerald-50 blur-3xl"
    aria-hidden="true"
></div>


<div
    class="relative max-w-7xl mx-auto px-5"
>


    <!-- HEADER -->

    <div
        class="flex flex-col md:flex-row md:items-end justify-between gap-7 mb-12"
    >

        <div
            class="max-w-2xl"
        >

            <div
                class="reveal flex items-center gap-3 text-xs font-bold uppercase tracking-[.2em] text-emerald-700"
            >

                <span
                    class="w-8 h-px bg-emerald-600"
                    aria-hidden="true"
                ></span>

                Latest updates

            </div>


            <h2
                id="blog-heading"
                class="reveal reveal-delay-1 mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-[-.045em]"
            >

                From our journal.

            </h2>


            <p
                class="reveal reveal-delay-2 mt-5 text-slate-600 leading-7 max-w-xl"
            >

                Stories, helpful information and updates from our community.

            </p>

        </div>


        <!-- CONTROLS -->

        <div
            class="flex items-center gap-3"
        >

            <button
                type="button"
                id="blogPrev"
                class="w-12 h-12 rounded-full border border-slate-300 bg-white hover:bg-emerald-600 hover:border-emerald-600 hover:text-white flex items-center justify-center transition"
                aria-label="Previous articles"
            >
                ←
            </button>


            <button
                type="button"
                id="blogNext"
                class="w-12 h-12 rounded-full border border-slate-300 bg-white hover:bg-emerald-600 hover:border-emerald-600 hover:text-white flex items-center justify-center transition"
                aria-label="Next articles"
            >
                →
            </button>

        </div>

    </div>


    <!-- BLOG TRACK -->

    <div
        id="blogViewport"
        class="carousel-viewport"
        aria-label="Latest articles"
    >

        <div
            id="blogTrack"
            class="carousel-track"
        >

            <?php foreach ($blogs as $b): ?>

                <article
                    class="blog-card group shrink-0 w-[88%] sm:w-[60%] md:w-[47%] lg:w-[32%]"
                >


                    <!-- IMAGE -->

                    <a
                        href="blog_detail.php?slug=<?= urlencode($b['slug']) ?>"
                        class="relative block aspect-[16/10] overflow-hidden rounded-3xl bg-slate-100"
                        aria-label="Read: <?= h($b['title']) ?>"
                    >

                        <img
                            src="<?= h('./admin/' . assetImage($b['featured_image'])) ?>"
                            alt="<?= h($b['title'] . ' - ' . $organization) ?>"
                            class="blog-image w-full h-full object-cover"
                            width="1200"
                            height="750"
                            loading="lazy"
                            decoding="async"
                        >


                        <div
                            class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-500"
                            aria-hidden="true"
                        ></div>


                        <div
                            class="absolute right-5 bottom-5 w-11 h-11 rounded-full bg-white text-slate-900 flex items-center justify-center opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 shadow-lg"
                            aria-hidden="true"
                        >

                            →

                        </div>

                    </a>


                    <!-- CONTENT -->

                    <div
                        class="pt-6"
                    >

                        <div
                            class="flex items-center gap-3 text-xs uppercase tracking-wider font-bold text-emerald-700"
                        >

                            <time
                                datetime="<?= h(
                                    date(
                                        'Y-m-d',
                                        strtotime(
                                            $b['published_at']
                                                ?: $b['created_at']
                                        )
                                    )
                                ) ?>"
                            >

                                <?= h(
                                    $b['published_at']
                                        ? date('M d, Y', strtotime($b['published_at']))
                                        : date('M d, Y', strtotime($b['created_at']))
                                ) ?>

                            </time>


                            <span
                                class="w-1 h-1 rounded-full bg-slate-300"
                                aria-hidden="true"
                            ></span>


                            <span>
                                Community
                            </span>

                        </div>


                        <h3
                            class="mt-3 text-xl md:text-2xl font-bold leading-7 text-slate-950 group-hover:text-emerald-700 transition"
                        >

                            <?= h($b['title']) ?>

                        </h3>


                        <p
                            class="mt-3 text-sm text-slate-600 leading-7"
                        >

                            <?= h(
                                excerpt(
                                    $b['excerpt'] ?: $b['content']
                                )
                            ) ?>

                        </p>


                        <a
                            href="blog_detail.php?slug=<?= urlencode($b['slug']) ?>"
                            class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-emerald-700 group-hover:gap-4 transition-all"
                            aria-label="Read article: <?= h($b['title']) ?>"
                        >

                            Read article

                            <span aria-hidden="true">
                                →
                            </span>

                        </a>

                    </div>


                </article>

            <?php endforeach; ?>

        </div>

    </div>


    <div
        class="mt-9 flex items-center justify-between"
    >

        <div
            id="blogDots"
            class="flex gap-2"
            aria-label="Article carousel navigation"
        ></div>


        <a
            href="blog.php"
            class="hidden sm:inline-flex items-center gap-2 text-sm font-bold text-emerald-700"
            aria-label="Read all articles from <?= h($organization) ?>"
        >

            View all articles

            <span aria-hidden="true">
                →
            </span>

        </a>

    </div>


</div>


</section>

<?php endif; ?>

<!-- =========================================================
     FINAL CTA
========================================================= -->

<section
    class="relative overflow-hidden py-24 lg:py-32"
    aria-labelledby="contact-heading"
>


<div
    class="max-w-7xl mx-auto px-5"
>

    <div
        class="relative overflow-hidden rounded-[2rem] bg-emerald-700 px-8 py-12 md:px-12 md:py-16 lg:px-16"
    >


        <!-- Background circles -->

        <div
            class="floating-decoration pointer-events-none absolute -right-20 -top-20 w-72 h-72 rounded-full border border-white/10"
            aria-hidden="true"
        ></div>


        <div
            class="floating-decoration-slow pointer-events-none absolute -bottom-24 right-32 w-48 h-48 rounded-full bg-white/5"
            aria-hidden="true"
        ></div>


        <div
            class="relative flex flex-col lg:flex-row lg:items-center justify-between gap-10"
        >

            <div
                class="max-w-3xl"
            >

                <div
                    class="reveal text-emerald-100 uppercase tracking-[.18em] text-xs font-bold"
                >

                    Let's connect

                </div>


                <h2
                    id="contact-heading"
                    class="reveal reveal-delay-1 mt-4 text-4xl md:text-5xl lg:text-6xl font-black tracking-[-.045em] text-white"
                >

                    Have questions about our care?

                </h2>


                <p
                    class="reveal reveal-delay-2 mt-5 text-emerald-50 max-w-2xl text-lg leading-8"
                >

                    We are here to listen, answer your questions and help you find the right next step.

                </p>

            </div>


            <a
                href="contact.php"
                class="premium-button shrink-0 inline-flex items-center justify-center gap-3 rounded-full bg-white text-emerald-800 px-8 py-4 font-bold"
                aria-label="Contact <?= h($organization) ?>"
            >

                Contact Us

                <span aria-hidden="true">
                    →
                </span>

            </a>

        </div>


    </div>

</div>


</section>

</main>

<!-- =========================================================
     SEO STRUCTURED DATA
========================================================= -->

<!-- Organization structured data -->

<script type="application/ld+json">
<?= json_encode(
    [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $organization,
        'url' => $canonicalUrl,
        'logo' => $seoImage,
        'description' => $pageDescription
    ],
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_PRETTY_PRINT
) ?>
</script>

<?php if ($blogs): ?>

<!-- Blog listing structured data -->

<script type="application/ld+json">
<?= json_encode(
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'name' => 'Latest articles from ' . $organization,
        'numberOfItems' => count($blogs),
        'itemListElement' => array_map(
            function ($blog, $index) {

                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $blog['title'],
                    'url' =>
                        'https://' .
                        ($_SERVER['HTTP_HOST'] ?? 'example.com') .
                        '/blog_detail.php?slug=' .
                        urlencode($blog['slug'])
                ];

            },
            $blogs,
            array_keys($blogs)
        )
    ],
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_PRETTY_PRINT
) ?>
</script>

<?php endif; ?>

<?php require_once __DIR__ . '/footer.php'; ?>

<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /* =====================================================
           HERO SLIDER
        ===================================================== */

        const heroSlides =
            Array.from(
                document.querySelectorAll(
                    '[data-hero-slide]'
                )
            );


        const heroDots =
            Array.from(
                document.querySelectorAll(
                    '[data-hero-dot]'
                )
            );


        const heroNext =
            document.getElementById(
                'heroNext'
            );


        const heroPrev =
            document.getElementById(
                'heroPrev'
            );


        const heroCurrent =
            document.getElementById(
                'heroCurrent'
            );


        let heroIndex = 0;

        let heroTimer = null;


        function showHero(index) {


            if (!heroSlides.length) {
                return;
            }


            if (index >= heroSlides.length) {
                index = 0;
            }


            if (index < 0) {
                index =
                    heroSlides.length - 1;
            }


            heroSlides.forEach(
                function (slide, i) {

                    slide.classList.toggle(
                        'active',
                        i === index
                    );

                }
            );


            heroDots.forEach(
                function (dot, i) {

                    const active =
                        i === index;


                    dot.classList.toggle(
                        'bg-white',
                        active
                    );


                    dot.classList.toggle(
                        'w-10',
                        active
                    );


                    dot.classList.toggle(
                        'bg-white/30',
                        !active
                    );


                    dot.classList.toggle(
                        'w-2',
                        !active
                    );


                    dot.setAttribute(
                        'aria-selected',
                        active
                            ? 'true'
                            : 'false'
                    );

                }
            );


            if (heroCurrent) {

                heroCurrent.textContent =
                    String(index + 1).padStart(
                        2,
                        '0'
                    );

            }


            heroIndex = index;

        }


        function nextHero() {

            showHero(
                heroIndex + 1
            );

        }


        function previousHero() {

            showHero(
                heroIndex - 1
            );

        }


        function startHeroTimer() {

            clearInterval(
                heroTimer
            );


            if (heroSlides.length <= 1) {
                return;
            }


            heroTimer =
                setInterval(
                    nextHero,
                    6000
                );

        }


        heroDots.forEach(
            function (dot) {

                dot.addEventListener(
                    'click',
                    function () {

                        showHero(
                            Number(
                                dot.dataset.heroDot
                            )
                        );

                        startHeroTimer();

                    }
                );

            }
        );


        if (heroNext) {

            heroNext.addEventListener(
                'click',
                function () {

                    nextHero();

                    startHeroTimer();

                }
            );

        }


        if (heroPrev) {

            heroPrev.addEventListener(
                'click',
                function () {

                    previousHero();

                    startHeroTimer();

                }
            );

        }


        showHero(0);

        startHeroTimer();


        /* =====================================================
           GENERIC CAROUSEL
        ===================================================== */

        function createCarousel(config) {


            const track =
                document.getElementById(
                    config.track
                );


            const viewport =
                document.getElementById(
                    config.viewport
                );


            const nextButton =
                document.getElementById(
                    config.next
                );


            const prevButton =
                document.getElementById(
                    config.prev
                );


            const dotsContainer =
                document.getElementById(
                    config.dots
                );


            if (!track || !viewport) {
                return;
            }


            const items =
                Array.from(
                    track.children
                );


            if (!items.length) {
                return;
            }


            let current = 0;

            let timer = null;

            let isHovering = false;

            let touchStartX = 0;


            /* -------------------------------------------------
               VISIBLE ITEMS
            ------------------------------------------------- */

            function visibleItems() {


                if (window.innerWidth >= 1024) {
                    return 3;
                }


                if (window.innerWidth >= 768) {
                    return 2;
                }


                if (window.innerWidth >= 640) {
                    return 1.5;
                }


                return 1;

            }


            /* -------------------------------------------------
               STEP
            ------------------------------------------------- */

            function getStep() {


                if (!items[0]) {
                    return 0;
                }


                const width =
                    items[0].getBoundingClientRect().width;


                const style =
                    window.getComputedStyle(
                        track
                    );


                const gap =
                    parseFloat(
                        style.gap || '0'
                    );


                return width + gap;

            }


            /* -------------------------------------------------
               MAX INDEX
            ------------------------------------------------- */

            function maxIndex() {

                return Math.max(
                    0,
                    Math.ceil(
                        items.length -
                        visibleItems()
                    )
                );

            }


            /* -------------------------------------------------
               DOTS
            ------------------------------------------------- */

            function buildDots() {


                if (!dotsContainer) {
                    return;
                }


                dotsContainer.innerHTML =
                    '';


                const total =
                    maxIndex() + 1;


                for (
                    let i = 0;
                    i < total;
                    i++
                ) {


                    const dot =
                        document.createElement(
                            'button'
                        );


                    dot.type =
                        'button';


                    dot.className =
                        'carousel-dot';


                    dot.setAttribute(
                        'aria-label',
                        'Go to carousel slide ' +
                        (i + 1)
                    );


                    dot.addEventListener(
                        'click',
                        function () {

                            current = i;

                            update();

                            restart();

                        }
                    );


                    dotsContainer.appendChild(
                        dot
                    );

                }


                updateDots();

            }


            /* -------------------------------------------------
               DOT UPDATE
            ------------------------------------------------- */

            function updateDots() {


                if (!dotsContainer) {
                    return;
                }


                const dots =
                    Array.from(
                        dotsContainer.children
                    );


                dots.forEach(
                    function (dot, i) {

                        dot.classList.toggle(
                            'active',
                            i === current
                        );

                    }
                );

            }


            /* -------------------------------------------------
               UPDATE
            ------------------------------------------------- */

            function update() {


                const max =
                    maxIndex();


                if (current > max) {
                    current = 0;
                }


                if (current < 0) {
                    current = max;
                }


                track.style.transform =
                    'translate3d(-' +
                    (
                        current *
                        getStep()
                    ) +
                    'px,0,0)';


                updateDots();

            }


            /* -------------------------------------------------
               NEXT
            ------------------------------------------------- */

            function next() {


                const max =
                    maxIndex();


                if (current >= max) {

                    current = 0;

                } else {

                    current++;

                }


                update();

            }


            /* -------------------------------------------------
               PREVIOUS
            ------------------------------------------------- */

            function previous() {


                const max =
                    maxIndex();


                if (current <= 0) {

                    current = max;

                } else {

                    current--;

                }


                update();

            }


            /* -------------------------------------------------
               AUTOPLAY
            ------------------------------------------------- */

            function start() {


                clearInterval(
                    timer
                );


                if (
                    items.length <=
                    Math.ceil(
                        visibleItems()
                    )
                ) {

                    return;

                }


                timer =
                    setInterval(
                        function () {

                            if (!isHovering) {
                                next();
                            }

                        },
                        config.autoplay
                    );

            }


            function restart() {

                start();

            }


            /* -------------------------------------------------
               BUTTONS
            ------------------------------------------------- */

            if (nextButton) {

                nextButton.addEventListener(
                    'click',
                    function () {

                        next();

                        restart();

                    }
                );

            }


            if (prevButton) {

                prevButton.addEventListener(
                    'click',
                    function () {

                        previous();

                        restart();

                    }
                );

            }


            /* -------------------------------------------------
               HOVER PAUSE
            ------------------------------------------------- */

            viewport.addEventListener(
                'mouseenter',
                function () {

                    isHovering = true;

                }
            );


            viewport.addEventListener(
                'mouseleave',
                function () {

                    isHovering = false;

                }
            );


            /* -------------------------------------------------
               TOUCH SWIPE
            ------------------------------------------------- */

            viewport.addEventListener(
                'touchstart',
                function (event) {

                    touchStartX =
                        event.changedTouches[0].screenX;

                },
                {
                    passive: true
                }
            );


            viewport.addEventListener(
                'touchend',
                function (event) {

                    const touchEndX =
                        event.changedTouches[0].screenX;


                    const difference =
                        touchStartX -
                        touchEndX;


                    if (
                        Math.abs(difference) <
                        40
                    ) {

                        return;

                    }


                    if (difference > 0) {

                        next();

                    } else {

                        previous();

                    }


                    restart();

                },
                {
                    passive: true
                }
            );


            /* -------------------------------------------------
               RESIZE
            ------------------------------------------------- */

            let resizeTimer;


            window.addEventListener(
                'resize',
                function () {

                    clearTimeout(
                        resizeTimer
                    );


                    resizeTimer =
                        setTimeout(
                            function () {

                                buildDots();

                                update();

                            },
                            150
                        );

                }
            );


            /* -------------------------------------------------
               INIT
            ------------------------------------------------- */

            buildDots();

            update();

            start();

        }


        /* =====================================================
           SERVICES
        ===================================================== */

        createCarousel({

            track:
                'serviceTrack',

            viewport:
                'serviceViewport',

            next:
                'serviceNext',

            prev:
                'servicePrev',

            dots:
                'serviceDots',

            autoplay:
                4200

        });


        /* =====================================================
           GALLERY
        ===================================================== */

        createCarousel({

            track:
                'galleryTrack',

            viewport:
                'galleryViewport',

            next:
                'galleryNext',

            prev:
                'galleryPrev',

            dots:
                'galleryDots',

            autoplay:
                4500

        });


        /* =====================================================
           BLOG
        ===================================================== */

        createCarousel({

            track:
                'blogTrack',

            viewport:
                'blogViewport',

            next:
                'blogNext',

            prev:
                'blogPrev',

            dots:
                'blogDots',

            autoplay:
                5500

        });


        /* =====================================================
           SCROLL REVEAL
        ===================================================== */

        const revealElements =
            document.querySelectorAll(
                '.reveal'
            );


        if (
            'IntersectionObserver'
            in window
        ) {


            const observer =
                new IntersectionObserver(
                    function (
                        entries
                    ) {


                        entries.forEach(
                            function (
                                entry
                            ) {


                                if (
                                    entry.isIntersecting
                                ) {


                                    entry.target.classList.add(
                                        'is-visible'
                                    );


                                    observer.unobserve(
                                        entry.target
                                    );


                                }

                            }
                        );


                    },
                    {
                        threshold:
                            .10,

                        rootMargin:
                            '0px 0px -50px 0px'
                    }
                );


            revealElements.forEach(
                function (element) {

                    observer.observe(
                        element
                    );

                }
            );


        } else {


            revealElements.forEach(
                function (element) {

                    element.classList.add(
                        'is-visible'
                    );

                }
            );

        }


        /* =====================================================
           CARD REVEAL
        ===================================================== */

        const cards =
            document.querySelectorAll(
                '.service-card, .blog-card, .gallery-card'
            );


        if (
            'IntersectionObserver'
            in window
        ) {


            const cardObserver =
                new IntersectionObserver(
                    function (
                        entries
                    ) {


                        entries.forEach(
                            function (
                                entry
                            ) {


                                if (
                                    entry.isIntersecting
                                ) {


                                    entry.target.style.opacity =
                                        '1';


                                    entry.target.style.transform =
                                        'translateY(0)';


                                    cardObserver.unobserve(
                                        entry.target
                                    );

                                }

                            }
                        );


                    },
                    {
                        threshold:
                            .08
                    }
                );


            cards.forEach(
                function (
                    card,
                    index
                ) {


                    card.style.opacity =
                        '0';


                    card.style.transform =
                        'translateY(25px)';


                    card.style.transition =
                        'opacity .7s ease ' +
                        Math.min(
                            index * .06,
                            .4
                        ) +
                        's, transform .7s cubic-bezier(.22,1,.36,1) ' +
                        Math.min(
                            index * .06,
                            .4
                        ) +
                        's';


                    cardObserver.observe(
                        card
                    );

                }
            );

        }


        /* =====================================================
           PAUSE HERO WHEN TAB IS NOT ACTIVE
        ===================================================== */

        document.addEventListener(
            'visibilitychange',
            function () {

                if (
                    document.hidden
                ) {

                    clearInterval(
                        heroTimer
                    );

                } else {

                    startHeroTimer();

                }

            }
        );


    }

);

</script>
