<footer class="bg-[#063b2e] text-white">
  <div class="max-w-7xl mx-auto px-5 pt-14 pb-5">
    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
      <div class="lg:col-span-2">
        <div class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-2xl bg-white text-emerald-800 flex items-center justify-center text-xl font-bold">♥</div>
          <div class="font-bold text-xl"><?=h($organization)?></div>
        </div>
        <p class="mt-5 max-w-xl text-emerald-100 leading-7">Compassionate care, meaningful connection, and a welcoming community built around dignity and wellbeing.</p>
        <div class="mt-6 flex gap-3">
          <a href="<?=h($facebook)?>" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20">f</a>
          <a href="<?=h($instagram)?>" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20">◎</a>
          <a href="<?=h($linkedin)?>" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20">in</a>
        </div>
      </div>
      <div>
        <h3 class="font-bold">Explore</h3>
        <div class="mt-4 space-y-3 text-sm text-emerald-100">
          <a class="block hover:text-white" href="about.php">About Us</a>
          <a class="block hover:text-white" href="services.php">Services</a>
          <a class="block hover:text-white" href="gallery.php">Gallery</a>
          <a class="block hover:text-white" href="blog.php">Blog & Updates</a>
        </div>
      </div>
      <div>
        <h3 class="font-bold">Contact</h3>
        <div class="mt-4 space-y-3 text-sm text-emerald-100">
          <a class="block" href="tel:<?=h($phone)?>">☎ <?=h($phone)?></a>
          <a class="block break-all" href="mailto:<?=h($email)?>">✉ <?=h($email)?></a>
          <p>⌖ <?=h($address)?></p>
          <p>◷ <?=h($hours)?></p>
        </div>
      </div>
    </div>
    <div class="text-center mt-12 border-t border-white/10 pt-6 flex flex-col justify-between gap-3 text-xs text-emerald-200">
      <p>© <?=date('Y')?> <?=h($organization)?>. All rights reserved.</p>
      <p class="text-lg">Designed and Developed By <a href="https://www.kulfinet.com" target="_blank" class="underline text-white font-bold">Kulfinet</a></p>
    </div>
  </div>
</footer>
<script>
document.getElementById('mobileBtn')?.addEventListener('click',()=>document.getElementById('mobileNav').classList.toggle('hidden'));
</script>
</body></html>
