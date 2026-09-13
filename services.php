<?php

/*
|--------------------------------------------------------------------------
| SEO SETTINGS
|--------------------------------------------------------------------------
*/

$pageTitle = 'Adult Family Home Care Services in Marysville, WA';

$pageDescription = 'Explore personalized adult family home care services in Marysville, WA, including daily living assistance, memory care, medication support, nutrition, activities, respite care, and 24/7 supervision.';

$pageCanonical = '/services.php';

$pageOgTitle = 'Adult Family Home Care Services in Marysville, WA | Blooms Open Hand';

$pageOgDescription = 'Personalized 24/7 adult family home care in Marysville, Washington, including daily living assistance, memory care, medication support, nutrition, activities, and respite care.';

$pageOgType = 'website';


require_once __DIR__.'/header.php';


/*
|--------------------------------------------------------------------------
| SEO STRUCTURED DATA
|--------------------------------------------------------------------------
*/

$serviceSchema = [
  '@context' => 'https://schema.org',
  '@graph' => [

    [
      '@type' => 'LocalBusiness',
      '@id' => '/#blooms-open-hand',
      'name' => 'Blooms Open Hand Adult Family Home',
      'description' => 'Personalized adult family home care and residential support in Marysville, Washington.',
      'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Marysville',
        'addressRegion' => 'WA',
        'addressCountry' => 'US'
      ],
      'areaServed' => [
        '@type' => 'AdministrativeArea',
        'name' => 'Snohomish County'
      ]
    ],

    [
      '@type' => 'Service',
      '@id' => '/services.php#adult-family-home-care',
      'name' => 'Adult Family Home Care Services',
      'serviceType' => 'Adult Family Home Care',
      'description' => 'Personalized residential care and support for seniors and adults who need assistance with daily living, health monitoring, memory care, nutrition, activities, and respite care.',
      'provider' => [
        '@id' => '/#blooms-open-hand'
      ],
      'areaServed' => [
        '@type' => 'City',
        'name' => 'Marysville'
      ],
      'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Blooms Open Hand Care Services',
        'itemListElement' => [
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Personalized Daily Living Assistance'
            ]
          ],
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Medication Management and Health Monitoring'
            ]
          ],
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Memory Care Support'
            ]
          ],
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Home-Cooked Meals and Nutrition'
            ]
          ],
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Activities and Social Engagement'
            ]
          ],
          [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Respite and Short-Term Care'
            ]
          ]
        ]
      ]
    ],

    [
      '@type' => 'WebPage',
      '@id' => '/services.php#webpage',
      'name' => 'Adult Family Home Care Services in Marysville, WA',
      'description' => $pageDescription,
      'about' => [
        '@id' => '/services.php#adult-family-home-care'
      ]
    ]

  ]
];

?>

<script type="application/ld+json">
<?=json_encode(
    $serviceSchema,
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_PRETTY_PRINT
)?>
</script>


<?php

