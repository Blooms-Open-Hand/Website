<?php

$pageTitle = 'About Blooms Open Hand Adult Family Home';

$pageDescription = 'Learn about Blooms Open Hand Adult Family Home in Marysville, Washington — our mission, values, team, history, and personalized approach to senior and adult family home care.';

$pageKeywords = 'Blooms Open Hand, adult family home Marysville WA, adult family home Marysville Washington, senior care Marysville WA, elderly care Marysville WA, residential care Marysville, personalized senior care, 24 hour adult family home, Snohomish County senior care, home care Marysville';

$pageCanonical = 'about.php';

$pageType = 'website';

$pageImage = 'assets/images/about/home-exterior.jpg';

$pageImageAlt = 'Blooms Open Hand Adult Family Home in Marysville, Washington';

$pageSchemaType = 'AboutPage';

require_once __DIR__.'/header.php';

?>

<!-- =========================================================
     ABOUT PAGE
     Blooms Open Hand Adult Family Home
     ========================================================= -->

<style>

  /* ---------------------------------------------------------
     Page animations
     --------------------------------------------------------- */

  @keyframes floatSlow {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
    }
    50% {
      transform: translateY(-14px) rotate(2deg);
    }
  }

  @keyframes floatReverse {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
    }
    50% {
      transform: translateY(12px) rotate(-2deg);
    }
  }

  @keyframes pulseSoft {
    0%, 100% {
      opacity: .35;
      transform: scale(1);
    }
    50% {
      opacity: .7;
      transform: scale(1.08);
    }
  }

  @keyframes shine {
    0% {
      transform: translateX(-120%);
    }
    100% {
      transform: translateX(120%);
    }
  }

  .about-float {
    animation: floatSlow 6s ease-in-out infinite;
  }

  .about-float-reverse {
    animation: floatReverse 7s ease-in-out infinite;
  }

  .about-pulse {
    animation: pulseSoft 5s ease-in-out infinite;
  }

  .about-shine {
    position: relative;
    overflow: hidden;
  }

  .about-shine::after {
    content: "";
    position: absolute;
    inset: 0;
    width: 45%;
    background: linear-gradient(
      90deg,
      transparent,
      rgba(255,255,255,.14),
      transparent
    );
    transform: translateX(-120%);
    animation: shine 6s ease-in-out infinite;
    pointer-events: none;
  }

  /* ---------------------------------------------------------
     Scroll reveal
     --------------------------------------------------------- */

  .reveal {
    opacity: 0;
    transform: translateY(28px);
    transition:
      opacity .8s ease,
      transform .8s cubic-bezier(.2,.8,.2,1);
  }

  .reveal-left {
    opacity: 0;
    transform: translateX(-35px);
    transition:
      opacity .8s ease,
      transform .8s cubic-bezier(.2,.8,.2,1);
  }

  .reveal-right {
    opacity: 0;
    transform: translateX(35px);
    transition:
      opacity .8s ease,
      transform .8s cubic-bezier(.2,.8,.2,1);
  }

  .reveal.is-visible,
  .reveal-left.is-visible,
  .reveal-right.is-visible {
    opacity: 1;
    transform: translate(0);
  }

  .delay-100 { transition-delay: .1s; }
  .delay-200 { transition-delay: .2s; }
  .delay-300 { transition-delay: .3s; }
  .delay-400 { transition-delay: .4s; }
  .delay-500 { transition-delay: .5s; }

  /* ---------------------------------------------------------
     Image hover
     --------------------------------------------------------- */

  .about-image {
    transition:
      transform .7s cubic-bezier(.2,.8,.2,1),
      filter .7s ease;
  }

  .about-image-wrap:hover .about-image {
    transform: scale(1.055);
    filter: saturate(1.08);
  }

  /* ---------------------------------------------------------
     Accessibility
     --------------------------------------------------------- */

  @media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
      animation-duration: .01ms !important;
      animation-iteration-count: 1 !important;
      scroll-behavior: auto !important;
      transition-duration: .01ms !important;
    }

    .reveal,
    .reveal-left,
    .reveal-right {
      opacity: 1;
      transform: none;
    }
  }

</style>

<!-- =========================================================
     HERO
     ========================================================= -->

<section
  class="relative overflow-hidden bg-[#063b2e] text-white"
  aria-labelledby="about-page-title"
>

  <!-- Decorative background -->

  <div class="absolute inset-0 pointer-events-none" aria-hidden="true">


<div class="absolute -right-40 -top-40 h-[32rem] w-[32rem] rounded-full border border-white/10"></div>

<div class="absolute right-20 top-20 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl about-pulse"></div>

<div class="absolute -left-32 bottom-[-12rem] h-[30rem] w-[30rem] rounded-full bg-emerald-300/10 blur-3xl"></div>

<div class="absolute left-[45%] top-20 h-2 w-2 rounded-full bg-emerald-300/60 about-float"></div>

<div class="absolute left-[60%] top-40 h-3 w-3 rounded-full bg-white/20 about-float-reverse"></div>

<div class="absolute right-[15%] bottom-32 h-2 w-2 rounded-full bg-emerald-200/50 about-float"></div>


  </div>

  <div class="relative max-w-7xl mx-auto px-5 py-20 lg:py-28">


