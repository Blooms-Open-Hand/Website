<?php $pageTitle='About Us';$pageDescription='Learn about our organization, mission, vision and values.';require_once __DIR__.'/header.php';?>
<section class="bg-[#063b2e] text-white">
    <div class="max-w-7xl mx-auto px-5 py-24">
        <span class="text-emerald-300 uppercase tracking-[.2em] text-xs font-bold">About <?=h($organization)?></span>
        <h1 class="mt-5 text-5xl md:text-6xl font-black max-w-3xl">People-first care built on dignity and trust.</h1>
        <p class="mt-6 max-w-2xl text-emerald-100 text-lg leading-8">We are committed to creating a supportive environment where every person is valued, heard and empowered.</p>
    </div>
</section>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-5 grid lg:grid-cols-2 gap-14 items-center">
        <img src="https://images.unsplash.com/photo-1559234938-b60fff04894d?auto=format&fit=crop&w=1100&q=85" class="rounded-[2rem] h-[520px] w-full object-cover" alt="Our care community">
        <div>
            <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.18em]">Our story</span>
            <h2 class="mt-4 text-4xl font-black">A community where care feels personal.</h2>
            <p class="mt-6 leading-8 text-slate-600">Our work is guided by a simple belief: people deserve care that respects their choices, protects their independence and creates opportunities for connection.</p>
            <p class="mt-5 leading-8 text-slate-600">We combine professional support with a warm community experience, helping people feel safe, confident and included.</p>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-5">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.18em]">What guides us</span>
            <h2 class="mt-3 text-4xl font-black">Mission, vision & values</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white rounded-3xl p-8">
                <div class="text-3xl">◎</div>
                <h3 class="mt-6 text-xl font-bold">Our Mission</h3>
                <p class="mt-3 text-slate-600 leading-7">To provide compassionate, respectful support that improves wellbeing, confidence and quality of life.</p>
            </div>
            <div class="bg-white rounded-3xl p-8">
                <div class="text-3xl">◇</div>
                <h3 class="mt-6 text-xl font-bold">Our Vision</h3>
                <p class="mt-3 text-slate-600 leading-7">A connected community where everyone can live with dignity, purpose and belonging.</p>
            </div>
            <div class="bg-white rounded-3xl p-8">
                <div class="text-3xl">♥</div>
                <h3 class="mt-6 text-xl font-bold">Our Values</h3>
                <p class="mt-3 text-slate-600 leading-7">Respect, compassion, inclusion, integrity, safety and a commitment to meaningful lives.</p>
            </div>
        </div>
    </div>
</section>
<section class="py-20">
    <div class="max-w-4xl mx-auto px-5 text-center">
        <h2 class="text-4xl font-black">Want to learn more?</h2>
        <p class="mt-4 text-slate-600">Get in touch with our team and discover how we can support you.</p>
        <a href="contact.php" class="mt-7 inline-flex rounded-full bg-emerald-700 px-7 py-4 text-white font-bold">Contact our team →</a>
    </div>
</section>
<?php require_once __DIR__.'/footer.php';?>