$services = [

[
  'Personalized Daily Living Assistance',
  'Dignified help with everyday routines',
  'Hands-on support with the essential activities of daily living, delivered with patience and respect.',
  'Bathing, grooming, and dressing assistance|Mobility and transfer support|Incontinence and toileting care|Assistance with routine hygiene',
  'Residents who need daily hands-on support but wish to remain as independent as possible.',
  'Care is delivered according to an individualized care plan developed with the resident and family, and adjusted as needs change over time.',
  'Contact Us to Discuss Care Needs',
  '♥',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-AWnESmpIJ-AlP3lr_fmO-a8mGQqSXpayq3JYJb0yGQ&s=10'
],

[
  'Medication Management & Health Monitoring',
  'Keeping health on track, every single day',
  'Reliable oversight of medications and vital health indicators, coordinated with physicians and family.',
  'Daily medication administration and tracking|Vital signs monitoring (blood pressure, glucose, etc., as needed)|Coordination with physicians, pharmacies, and specialists|Regular updates to family members',
  'Residents managing chronic conditions or multiple medications who need consistent oversight.',
  'Medications are organized and administered per physician orders, with documentation maintained and shared with families and healthcare providers as needed.',
  'Request a Care Consultation',
  '⌖',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUVWkeC_fQwOzhPLdtDTkpj2SOkcJYVHxzdtA4gNnw9w&s=10'
],

[
  'Memory Care Support',
  'Gentle, structured care for Alzheimer’s, dementia, and related conditions',
  'A calm, secure, and familiar environment designed around the needs of residents with memory-related conditions.',
  'Structured daily routines|Close supervision and fall/wandering prevention|Patient, specialized communication approaches|Calming activities suited to cognitive ability',
  'Residents living with Alzheimer’s, dementia, Parkinson’s-related cognitive decline, or other memory impairments.',
  'Caregivers follow individualized approaches based on each resident’s stage of memory loss, history, and preferences, working closely with family to maintain familiar routines.',
  'Schedule a Tour',
  '✦',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHfp5Sn2L8THaLBCxfPN_MEtut9-JP688gDW7uj2f94g&s=10'
],

[
  'Home-Cooked Meals & Nutrition',
  'Nourishing food, shared like family',
  'Fresh, home-cooked meals prepared daily, with attention to individual dietary needs.',
  'Three home-cooked meals daily plus snacks|Diet accommodations (e.g., diabetic, low-sodium, soft/pureed diets)|Hydration monitoring|Family-style dining in a shared space',
  'All residents, including those with specific dietary or nutritional requirements.',
  'Meals are planned in consultation with residents and, where needed, dietary guidance from physicians or nutritionists.',
  'Contact Us',
  '⌂',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdnW8Ut07lGG-Uv5uvlfJITNs_NphRE90ZsREm-okcLg&s=10'
],

[
  'Activities & Social Engagement',
  'Purpose and joy, every day',
  'Daily activities designed to keep residents mentally, physically, and socially engaged.',
  'Daily group and one-on-one activities|Music, crafts, and light exercise|Holiday and birthday celebrations|Opportunities for family participation',
  'All residents who want to stay engaged, social, and active within their ability level.',
  'Activities are scheduled regularly and adapted in real time based on residents’ energy, mood, and interests on a given day.',
  'Contact Us to Learn More',
  '★',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRENPC5mdgUd0pcu2omS3lEeUA6BsT8WrTi6ILvUK0dWA&s=10'
],

[
  'Respite & Short-Term Care',
  'Trusted care, whenever your family needs it',
  'Short-term stays that give family caregivers a break, without compromising on quality of care.',
  'Full daily care during the stay|Meals, medication management, and activities included|Flexible scheduling based on availability',
  'Families needing temporary care coverage, and prospective residents/families wanting to experience the home before committing long-term.',
  'Families contact us to check availability and discuss the resident’s needs; a short intake process ensures we can meet those needs before the stay begins.',
  'Request Availability',
  '◇',
  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToK317nG0C78K912fuG6O4A8Hd1juyXSdoqGBzfkjZBA&s=10'
]

];

?>


<style>

@keyframes serviceFloat {
  0%,100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-12px);
  }
}

@keyframes serviceFloatReverse {
  0%,100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(10px);
  }
}

@keyframes servicePulse {
  0%,100% {
    opacity:.25;
    transform:scale(1);
  }
  50% {
    opacity:.6;
    transform:scale(1.1);
  }
}

@keyframes serviceShine {
  0% {
    transform:translateX(-130%);
  }
  100% {
    transform:translateX(130%);
  }
}

.service-float {
  animation:serviceFloat 6s ease-in-out infinite;
}

.service-float-reverse {
  animation:serviceFloatReverse 7s ease-in-out infinite;
}

.service-pulse {
  animation:servicePulse 5s ease-in-out infinite;
}

.service-shine {
  position:relative;
  overflow:hidden;
}

.service-shine::after {
  content:"";
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  width:40%;
  background:linear-gradient(
    90deg,
    transparent,
    rgba(255,255,255,.15),
    transparent
  );
  transform:translateX(-130%);
  animation:serviceShine 7s ease-in-out infinite;
  pointer-events:none;
}


/* Scroll reveal */

.service-reveal {
  opacity:0;
  transform:translateY(30px);
  transition:
    opacity .8s ease,
    transform .8s cubic-bezier(.2,.8,.2,1);
}

.service-reveal-left {
  opacity:0;
  transform:translateX(-35px);
  transition:
    opacity .8s ease,
    transform .8s cubic-bezier(.2,.8,.2,1);
}