<div class="grid lg:grid-cols-[1.05fr_.95fr] gap-12 lg:gap-16 items-center">

  <!-- Hero content -->
  <div class="reveal-left">

    <h1
      id="about-page-title"
      class="mt-7 max-w-4xl text-5xl md:text-6xl lg:text-[4rem] font-black tracking-tight leading-[.96]"
    >
      A true home where
      <span class="text-emerald-300">care feels personal.</span>
    </h1>

    <p class="mt-7 max-w-2xl text-lg md:text-xl text-emerald-50/85 leading-8">
      Blooms Open Hand Adult Family Home is a licensed residential-style
      adult family home in Marysville, Washington, offering personalized,
      round-the-clock care for seniors and adults who need support with
      daily living.
    </p>

  </div>


  <!-- Hero image -->
  <div class="relative reveal-right delay-200">

    <div class="absolute -inset-5 rounded-[3rem] border border-white/10" aria-hidden="true"></div>

    <div class="absolute -inset-2 rounded-[2.7rem] bg-emerald-400/10 blur-xl" aria-hidden="true"></div>

    <div class="relative about-image-wrap overflow-hidden rounded-[2.5rem] border border-white/10 bg-white/5 shadow-2xl">

      <img
        src="assets/images/about/home-exterior.jpg"
        alt="Blooms Open Hand Adult Family Home exterior in Marysville, Washington"
        class="about-image h-[500px] w-full object-cover lg:h-[620px]"
        width="1200"
        height="1600"
        fetchpriority="high"
        decoding="async"
        onerror="this.style.display='none'; this.parentElement.classList.add('hero-image-fallback');"
      >

      <!-- Fallback if image hasn't been uploaded -->
      <div class="absolute inset-0 -z-10 flex items-center justify-center bg-gradient-to-br from-emerald-900 via-[#063b2e] to-emerald-950">

        <div class="text-center px-8">

          <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-white/10 text-4xl" aria-hidden="true">
            ♥
          </div>

          <p class="mt-5 text-lg font-bold">
            Our Home
          </p>

          <p class="mt-2 text-sm text-emerald-100/60">
            Add your home exterior photo here
          </p>

        </div>

      </div>

      <!-- Image overlay -->
      <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent p-6 pt-24">

        <div class="flex items-end justify-between gap-4">

          <div>

            <div class="text-xs font-bold uppercase tracking-[.18em] text-emerald-200">
              Marysville, Washington
            </div>

            <div class="mt-2 text-xl font-black">
              More than a residence. A home.
            </div>

          </div>

          <div
            class="hidden sm:flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white text-[#063b2e] shadow-lg"
            aria-hidden="true"
          >
            ♥
          </div>

        </div>

      </div>

    </div>

    <!-- Floating card -->
    <div class="about-float absolute -bottom-7 -left-5 sm:-left-8 rounded-3xl border border-white/20 bg-white p-5 text-slate-900 shadow-2xl">

      <div class="flex items-center gap-4">

        <div
          class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-xl text-emerald-700"
          aria-hidden="true"
        >
          ✓
        </div>

        <div>

          <div class="text-xs font-bold uppercase tracking-wider text-slate-400">
            Our Promise
          </div>

          <div class="mt-1 font-black">
            Compassionate care
          </div>

        </div>

      </div>

    </div>

  </div>

</div>


  </div>

</section>

<!-- =========================================================
     INTRODUCTION
     ========================================================= -->

