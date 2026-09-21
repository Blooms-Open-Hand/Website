<?php require_once __DIR__.'/site.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="BLOOMS OPEN HAND LLC" />
<link rel="manifest" href="/site.webmanifest" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=h($pageTitle ?? $organization)?> | <?=h($organization)?></title>
    <meta name="description" content="<?=h($pageDescription ?? 'Professional home care services and community support.')?>">
    <meta name="theme-color" content="#0b6b52">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script>
    tailwind.config={theme:{extend:{
      colors:{brand:{50:'#ecfdf5',600:'#0f7a5d',700:'#0b6b52',800:'#085641',900:'#064333'}},
      fontFamily:{sans:['Inter','ui-sans-serif','system-ui','sans-serif']}
      }}}
    </script>
    <style>
    html{scroll-behavior:smooth}.hero-slide{display:none}.hero-slide.active{display:block}
    .text-balance{text-wrap:balance}
    </style>
  </head>
  <body class="bg-white text-slate-800 antialiased">
    <div class="bg-[#063b2e] text-white text-sm">
      <div class="max-w-7xl mx-auto px-5 py-2.5 flex flex-col sm:flex-row justify-between gap-2">
        <div class="flex flex-wrap gap-4">
          <a href="tel:<?=h($phone)?>" class="hover:text-emerald-200">☎ <?=h($phone)?></a>
          <a href="mailto:<?=h($email)?>" class="hover:text-emerald-200">✉ <?=h($email)?></a>
        </div>
        <span><?=h($hours)?></span>
      </div>
    </div>
    
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-slate-100">
      <div class="max-w-7xl mx-auto px-5">
        <div class="h-20 flex items-center justify-between">
          <a href="index.php" class="flex items-center gap-3">
            <!-- <div class="h-11 w-11 rounded-2xl bg-emerald-700 text-white flex items-center justify-center text-xl font-bold">♥</div> -->
            <div>
              <div class="font-extrabold text-lg leading-none"><?=h($organization)?></div>
              <div class="text-[9px] uppercase tracking-[.18em] text-slate-400 mt-1">Where Every Resident Is Family.</div>
            </div>
          </a>
          <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold">
            <a class="<?=navActive('index.php')?>" href="index.php">Home</a>
            <a class="<?=navActive('about.php')?>" href="about.php">About Us</a>
            <a class="<?=navActive('services.php')?>" href="services.php">Services</a>
            <a class="<?=navActive('gallery.php')?>" href="gallery.php">Gallery</a>
            <a class="<?=navActive('blog.php')?>" href="blog.php">Blog</a>
            <a class="<?=navActive('contact.php')?>" href="contact.php">Contact</a>
          </nav>
          <a href="schedule.php" class="hidden sm:inline-flex rounded-full bg-emerald-700 px-5 py-3 text-sm font-bold text-white hover:bg-emerald-800 transition">Schedule a Tour</a>
          <button id="mobileBtn" class="lg:hidden h-11 w-11 rounded-xl border border-slate-200 text-xl">☰</button>
        </div>
        <nav id="mobileNav" class="hidden lg:hidden pb-5 border-t pt-4 space-y-1">
          <a class="block rounded-xl px-4 py-3 <?=navActive('index.php')?>" href="index.php">Home</a>
          <a class="block rounded-xl px-4 py-3 <?=navActive('about.php')?>" href="about.php">About Us</a>
          <a class="block rounded-xl px-4 py-3 <?=navActive('services.php')?>" href="services.php">Services</a>
          <a class="block rounded-xl px-4 py-3 <?=navActive('gallery.php')?>" href="gallery.php">Gallery</a>
          <a class="block rounded-xl px-4 py-3 <?=navActive('blog.php')?>" href="blog.php">Blog</a>
          <a class="block rounded-xl px-4 py-3 <?=navActive('contact.php')?>" href="contact.php">Contact</a>
        </nav>
      </div>
    </header>