.service-reveal-right {
  opacity:0;
  transform:translateX(35px);
  transition:
    opacity .8s ease,
    transform .8s cubic-bezier(.2,.8,.2,1);
}

.service-visible {
  opacity:1;
  transform:translate(0);
}

.service-delay-100 {
  transition-delay:.1s;
}

.service-delay-200 {
  transition-delay:.2s;
}

.service-delay-300 {
  transition-delay:.3s;
}

.service-delay-400 {
  transition-delay:.4s;
}

.service-delay-500 {
  transition-delay:.5s;
}


/* Image hover */

.service-image-wrap {
  overflow:hidden;
}

.service-image {
  transition:
    transform .7s cubic-bezier(.2,.8,.2,1),
    filter .7s ease;
}

.service-image-wrap:hover .service-image {
  transform:scale(1.07);
  filter:saturate(1.08);
}


/* Reduced motion */

@media (prefers-reduced-motion:reduce) {

  *,
  *::before,
  *::after {
    animation-duration:.01ms !important;
    animation-iteration-count:1 !important;
    transition-duration:.01ms !important;
    scroll-behavior:auto !important;
  }

  .service-reveal,
  .service-reveal-left,
  .service-reveal-right {
    opacity:1;
    transform:none;
  }

}

</style>


<!-- =========================================================
     HERO
     ========================================================= -->

<section class="relative overflow-hidden bg-[#063b2e] text-white">

  <!-- Background decoration -->

  <div class="absolute inset-0 pointer-events-none">

    <div class="absolute -right-40 -top-40 h-[32rem] w-[32rem] rounded-full border border-white/10"></div>

    <div class="absolute right-20 top-20 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl service-pulse"></div>

    <div class="absolute -left-40 bottom-[-15rem] h-[32rem] w-[32rem] rounded-full bg-emerald-300/10 blur-3xl"></div>

    <div class="absolute left-[55%] top-24 h-2 w-2 rounded-full bg-emerald-300/60 service-float"></div>

    <div class="absolute right-[20%] top-48 h-3 w-3 rounded-full bg-white/20 service-float-reverse"></div>

  </div>


  <div class="relative max-w-7xl mx-auto px-5 py-20 lg:py-28">

    <div class="grid lg:grid-cols-[1.05fr_.95fr] gap-12 lg:gap-16 items-center">

      <!-- Hero text -->

      <div class="service-reveal-left">

        <div class="inline-flex items-center gap-3 rounded-full border border-emerald-300/20 bg-white/5 px-4 py-2 backdrop-blur">

          <span class="h-2 w-2 rounded-full bg-emerald-300"></span>

          <span class="text-emerald-200 text-xs font-black uppercase tracking-[.2em]">
            Our Services
          </span>

        </div>


        <h1 class="mt-7 text-5xl md:text-6xl lg:text-[5.3rem] font-black tracking-tight leading-[.95]">

          Care built around

          <span class="text-emerald-300">
            each resident.
          </span>

        </h1>


        <p class="mt-7 max-w-2xl text-lg md:text-xl text-emerald-50/85 leading-8">

          Personalized support, health oversight, nutrition, meaningful
          activities, memory care, and respite services delivered in a warm
          residential setting.

        </p>


        <div class="mt-9 flex flex-wrap gap-4">

          <a
            href="contact.php"
            class="group inline-flex items-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-black text-[#063b2e] shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl"
          >
            Discuss Care Needs

            <span class="transition-transform duration-300 group-hover:translate-x-1">
              →
            </span>

          </a>


          <a
            href="#services"
            class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/5 px-7 py-4 text-sm font-black text-white backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:bg-white/10"
          >
            Explore Services
          </a>

        </div>


        <div class="mt-10 flex flex-wrap gap-8">

          <div>
            <div class="text-2xl font-black">
              24/7
            </div>

            <div class="mt-1 text-sm text-emerald-100/60">
              Care & supervision
            </div>
          </div>


          <div class="hidden sm:block h-10 w-px bg-white/10"></div>


          <div>
            <div class="text-2xl font-black">
              6 beds
            </div>

            <div class="mt-1 text-sm text-emerald-100/60">
              Home-like setting
            </div>
          </div>


          <div class="hidden sm:block h-10 w-px bg-white/10"></div>


          <div>
            <div class="text-2xl font-black">
              Family
            </div>

            <div class="mt-1 text-sm text-emerald-100/60">
              Centered approach
            </div>
          </div>

        </div>

      </div>


      <!-- Hero image -->

      <div class="relative service-reveal-right service-delay-200">

        <div class="absolute -inset-5 rounded-[3rem] border border-white/10"></div>

        <div class="absolute -inset-2 rounded-[2.7rem] bg-emerald-400/10 blur-xl"></div>


        <div class="h-[600px] relative service-image-wrap rounded-[2.5rem] border border-white/10 shadow-2xl">

          <img
            src="assets/images/018.JPG"
            alt="Compassionate adult family home care at Blooms Open Hand in Marysville, Washington"
            class="service-image h-[600px] lg:h-[580px] w-full rounded-[2.5rem] object-cover"
            onerror="this.style.display='none';"
          >

          <!-- fallback -->

          <div class="h-[500px] lg:h-[580px] rounded-[2.5rem] bg-gradient-to-br from-emerald-900 via-[#063b2e] to-emerald-950"></div>


          <div class="absolute inset-x-0 bottom-0 rounded-b-[2.5rem] bg-gradient-to-t from-black/80 via-black/20 to-transparent p-7 pt-32">

            <div class="text-xs font-black uppercase tracking-[.2em] text-emerald-200">
              Person-centered care
            </div>

            <div class="mt-2 text-2xl font-black">
              Support with dignity and compassion.
            </div>

          </div>

        </div>


        <!-- Floating badge -->

        <div class="service-float absolute -bottom-7 -left-5 sm:-left-8 rounded-3xl bg-white p-5 text-slate-900 shadow-2xl">

          <div class="flex items-center gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-xl text-emerald-700">
              ♥
            </div>

            <div>

              <div class="text-xs font-black uppercase tracking-wider text-slate-400">
                Our approach
              </div>

              <div class="mt-1 font-black">
                Care that feels like home
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>