<section
  class="py-24 lg:py-32 bg-white"
  aria-labelledby="who-we-are-title"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

  <!-- Images -->
  <div class="relative reveal-left">

    <div class="grid grid-cols-5 gap-4">

      <!-- Large image -->
      <div class="h-[430px] col-span-3 about-image-wrap overflow-hidden rounded-[2rem] shadow-xl">

        <img
          src="assets/images/010.JPG"
          alt="Comfortable living space at Blooms Open Hand Adult Family Home"
          class="about-image h-[430px] w-full object-cover"
          width="1200"
          height="900"
          loading="lazy"
          decoding="async"
          onerror="this.style.display='none';"
        >

        <div class="h-[430px] bg-gradient-to-br from-emerald-100 to-emerald-50"></div>

      </div>

      <!-- Small images -->
      <div class="col-span-2 flex flex-col gap-4">

        <div class="h-[205px] about-image-wrap overflow-hidden rounded-[1.7rem] shadow-lg">

          <img
            src="assets/images/01.JPG"
            alt="Dining area at Blooms Open Hand Adult Family Home"
            class="about-image h-[205px] w-full object-cover"
            width="800"
            height="600"
            loading="lazy"
            decoding="async"
            onerror="this.style.display='none';"
          >

          <div class="h-[205px] bg-gradient-to-br from-slate-100 to-emerald-50"></div>

        </div>

        <div class="h-[205px] about-image-wrap overflow-hidden rounded-[1.7rem] shadow-lg">

          <img
            src="assets/images/013.JPG"
            alt="Resident bedroom at Blooms Open Hand Adult Family Home"
            class="about-image h-[205px] w-full object-cover"
            width="800"
            height="600"
            loading="lazy"
            decoding="async"
            onerror="this.style.display='none';"
          >

          <div class="h-[205px] bg-gradient-to-br from-emerald-50 to-slate-100"></div>

        </div>

      </div>

    </div>

    <!-- Floating statistic -->
    <div class="absolute -bottom-7 left-6 sm:left-10 rounded-3xl bg-[#063b2e] px-6 py-5 text-white shadow-2xl">

      <div class="flex items-center gap-4">

        <div class="text-4xl font-black">
          7+
        </div>

        <div class="h-10 w-px bg-white/20"></div>

        <div class="text-sm leading-5 text-emerald-100/75">
          Years of<br>
          serving families
        </div>

      </div>

    </div>

  </div>


  <!-- Text -->
  <div class="reveal-right delay-200">

    <span class="inline-flex items-center gap-2 text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
      <span class="h-px w-8 bg-emerald-600" aria-hidden="true"></span>
      Who we are
    </span>

    <h2
      id="who-we-are-title"
      class="mt-5 text-2xl md:text-3xl lg:text-5xl font-black tracking-tight leading-[1.02] text-slate-950"
    >
      Small enough to know you.
      <span class="text-emerald-700">Caring enough to know what matters.</span>
    </h2>

    <p class="mt-7 text-lg text-slate-600 leading-8">
      Rather than a large institutional facility, Blooms Open Hand is a
      real home where residents receive individualized attention from
      caregivers who know them by name, story, routine, and preference.
    </p>

    <p class="mt-5 text-slate-600 leading-8">
      We believe seniors deserve care that feels like family, not like a
      facility. Our home is built around warmth, patience, respect,
      safety, and the belief that every resident should be supported to
      live as independently and joyfully as possible.
    </p>

    <!-- Feature list -->
    <div class="mt-9 grid sm:grid-cols-2 gap-4">

      <?php foreach([
        ['Personalized care','Care shaped around each resident.'],
        ['Home-like setting','A warm and familiar environment.'],
        ['24/7 support','Care and supervision around the clock.'],
        ['Family communication','Responsive and personal communication.']
      ] as $feature): ?>

        <div class="group flex gap-4 rounded-2xl border border-slate-100 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-1 hover:bg-emerald-50 hover:shadow-lg">

          <div
            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-emerald-700 shadow-sm transition group-hover:bg-emerald-700 group-hover:text-white"
            aria-hidden="true"
          >
            ✓
          </div>

          <div>

            <h3 class="font-bold text-slate-900">
              <?=h($feature[0])?>
            </h3>

            <p class="mt-1 text-sm leading-5 text-slate-500">
              <?=h($feature[1])?>
            </p>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </div>

</div>


  </div>

</section>

<!-- =========================================================
     PHILOSOPHY
     ========================================================= -->

<section
  class="relative overflow-hidden bg-emerald-50/60 py-24 lg:py-28"
  aria-labelledby="philosophy-title"
>

  <div class="absolute right-0 top-0 h-80 w-80 rounded-full bg-emerald-200/30 blur-3xl" aria-hidden="true"></div>

  <div class="max-w-7xl mx-auto px-5">


<div class="grid lg:grid-cols-[.85fr_1.15fr] gap-12 items-center">

  <!-- Philosophy -->
  <div class="reveal-left">

    <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
      Our philosophy
    </span>

    <h2
      id="philosophy-title"
      class="mt-5 text-4xl md:text-5xl font-black tracking-tight text-slate-950"
    >
      Care with an open hand.
    </h2>

    <p class="mt-6 text-lg text-slate-600 leading-8">
      “Open Hand” reflects our guiding philosophy: care that is given
      freely, gently, and without judgment, welcoming every resident
      exactly as they are.
    </p>

    <div class="mt-8 inline-flex items-center gap-4 rounded-2xl bg-white p-4 shadow-sm">

      <div
        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-700 text-xl text-white"
        aria-hidden="true"
      >
        ♥
      </div>

      <div>

        <div class="font-black text-slate-900">
          Every person matters.
        </div>

        <div class="mt-1 text-sm text-slate-500">
          Every story deserves to be heard.
        </div>

      </div>

    </div>

  </div>


  <!-- Mission / vision -->
  <div class="grid md:grid-cols-2 gap-5 reveal-right delay-200">

    <article class="group relative overflow-hidden rounded-[2rem] bg-[#063b2e] p-8 text-white shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">

      <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-400/10 transition-transform duration-500 group-hover:scale-150" aria-hidden="true"></div>

      <div class="relative">

        <div
          class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-2xl text-emerald-300"
          aria-hidden="true"
        >
          ◎
        </div>

        <h3 class="mt-7 text-2xl font-black">
          Our Mission
        </h3>

        <p class="mt-4 text-emerald-50/75 leading-7">
          To provide compassionate, dignified, and individualized care
          that allows every resident to live safely, comfortably, and
          joyfully — treating each person in our home as a valued member
          of our family.
        </p>

      </div>

    </article>


    <article class="group relative overflow-hidden rounded-[2rem] bg-white p-8 shadow-xl ring-1 ring-slate-100 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">

      <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-150" aria-hidden="true"></div>

      <div class="relative">

        <div
          class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-700"
          aria-hidden="true"
        >
          ◇
        </div>

        <h3 class="mt-7 text-2xl font-black text-slate-900">
          Our Vision
        </h3>

        <p class="mt-4 text-slate-600 leading-7">
          To be Snohomish County's most trusted adult family home — a
          place where families feel at peace, residents feel truly at
          home, and quality, person-centered care is never compromised.
        </p>

      </div>

    </article>

  </div>

