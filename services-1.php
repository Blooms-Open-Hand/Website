<?php $pageTitle='Services';$pageDescription='Explore the services and support offered by our organization.';require_once __DIR__.'/header.php';?>
<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-5 py-20">
        <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.18em]">What we do</span>
        <h1 class="mt-4 text-5xl md:text-6xl font-black">Services designed around people.</h1>
        <p class="mt-5 max-w-2xl text-lg text-slate-600 leading-8">Practical support, meaningful activities and a welcoming community experience.</p>
    </div>
</section>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-5 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach([
            ['Personal Care','Support with everyday needs while protecting choice, privacy and independence.','♥','https://images.unsplash.com/photo-1576765608866-5b51046452be?auto=format&fit=crop&w=900&q=85'],
            ['Community Support','Helping people stay connected, participate in activities and enjoy community life.','⌖','https://images.unsplash.com/photo-1517457373958-b7bdd4587205?auto=format&fit=crop&w=900&q=85'],
            ['Wellbeing Activities','Engaging programs that encourage confidence, creativity, movement and social connection.','✦','https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=85'],
            ['Daily Living Support','Practical assistance that makes everyday routines easier and more comfortable.','○','https://images.unsplash.com/photo-1559757148-5c350d0d3c56?auto=format&fit=crop&w=900&q=85'],
            ['Social & Recreational','Opportunities to build friendships, discover interests and have fun together.','★','https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=900&q=85'],
            ['Personalized Support','Flexible support shaped around individual preferences, goals and circumstances.','◇','https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?auto=format&fit=crop&w=900&q=85']
            ] as $s):?>
            <article class="group overflow-hidden rounded-3xl border bg-white hover:shadow-xl transition">
                <img src="<?=$s[3]?>" class="h-56 w-full object-cover group-hover:scale-105 transition duration-500" alt="<?=h($s[0])?>">
                <div class="p-7">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl"><?=$s[2]?></div>
                    <h2 class="mt-5 text-xl font-bold"><?=h($s[0])?></h2>
                    <p class="mt-3 text-slate-600 leading-7"><?=h($s[1])?></p>
                </div>
            </article>
        <?php endforeach;?>
    </div>
</section>

<section class="bg-[#063b2e] text-white py-20">
    <div class="max-w-4xl mx-auto px-5 text-center">
        <h2 class="text-4xl font-black">Looking for the right support?</h2>
        <p class="mt-4 text-emerald-100 text-lg">Our team is happy to answer questions and discuss your needs.</p>
        <a href="contact.php" class="mt-7 inline-flex rounded-full bg-white text-emerald-800 px-7 py-4 font-bold">Talk to us →</a>
    </div>
</section>
<?php require_once __DIR__.'/footer.php';?>