<!-- =========================================================
     SERVICE OVERVIEW
     ========================================================= -->

<section class="relative bg-white py-20 lg:py-24">

  <div class="max-w-7xl mx-auto px-5">

    <div class="max-w-3xl service-reveal">

      <span class="inline-flex items-center gap-2 text-emerald-700 text-xs font-black uppercase tracking-[.2em]">

        <span class="h-px w-8 bg-emerald-600"></span>

        How we can help

      </span>


      <h2 class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight text-slate-950">

        Services designed around
        <span class="text-emerald-700">
          real life.
        </span>

      </h2>


      <p class="mt-6 text-lg text-slate-600 leading-8">

        From everyday assistance to specialized support, our services are
        designed to help residents remain comfortable, safe, engaged, and
        as independent as possible.

      </p>

    </div>


    <!-- Quick navigation -->

    <div class="mt-12 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">

      <?php foreach($services as $i=>$s): ?>

        <a
          href="#service-<?=$i+1?>"
          class="group rounded-2xl border border-slate-100 bg-slate-50 p-4 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-100 hover:bg-emerald-50 hover:shadow-lg service-reveal service-delay-<?=($i % 3 + 1) * 100?>"
        >

          <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-lg text-emerald-700 shadow-sm transition-all duration-300 group-hover:bg-emerald-700 group-hover:text-white">
            <?=h($s[7])?>
          </div>

          <div class="mt-4 text-sm font-black leading-5 text-slate-900">
            <?=h($s[0])?>
          </div>

          <div class="mt-2 text-xs font-bold text-emerald-700 opacity-0 transition-all duration-300 group-hover:opacity-100">
            Explore →
          </div>

        </a>

      <?php endforeach; ?>

    </div>

  </div>

</section>


<!-- =========================================================
     SERVICES
     ========================================================= -->