</div>


  </div>

</section>

<!-- =========================================================
     VALUES
     ========================================================= -->

<section
  class="bg-white py-24 lg:py-32"
  aria-labelledby="values-title"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="max-w-3xl reveal">

  <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
    What guides us
  </span>

  <h2
    id="values-title"
    class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight"
  >
    Values that shape
    <span class="text-emerald-700">everyday care.</span>
  </h2>

  <p class="mt-6 text-lg text-slate-600 leading-8">
    Our values are more than words on a page. They influence how we
    communicate, care, listen, respond, and build relationships with
    every resident and family.
  </p>

</div>


<div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

  <?php
  $values = [
    ['Compassion','Every interaction is rooted in kindness, patience, and understanding.','fa-hand-holding-heart'],
    ['Dignity','Residents are treated with the respect they have earned over a lifetime.','fa-user'],
    ['Family','We care for residents and communicate with families as an extension of our own.','fa-people-roof'],
    ['Integrity','Honest communication, transparent care plans, and accountability guide our work.','fa-handshake'],
    ['Safety','A secure, clean, and well-maintained home environment is always a priority.','fa-shield-heart'],
    ['Individuality','Care plans are built around each resident’s unique needs, history, and preferences.','fa-user-astronaut']
  ];
  ?>

  <?php foreach($values as $index => $v): ?>

    <article
      class="group relative overflow-hidden rounded-[1.8rem] border border-slate-100 bg-white p-7 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:border-emerald-100 hover:shadow-2xl reveal delay-<?=(($index % 3 + 1) * 100)?>"
    >

      <div class="absolute right-0 top-0 h-28 w-28 translate-x-8 -translate-y-8 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-[2.2]" aria-hidden="true"></div>

      <div class="relative">

        <div class="flex items-center justify-between">

          <div
            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-xl text-emerald-700 transition-all duration-300 group-hover:bg-emerald-700 group-hover:text-white group-hover:scale-110"
            aria-hidden="true"
          >
            <i class="fa-solid <?=h($v[2])?>"></i>
          </div>

          <span class="text-xs font-black text-slate-300">
            0<?=($index + 1)?>
          </span>

        </div>

        <h3 class="mt-7 text-xl font-black text-slate-900">
          <?=h($v[0])?>
        </h3>

        <p class="mt-3 text-slate-600 leading-7">
          <?=h($v[1])?>
        </p>

        <div class="mt-6 h-1 w-10 rounded-full bg-emerald-600 transition-all duration-500 group-hover:w-20"></div>

      </div>

    </article>

  <?php endforeach; ?>

</div>


  </div>

</section>

<!-- =========================================================
     OUR STORY
     ========================================================= -->

<section
  id="our-story"
  class="overflow-hidden bg-slate-50 py-24 lg:py-32"
  aria-labelledby="our-story-title"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

  <!-- Story image -->
  <div class="relative order-2 lg:order-1 reveal-left">

    <div class="absolute -left-5 -bottom-5 h-32 w-32 rounded-full bg-emerald-200/50 blur-2xl" aria-hidden="true"></div>

    <div class="h-[600px] relative overflow-hidden rounded-[2.5rem] shadow-2xl about-image-wrap">

      <img
        src="assets/images/018.JPG"
        alt="Caregiving and residential care at Blooms Open Hand Adult Family Home"
        class="about-image h-[600px] w-full object-cover"
        width="1200"
        height="1600"
        loading="lazy"
        decoding="async"
        onerror="this.style.display='none';"
      >

      <div class="h-[600px] bg-gradient-to-br from-emerald-100 via-slate-100 to-emerald-50"></div>

      <div class="absolute inset-0 bg-gradient-to-t from-[#063b2e]/80 via-transparent to-transparent"></div>

      <div class="absolute bottom-7 left-7 right-7 text-white">

        <div class="text-xs font-black uppercase tracking-[.2em] text-emerald-200">
          Our journey
        </div>

        <div class="mt-2 text-2xl font-black">
          Built around people, not numbers.
        </div>

      </div>

    </div>

  </div>


  <!-- Timeline -->
  <div class="order-1 lg:order-2 reveal-right delay-200">

    <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
      Our story
    </span>

    <h2
      id="our-story-title"
      class="mt-5 text-4xl md:text-3xl lg:text-3xl font-black tracking-tight"
    >
      Built from a personal commitment to elder care.
    </h2>

    <p class="mt-3 text-sm text-slate-600 leading-8">
      Blooms Open Hand has proudly served families in Marysville since
      2019. It was founded by Rahel Dedimas out of a deep, personal
      commitment to caring for elders with the same warmth, patience,
      and respect she would want for her own family.
    </p>


    <!-- Timeline -->
    <div class="mt-10 space-y-4">

      <div class="relative flex gap-5">

        <div class="relative flex flex-col items-center">

          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#063b2e] text-sm font-black text-white shadow-lg">
            01
          </div>

          <div class="mt-2 h-full w-px bg-emerald-200"></div>

        </div>

        <div class="pb-2">

          <div class="text-sm font-black text-emerald-700">
            2019
          </div>

          <h3 class="mt-1 text-lg font-black text-slate-900">
            Blooms Open Hand begins
          </h3>

          <p class="mt-2 text-slate-600 leading-7">
            A vision for warm, family-style adult care becomes a home
            serving families in the Marysville community.
          </p>

        </div>

      </div>


      <div class="relative flex gap-5">

        <div class="relative flex flex-col items-center">

          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-sm font-black text-emerald-700">
            02
          </div>

          <div class="mt-2 h-full w-px bg-emerald-200"></div>

        </div>

        <div class="pb-2">

          <div class="text-sm font-black text-emerald-700">
            Growing with families
          </div>

          <h3 class="mt-1 text-lg font-black text-slate-900">
            Experience meets compassion
          </h3>

          <p class="mt-2 text-slate-600 leading-7">
            Hands-on caregiving experience helped shape a care model
            focused on individualized support and meaningful relationships.
          </p>

        </div>

      </div>


      <div class="relative flex gap-5">

        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-700 text-sm font-black text-white shadow-lg">
          03
        </div>

        <div>

          <div class="text-sm font-black text-emerald-700">
            Today
          </div>

          <h3 class="mt-1 text-lg font-black text-slate-900">
            A home families can trust
          </h3>

          <p class="mt-2 text-slate-600 leading-7">
            Blooms Open Hand continues to provide attentive,
            person-centered care in a small and familiar home environment.
          </p>

        </div>

      </div>

    </div>

  </div>