<section id="services" class="bg-slate-50 py-20 lg:py-28">

  <div class="max-w-7xl mx-auto px-5">

    <div class="max-w-3xl mb-14 service-reveal">

      <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
        Our care services
      </span>

      <h2 class="mt-5 text-4xl md:text-5xl font-black tracking-tight">
        Thoughtful support for
        <span class="text-emerald-700">
          every stage of care.
        </span>
      </h2>

    </div>


    <div class="space-y-8">

      <?php foreach($services as $i=>$s): ?>

        <article
          id="service-<?=$i+1?>"
          class="scroll-mt-28 overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-sm transition-all duration-500 hover:shadow-2xl service-reveal"
        >

          <div class="grid lg:grid-cols-[.8fr_1.2fr]">

            <!-- Image -->

            <div class="relative min-h-[350px] lg:min-h-[600px] service-image-wrap">

              <img
                src="<?=h($s[8])?>"
                alt="<?=h($s[0])?> service at Blooms Open Hand Adult Family Home in Marysville, Washington"
                class="service-image absolute inset-0 h-full w-full object-cover"
                onerror="this.style.display='none';"
              >

              <!-- Fallback -->

              <div class="absolute inset-0 -z-10 bg-gradient-to-br from-emerald-100 via-slate-100 to-emerald-50"></div>


              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>


              <!-- Number -->

              <div class="absolute left-6 top-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/95 text-lg font-black text-[#063b2e] shadow-xl backdrop-blur">

                <?=str_pad($i+1,2,'0',STR_PAD_LEFT)?>

              </div>


              <!-- Image caption -->

              <div class="absolute bottom-7 left-7 right-7 text-white">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-700 text-xl shadow-lg">
                  <?=h($s[7])?>
                </div>

                <div class="mt-5 text-xs font-black uppercase tracking-[.18em] text-emerald-200">
                  Blooms Open Hand
                </div>

                <div class="mt-2 text-2xl font-black">
                  <?=h($s[0])?>
                </div>

              </div>

            </div>


            <!-- Content -->

            <div class="p-7 md:p-10 lg:p-12">

              <div class="flex items-start justify-between gap-5">

                <div>

                  <h2 class="text-2xl md:text-3xl lg:text-4xl font-black tracking-tight text-slate-950">
                    <?=h($s[0])?>
                  </h2>

                  <p class="mt-3 text-lg font-bold text-emerald-700">
                    <?=h($s[1])?>
                  </p>

                </div>

                <span class="hidden sm:block text-xs font-black tracking-[.2em] text-slate-300">
                  <?=str_pad($i+1,2,'0',STR_PAD_LEFT)?> / 06
                </span>

              </div>


              <p class="mt-6 text-lg text-slate-600 leading-8">
                <?=h($s[2])?>
              </p>


              <!-- Included -->

              <div class="mt-9">

                <div class="flex items-center gap-3">

                  <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                    ✓
                  </div>

                  <h3 class="font-black text-slate-900">
                    What's Included
                  </h3>

                </div>


                <ul class="mt-5 grid sm:grid-cols-2 gap-3">

                  <?php foreach(explode('|',$s[3]) as $x): ?>

                    <li class="group flex gap-3 rounded-xl bg-slate-50 p-3 text-sm text-slate-600 leading-6 transition-colors duration-300 hover:bg-emerald-50">

                      <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-xs font-black text-emerald-700">
                        ✓
                      </span>

                      <span>
                        <?=h($x)?>
                      </span>

                    </li>

                  <?php endforeach; ?>

                </ul>

              </div>


              <!-- Ideal / Delivery -->

              <div class="mt-8 grid md:grid-cols-2 gap-4">

                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5">

                  <div class="text-xs font-black uppercase tracking-[.16em] text-emerald-700">
                    Ideal for
                  </div>

                  <p class="mt-3 text-sm text-slate-600 leading-6">
                    <?=h($s[4])?>
                  </p>

                </div>


                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5">

                  <div class="text-xs font-black uppercase tracking-[.16em] text-emerald-700">
                    How it's delivered
                  </div>

                  <p class="mt-3 text-sm text-slate-600 leading-6">
                    <?=h($s[5])?>
                  </p>

                </div>

              </div>


              <!-- CTA -->

              <div class="mt-8 flex flex-wrap items-center gap-5">

                <a
                  href="contact.php"
                  class="group inline-flex items-center gap-3 rounded-full bg-emerald-700 px-7 py-3.5 text-sm font-black text-white shadow-lg shadow-emerald-900/10 transition-all duration-300 hover:-translate-y-1 hover:bg-emerald-800 hover:shadow-xl"
                >

                  <?=h($s[6])?>

                  <span class="transition-transform duration-300 group-hover:translate-x-1">
                    →
                  </span>

                </a>


                <a
                  href="#services"
                  class="text-sm font-bold text-slate-400 transition-colors hover:text-emerald-700"
                >
                  Back to services ↑
                </a>

              </div>

            </div>

          </div>

        </article>

      <?php endforeach; ?>

    </div>

  </div>

</section>


<!-- =========================================================
     PERSON CENTERED CARE
     ========================================================= -->

<section class="bg-white py-24 lg:py-32">

  <div class="max-w-7xl mx-auto px-5">

    <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

      <!-- Text -->

      <div class="service-reveal-left">

        <span class="inline-flex items-center gap-2 text-emerald-700 text-xs font-black uppercase tracking-[.2em]">

          <span class="h-px w-8 bg-emerald-600"></span>

          Person-centered care

        </span>


        <h2 class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight leading-[1.02]">

          Support that adapts as
          <span class="text-emerald-700">
            needs change.
          </span>

        </h2>


        <p class="mt-6 text-lg text-slate-600 leading-8">

          Every resident receives care according to an individualized
          approach shaped around health needs, routines, preferences,
          history, and ability. Families remain part of the conversation.

        </p>


        <div class="mt-9 space-y-4">

          <?php

          $approach = [

            [
              '01',
              'Listen first',
              'We take time to understand each resident’s routines, preferences, history, and needs.'
            ],

            [
              '02',
              'Build a plan',
              'Care is organized around an individualized approach developed with the resident and family.'
            ],

            [
              '03',
              'Adapt over time',
              'As needs change, communication and care can be adjusted to continue providing appropriate support.'
            ]

          ];

          ?>


          <?php foreach($approach as $a): ?>

            <div class="group flex gap-5 rounded-2xl border border-slate-100 p-5 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-100 hover:bg-emerald-50/50 hover:shadow-lg">

              <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-700 text-sm font-black text-white">
                <?=$a[0]?>
              </div>

              <div>

                <h3 class="font-black text-slate-900">
                  <?=h($a[1])?>
                </h3>

                <p class="mt-1 text-sm text-slate-600 leading-6">
                  <?=h($a[2])?>
                </p>

              </div>

            </div>

          <?php endforeach; ?>

        </div>

      </div>


      <!-- Visual card -->

      <div class="relative service-reveal-right service-delay-200">

        <div class="absolute -inset-5 rounded-[3rem] bg-emerald-50"></div>

        <div class="relative overflow-hidden rounded-[2.5rem] bg-[#063b2e] p-8 md:p-10 shadow-2xl">

          <div class="absolute right-0 top-0 h-72 w-72 translate-x-24 -translate-y-24 rounded-full bg-emerald-400/10 blur-2xl"></div>


          <div class="relative">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10 text-2xl text-emerald-300">
              ♥
            </div>


            <h3 class="mt-8 text-3xl md:text-4xl font-black text-white">
              Care is personal.
            </h3>


            <p class="mt-5 text-emerald-50/70 leading-7">

              A resident is more than a diagnosis or care requirement.
              We consider the person, their preferences, their history,
              and the things that make everyday life meaningful.

            </p>


            <div class="mt-9 grid gap-3">

              <div class="rounded-2xl border border-white/10 bg-white/5 p-5">

                <div class="flex items-center gap-4">

                  <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-300/10 text-emerald-300">
                    ✓
                  </div>

                  <div>

                    <div class="font-black">
                      Individual routines
                    </div>

                    <div class="mt-1 text-sm text-emerald-100/50">
                      Care that respects daily preferences.
                    </div>

                  </div>

                </div>

              </div>


              <div class="rounded-2xl border border-white/10 bg-white/5 p-5">

                <div class="flex items-center gap-4">

                  <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-300/10 text-emerald-300">
                    ♥
                  </div>

                  <div>

                    <div class="font-black">
                      Family connection
                    </div>

                    <div class="mt-1 text-sm text-emerald-100/50">
                      Families remain part of the conversation.
                    </div>

                  </div>

                </div>

              </div>


              <div class="rounded-2xl border border-white/10 bg-white/5 p-5">

                <div class="flex items-center gap-4">

                  <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-300/10 text-emerald-300">
                    ✦
                  </div>

                  <div>

                    <div class="font-black">
                      Meaningful living
                    </div>

                    <div class="mt-1 text-sm text-emerald-100/50">
                      Encouraging comfort, connection, and joy.
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>