</div>


  </div>

</section>

<!-- =========================================================
     WHAT MAKES US DIFFERENT
     ========================================================= -->

<section
  class="relative overflow-hidden bg-[#063b2e] py-24 lg:py-32 text-white"
  aria-labelledby="different-title"
>

  <div class="absolute inset-0 pointer-events-none" aria-hidden="true">


<div class="absolute -left-40 top-20 h-96 w-96 rounded-full bg-emerald-400/10 blur-3xl"></div>

<div class="absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-emerald-300/10 blur-3xl"></div>


  </div>

  <div class="relative max-w-7xl mx-auto px-5">


<div class="max-w-3xl reveal">

  <span class="text-emerald-300 text-xs font-black uppercase tracking-[.2em]">
    What makes us different
  </span>

  <h2
    id="different-title"
    class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight"
  >
    The advantages of a
    <span class="text-emerald-300">true home.</span>
  </h2>

  <p class="mt-6 text-lg text-emerald-50/70 leading-8">
    Personalized care is easier when the environment itself feels
    personal. Our smaller home setting allows us to focus on the people
    behind every care plan.
  </p>

</div>


<div class="mt-14 grid md:grid-cols-2 lg:grid-cols-3 gap-5">

  <?php
  $differences = [
    'A small, home-like setting instead of a large institutional facility — residents are never just a room number.',
    'Consistent, familiar caregivers rather than rotating agency staff, so residents can build real relationships.',
    'Personalized care plans tailored to each resident’s health needs, routines, personality, and preferences.',
    'Direct, responsive communication with families through owner-led, hands-on management.',
    'A warm, home-cooked, family-style approach to meals, activities, and daily life.',
    'A licensed nurse on our care team working directly alongside caregivers, providing clinical-level health oversight with hands-on daily care.'
  ];
  ?>

  <?php foreach($differences as $index => $item): ?>

    <div class="group relative overflow-hidden rounded-[1.8rem] border border-white/10 bg-white/[.05] p-7 backdrop-blur transition-all duration-500 hover:-translate-y-2 hover:bg-white/[.09] hover:shadow-2xl reveal delay-<?=(($index % 3 + 1) * 100)?>">

      <div class="absolute right-0 top-0 h-24 w-24 translate-x-8 -translate-y-8 rounded-full bg-emerald-300/10 transition-transform duration-500 group-hover:scale-[2.5]" aria-hidden="true"></div>

      <div class="relative">

        <div class="flex items-center justify-between">

          <div
            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-300/10 text-emerald-300"
            aria-hidden="true"
          >
            ✓
          </div>

          <span class="text-sm font-black text-white/20">
            <?=str_pad($index + 1,2,'0',STR_PAD_LEFT)?>
          </span>

        </div>

        <p class="mt-6 text-emerald-50/80 leading-7">
          <?=h($item)?>
        </p>

        <div class="mt-6 h-px w-8 bg-emerald-300/40 transition-all duration-500 group-hover:w-16"></div>

      </div>

    </div>

  <?php endforeach; ?>

</div>


  </div>

</section>

<!-- =========================================================
     TEAM
     ========================================================= -->

<section
  class="bg-white py-24 lg:py-32"
  aria-labelledby="team-title"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="max-w-3xl reveal">

  <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
    Our team
  </span>

  <h2
    id="team-title"
    class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight"
  >
    Experienced people.
    <span class="text-emerald-700">Attentive care.</span>
  </h2>

  <p class="mt-6 text-lg text-slate-600 leading-8">
    Our care team combines hands-on caregiving experience with clinical
    oversight and a commitment to treating residents with dignity.
  </p>