<!-- =========================================================
     STATS
     ========================================================= -->

<section class="bg-slate-50 py-20">

  <div class="max-w-7xl mx-auto px-5">

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">

      <?php

      $stats = [

        [
          '24/7',
          'Care & supervision',
          'Support available around the clock'
        ],

        [
          '6',
          'Licensed beds',
          'A small home-like environment'
        ],

        [
          '5',
          'Rooms',
          'Private and semi-private spaces'
        ],

        [
          '2019',
          'Serving families',
          'Proudly serving the community'
        ]

      ];

      ?>


      <?php foreach($stats as $i=>$stat): ?>

        <div class="group relative overflow-hidden rounded-[1.8rem] border border-slate-100 bg-white p-7 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-xl service-reveal service-delay-<?=($i+1)*100?>">

          <div class="absolute right-0 top-0 h-28 w-28 translate-x-10 -translate-y-10 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-[2.2]"></div>

          <div class="relative">

            <div class="text-4xl md:text-5xl font-black text-emerald-700">
              <?=h($stat[0])?>
            </div>

            <div class="mt-4 font-black text-slate-900">
              <?=h($stat[1])?>
            </div>

            <p class="mt-1 text-sm text-slate-500">
              <?=h($stat[2])?>
            </p>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </div>

</section>


<!-- =========================================================
     FAQ-STYLE CARE NOTES
     ========================================================= -->

<section class="bg-white py-24 lg:py-28">

  <div class="max-w-5xl mx-auto px-5">

    <div class="text-center max-w-3xl mx-auto service-reveal">

      <span class="text-emerald-700 text-xs font-black uppercase tracking-[.2em]">
        Choosing care
      </span>

      <h2 class="mt-5 text-4xl md:text-5xl font-black tracking-tight">

        A care decision should feel

        <span class="text-emerald-700">
          informed and comfortable.
        </span>

      </h2>

      <p class="mt-5 text-lg text-slate-600 leading-8">

        We encourage families to ask questions, visit our home, and discuss
        their loved one's needs before making a decision.

      </p>

    </div>


    <div class="mt-12 grid md:grid-cols-3 gap-5">

      <?php

      $notes = [

        [
          'Visit us',
          'See the home, meet the team, and get a feel for our environment.',
          '⌂'
        ],

        [
          'Discuss needs',
          'Tell us about your loved one’s routines, care needs, and preferences.',
          '♥'
        ],

        [
          'Make a plan',
          'We can discuss availability and whether our home is an appropriate fit.',
          '✓'
        ]

      ];

      ?>


      <?php foreach($notes as $i=>$note): ?>

        <div class="group rounded-[2rem] border border-slate-100 bg-slate-50 p-7 text-center transition-all duration-500 hover:-translate-y-2 hover:bg-emerald-50 hover:shadow-xl service-reveal service-delay-<?=($i+1)*100?>">

          <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-2xl text-emerald-700 shadow-sm transition-all duration-300 group-hover:bg-emerald-700 group-hover:text-white group-hover:scale-110">
            <?=h($note[2])?>
          </div>

          <h3 class="mt-6 text-xl font-black text-slate-900">
            <?=h($note[0])?>
          </h3>

          <p class="mt-3 text-sm text-slate-600 leading-6">
            <?=h($note[1])?>
          </p>

        </div>

      <?php endforeach; ?>

    </div>

  </div>

</section>


<!-- =========================================================
     FINAL CTA
     ========================================================= -->

<section class="relative overflow-hidden bg-[#063b2e] py-24 lg:py-32 text-white">

  <div class="absolute inset-0 pointer-events-none">

    <div class="absolute -right-40 -top-40 h-[32rem] w-[32rem] rounded-full border border-white/10"></div>

    <div class="absolute -left-40 bottom-[-16rem] h-[32rem] w-[32rem] rounded-full bg-emerald-400/10 blur-3xl"></div>

  </div>


  <div class="relative max-w-5xl mx-auto px-5 text-center service-reveal">

    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-white/10 text-2xl text-emerald-300">
      ♥
    </div>


    <span class="mt-7 inline-block text-emerald-300 text-xs font-black uppercase tracking-[.2em]">
      Let's talk about care
    </span>


    <h2 class="mt-5 text-4xl md:text-5xl lg:text-6xl font-black tracking-tight">
      Let's discuss the right care for your loved one.
    </h2>


    <p class="mx-auto mt-6 max-w-2xl text-lg text-emerald-50/70 leading-8">

      Contact Blooms Open Hand to discuss care needs, availability, or a
      tour of our Marysville home. We would be happy to answer your questions.

    </p>


    <div class="mt-9 flex flex-wrap justify-center gap-4">

      <a
        href="contact.php"
        class="group inline-flex items-center gap-3 rounded-full bg-white px-8 py-4 text-sm font-black text-[#063b2e] shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl"
      >

        Contact Us

        <span class="transition-transform duration-300 group-hover:translate-x-1">
          →
        </span>

      </a>


      <a
        href="contact.php"
        class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/5 px-8 py-4 text-sm font-black text-white backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:bg-white/10"
      >
        Schedule a Tour
      </a>

    </div>

  </div>

</section>


<!-- =========================================================
     JAVASCRIPT
     ========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {


  /*
   * ----------------------------------------------------------
   * Scroll reveal
   * ----------------------------------------------------------
   */

  const revealElements = document.querySelectorAll(
    '.service-reveal, .service-reveal-left, .service-reveal-right'
  );


  if ('IntersectionObserver' in window) {

    const observer = new IntersectionObserver(
      function(entries, observer) {

        entries.forEach(function(entry) {

          if (entry.isIntersecting) {

            entry.target.classList.add('service-visible');

            observer.unobserve(entry.target);

          }

        });

      },
      {
        threshold:0.1,
        rootMargin:'0px 0px -50px 0px'
      }
    );


    revealElements.forEach(function(element) {

      observer.observe(element);

    });

  } else {

    revealElements.forEach(function(element) {

      element.classList.add('service-visible');

    });

  }


  /*
   * ----------------------------------------------------------
   * Smooth scrolling for service links
   * ----------------------------------------------------------
   */

  document.querySelectorAll('a[href^="#service-"]').forEach(function(link) {

    link.addEventListener('click', function(event) {

      const targetId = this.getAttribute('href');

      const target = document.querySelector(targetId);

      if (!target) {
        return;
      }

      event.preventDefault();

      const headerOffset = 90;

      const elementPosition =
        target.getBoundingClientRect().top + window.pageYOffset;

      const offsetPosition =
        elementPosition - headerOffset;


      window.scrollTo({
        top:offsetPosition,
        behavior:'smooth'
      });

    });

  });


  /*
   * ----------------------------------------------------------
   * Subtle 3D movement for service images
   * ----------------------------------------------------------
   */

  const imageCards = document.querySelectorAll(
    '.service-image-wrap'
  );


  imageCards.forEach(function(card) {

    card.addEventListener('mousemove', function(event) {

      const rect = card.getBoundingClientRect();

      const x =
        (event.clientX - rect.left) / rect.width;

      const y =
        (event.clientY - rect.top) / rect.height;


      const rotateX =
        (0.5 - y) * 1.5;

      const rotateY =
        (x - 0.5) * 1.5;


      card.style.transform =
        'perspective(1000px) rotateX(' +
        rotateX +
        'deg) rotateY(' +
        rotateY +
        'deg)';

    });


    card.addEventListener('mouseleave', function() {

      card.style.transform =
        'perspective(1000px) rotateX(0deg) rotateY(0deg)';

    });

  });


  /*
   * ----------------------------------------------------------
   * Highlight service section when linked from navigation
   * ----------------------------------------------------------
   */

  const serviceCards = document.querySelectorAll(
    '[id^="service-"]'
  );


  const serviceObserver = new IntersectionObserver(
    function(entries) {

      entries.forEach(function(entry) {

        if (entry.isIntersecting) {

          entry.target.classList.add(
            'ring-1',
            'ring-emerald-200'
          );


          setTimeout(function() {

            entry.target.classList.remove(
              'ring-1',
              'ring-emerald-200'
            );

          }, 1200);

        }

      });

    },
    {
      threshold:0.25
    }
  );


  serviceCards.forEach(function(card) {

    serviceObserver.observe(card);

  });

});

</script>


<?php require_once __DIR__.'/footer.php'; ?>