</div>


<div class="mt-14 grid lg:grid-cols-[.85fr_1.15fr] gap-7">

  <!-- Owner -->
  <article class="group overflow-hidden rounded-[2.5rem] bg-[#063b2e] text-white shadow-2xl reveal-left">

    <div class="relative">

      <div class="about-image-wrap h-[420px] overflow-hidden">

        <img
          src="assets/images/010.JPG"
          alt="Rahel Dedimas, owner and administrator of Blooms Open Hand Adult Family Home"
          class="about-image h-full w-full object-cover"
          width="1200"
          height="900"
          loading="lazy"
          decoding="async"
          onerror="this.style.display='none';"
        >

        <div class="h-full bg-gradient-to-br from-emerald-900 to-[#063b2e]"></div>

      </div>

      <div class="absolute inset-0 bg-gradient-to-t from-[#063b2e] via-transparent to-transparent"></div>

      <div class="absolute left-6 top-6">

        <span class="inline-flex rounded-full border border-white/20 bg-black/20 px-4 py-2 text-xs font-bold backdrop-blur">
          Owner & Administrator
        </span>

      </div>

    </div>


    <div class="p-8">

      <h3 class="text-3xl font-black">
        Rahel Dedimas
      </h3>

      <p class="mt-2 font-semibold text-emerald-300">
        CNA · HCA
      </p>

      <p class="mt-5 text-emerald-50/75 leading-7">
        Rahel is a Certified Nursing Assistant (CNA) and Home Care Aide
        (HCA) with more than five years of hands-on experience in home
        care.
      </p>

      <p class="mt-4 text-emerald-50/75 leading-7">
        She has cared for individuals with complex health needs,
        including cancer patients, individuals undergoing dialysis, and
        residents requiring specialized memory care.
      </p>

      <div class="mt-7 flex flex-wrap gap-2">

        <span class="rounded-full bg-white/10 px-4 py-2 text-xs font-bold">
          CNA
        </span>

        <span class="rounded-full bg-white/10 px-4 py-2 text-xs font-bold">
          HCA
        </span>

        <span class="rounded-full bg-white/10 px-4 py-2 text-xs font-bold">
          Home Care
        </span>

        <span class="rounded-full bg-white/10 px-4 py-2 text-xs font-bold">
          Memory Care
        </span>

      </div>

    </div>

  </article>


  <!-- Nurse -->
  <article class="group relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 lg:p-10 shadow-sm reveal-right delay-200">

    <div class="absolute right-0 top-0 h-64 w-64 translate-x-20 -translate-y-20 rounded-full bg-emerald-100/70 transition-transform duration-700 group-hover:scale-150" aria-hidden="true"></div>

    <div class="relative flex h-full flex-col">

      <div class="flex items-center justify-between">

        <div
          class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-2xl text-emerald-700 shadow-sm"
          aria-hidden="true"
        >
          ✚
        </div>

        <span class="rounded-full bg-emerald-100 px-4 py-2 text-xs font-black text-emerald-700">
          CARE TEAM
        </span>

      </div>

      <div class="mt-10">

        <h3 class="text-3xl font-black text-slate-950">
          Licensed Nurse / Caregiver
        </h3>

        <p class="mt-2 font-semibold text-emerald-700">
          Clinical & Hands-On Care
        </p>

        <p class="mt-6 text-lg text-slate-600 leading-8">
          Blooms Open Hand’s care team includes a licensed nurse who
          also works directly as a caregiver, bringing clinical health
          monitoring into residents’ everyday care.
        </p>

        <p class="mt-5 text-slate-600 leading-7">
          This dual role helps changes in health status be recognized and
          responded to quickly while keeping residents surrounded by
          familiar caregivers.
        </p>

      </div>


      <div class="mt-auto pt-10 grid sm:grid-cols-2 gap-4">

        <div class="rounded-2xl bg-white p-5 shadow-sm">

          <div class="text-2xl text-emerald-700" aria-hidden="true">
            ✓
          </div>

          <div class="mt-3 font-black text-slate-900">
            Health oversight
          </div>

          <div class="mt-1 text-sm leading-5 text-slate-500">
            Clinical attention integrated into everyday care.
          </div>

        </div>


        <div class="rounded-2xl bg-white p-5 shadow-sm">

          <div class="text-2xl text-emerald-700" aria-hidden="true">
            ♥
          </div>

          <div class="mt-3 font-black text-slate-900">
            Personal connection
          </div>

          <div class="mt-1 text-sm leading-5 text-slate-500">
            Hands-on caregiving and familiar relationships.
          </div>

        </div>

      </div>

    </div>

  </article>

</div>


  </div>

</section>

<!-- =========================================================
     HOME GALLERY
     ========================================================= -->

<section
  class="bg-slate-50 py-24 lg:py-32"
  aria-labelledby="home-gallery-title"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 reveal">

  <div class="max-w-3xl">

    <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
      Our home
    </span>

    <h2
      id="home-gallery-title"
      class="mt-5 text-4xl md:text-5xl font-black tracking-tight"
    >
      A comfortable place
      <span class="text-emerald-700">to call home.</span>
    </h2>

    <p class="mt-5 text-lg text-slate-600 leading-8">
      From shared spaces to private rooms, our environment is designed
      to feel welcoming, comfortable, safe, and familiar.
    </p>

  </div>

  <a
    href="contact.php"
    aria-label="Schedule a visit to Blooms Open Hand Adult Family Home"
    class="shrink-0 inline-flex items-center gap-2 rounded-full border border-emerald-700 px-6 py-3 text-sm font-bold text-emerald-700 transition-all duration-300 hover:bg-emerald-700 hover:text-white"
  >
    Schedule a Visit →
  </a>

</div>


<div class="mt-12 grid grid-cols-2 lg:grid-cols-4 gap-4">

  <!-- Large -->
  <div class="col-span-2 row-span-2 relative overflow-hidden rounded-[2rem] group about-image-wrap">

    <img
      src="assets/images/018.JPG"
      alt="Interior of Blooms Open Hand Adult Family Home"
      class="about-image h-full min-h-[420px] w-full object-cover"
      width="1200"
      height="1600"
      loading="lazy"
      decoding="async"
      onerror="this.style.display='none';"
    >

    <div class="absolute inset-0 min-h-[420px] bg-gradient-to-br from-emerald-100 to-slate-100 -z-10"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>

    <div class="absolute bottom-6 left-6 text-white">

      <div class="text-xs font-bold uppercase tracking-[.18em] text-emerald-200">
        Our home
      </div>

      <div class="mt-2 text-xl font-black">
        A welcoming environment
      </div>

    </div>

  </div>


  <!-- Living -->
  <div class="relative h-52 lg:h-60 overflow-hidden rounded-[2rem] group about-image-wrap">

    <img
      src="assets/images/010.JPG"
      alt="Living room at Blooms Open Hand Adult Family Home"
      class="about-image h-52 lg:h-60 w-full object-cover"
      width="900"
      height="700"
      loading="lazy"
      decoding="async"
      onerror="this.style.display='none';"
    >

    <div class="h-52 lg:h-60 bg-emerald-100"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

    <div class="absolute bottom-4 left-4 text-white font-bold">
      Living spaces
    </div>

  </div>


  <!-- Dining -->
  <div class="h-52 lg:h-60 relative overflow-hidden rounded-[2rem] group about-image-wrap">

    <img
      src="assets/images/016.JPG"
      alt="Family dining area at Blooms Open Hand Adult Family Home"
      class="about-image h-52 lg:h-60 w-full object-cover"
      width="900"
      height="700"
      loading="lazy"
      decoding="async"
      onerror="this.style.display='none';"
    >

    <div class="h-52 lg:h-60 bg-slate-100"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

    <div class="absolute bottom-4 left-4 text-white font-bold">
      Family dining
    </div>

  </div>


  <!-- Bedroom -->
  <div class="h-52 lg:h-60 relative overflow-hidden rounded-[2rem] group about-image-wrap">

    <img
      src="assets/images/01.JPG"
      alt="Comfortable resident bedroom at Blooms Open Hand Adult Family Home"
      class="about-image h-52 lg:h-60 w-full object-cover"
      width="900"
      height="700"
      loading="lazy"
      decoding="async"
      onerror="this.style.display='none';"
    >

    <div class="h-52 lg:h-60 bg-emerald-50"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

    <div class="absolute bottom-4 left-4 text-white font-bold">
      Comfortable rooms
    </div>

  </div>


  <!-- Care -->
  <div class="h-52 lg:h-60 relative overflow-hidden rounded-[2rem] group about-image-wrap">

    <img
      src="assets/images/025.JPG"
      alt="Compassionate caregiving at Blooms Open Hand Adult Family Home"
      class="about-image h-52 lg:h-60 w-full object-cover"
      width="900"
      height="700"
      loading="lazy"
      decoding="async"
      onerror="this.style.display='none';"
    >

    <div class="h-52 lg:h-60 bg-emerald-100"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

    <div class="absolute bottom-4 left-4 text-white font-bold">
      Compassionate care
    </div>

  </div>

</div>


  </div>

</section>

<!-- =========================================================
     STATISTICS
     ========================================================= -->

<section
  class="bg-white py-20"
  aria-label="Blooms Open Hand facts and statistics"
>

  <div class="max-w-7xl mx-auto px-5">


<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">

  <?php
  $stats = [
    ['7','Years in operation','Serving families since 2019'],
    ['6','Licensed beds','Across the home'],
    ['5','Private & semi-private rooms','Comfortable residential spaces'],
    ['24/7','Care & supervision','Support around the clock']
  ];
  ?>

  <?php foreach($stats as $index => $stat): ?>

    <div class="group relative overflow-hidden rounded-[1.8rem] border border-slate-100 bg-slate-50 p-7 transition-all duration-500 hover:-translate-y-2 hover:bg-emerald-50 hover:shadow-xl reveal delay-<?=(($index + 1) * 100)?>">

      <div class="absolute right-0 top-0 h-24 w-24 translate-x-8 -translate-y-8 rounded-full bg-white transition-transform duration-500 group-hover:scale-[2]" aria-hidden="true"></div>

      <div class="relative">

        <div class="stat-number text-4xl md:text-5xl font-black text-emerald-700">
          <?=$stat[0]?>
        </div>

        <div class="mt-4 font-black text-slate-900">
          <?=h($stat[1])?>
        </div>

        <div class="mt-1 text-sm text-slate-500">
          <?=h($stat[2])?>
        </div>

      </div>

    </div>

  <?php endforeach; ?>

</div>


  </div>

</section>

<!-- =========================================================
     FINAL CTA
     ========================================================= -->

<section
  class="relative overflow-hidden py-24 lg:py-32"
  aria-labelledby="visit-title"
>

  <div class="absolute inset-0 bg-[#063b2e]"></div>

  <!-- Decorative shapes -->

  <div class="absolute -right-40 -top-40 h-[30rem] w-[30rem] rounded-full border border-white/10" aria-hidden="true"></div>

  <div class="absolute -left-32 bottom-[-15rem] h-[30rem] w-[30rem] rounded-full bg-emerald-400/10 blur-3xl" aria-hidden="true"></div>

  <div class="relative max-w-5xl mx-auto px-5 text-center reveal">


<div
  class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-white/10 text-2xl text-emerald-300"
  aria-hidden="true"
>
  ♥
</div>

<span class="mt-7 inline-block text-emerald-300 text-xs font-black uppercase tracking-[.2em]">
  Come see the home for yourself
</span>

<h2
  id="visit-title"
  class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight text-white"
>
  The best way to understand our care is to experience our home.
</h2>

<p class="mx-auto mt-6 max-w-2xl text-lg text-emerald-50/75 leading-8">
  Schedule a tour or contact us to discuss your loved one's care needs.
  We would be happy to welcome you and answer your questions.
</p>

<div class="mt-9 flex flex-wrap justify-center gap-4">

  <a
    href="schedule.php"
    aria-label="Schedule a tour at Blooms Open Hand Adult Family Home"
    class="group inline-flex items-center gap-3 rounded-full bg-white px-8 py-4 text-sm font-black text-[#063b2e] shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl"
  >
    Schedule a Tour

    <span class="transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true">
      →
    </span>

  </a>

  <a
    href="contact.php"
    aria-label="Contact the Blooms Open Hand care team"
    class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/5 px-8 py-4 text-sm font-black text-white backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:bg-white/10"
  >
    Contact Our Team
  </a>

</div>


  </div>

</section>

<!-- =========================================================
     SCROLL REVEAL + COUNTERS
     ========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

  /*
   * Scroll reveal
   */

  const revealElements = document.querySelectorAll(
    '.reveal, .reveal-left, .reveal-right'
  );

  if ('IntersectionObserver' in window) {

    const revealObserver = new IntersectionObserver(
      function(entries, observer) {

        entries.forEach(function(entry) {

          if (entry.isIntersecting) {

            entry.target.classList.add('is-visible');

            observer.unobserve(entry.target);

          }

        });

      },
      {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
      }
    );

    revealElements.forEach(function(element) {
      revealObserver.observe(element);
    });

  } else {

    revealElements.forEach(function(element) {
      element.classList.add('is-visible');
    });

  }


  /*
   * Statistics counter
   */

  const statNumbers = document.querySelectorAll('.stat-number');

  const animateNumber = function(element) {

    const original = element.textContent.trim();

    if (original.includes('/')) {
      return;
    }

    const suffix = original.includes('+') ? '+' : '';
    const numericValue = parseInt(original.replace('+', ''), 10);

    if (isNaN(numericValue)) {
      return;
    }

    let start = 0;
    const duration = 1000;
    const startTime = performance.now();

    const update = function(currentTime) {

      const progress = Math.min(
        (currentTime - startTime) / duration,
        1
      );

      const eased = 1 - Math.pow(1 - progress, 3);

      const currentValue = Math.floor(
        start + (numericValue - start) * eased
      );

      element.textContent = currentValue + suffix;

      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        element.textContent = numericValue + suffix;
      }

    };

    requestAnimationFrame(update);

  };


  if ('IntersectionObserver' in window) {

    const counterObserver = new IntersectionObserver(
      function(entries, observer) {

        entries.forEach(function(entry) {

          if (entry.isIntersecting) {

            animateNumber(entry.target);

            observer.unobserve(entry.target);

          }

        });

      },
      {
        threshold: 0.6
      }
    );

    statNumbers.forEach(function(element) {
      counterObserver.observe(element);
    });

  }


  /*
   * Subtle mouse movement on large cards
   */

  const interactiveCards = document.querySelectorAll(
    '.about-image-wrap'
  );

  interactiveCards.forEach(function(card) {

    card.addEventListener('mousemove', function(event) {

      const rect = card.getBoundingClientRect();

      const x = (event.clientX - rect.left) / rect.width;
      const y = (event.clientY - rect.top) / rect.height;

      const rotateX = (0.5 - y) * 2;
      const rotateY = (x - 0.5) * 2;

      card.style.transform =
        'perspective(900px) rotateX(' +
        rotateX +
        'deg) rotateY(' +
        rotateY +
        'deg)';

    });

    card.addEventListener('mouseleave', function() {

      card.style.transform =
        'perspective(900px) rotateX(0deg) rotateY(0deg)';

    });

  });

});

</script>

<?php require_once __DIR__.'/footer.php'; ?>
