<?php $pageTitle='Gallery';$pageDescription='Explore photos and moments from our community.';require_once __DIR__.'/header.php';$rows=$pdo->query("SELECT * FROM gallery WHERE status='published' ORDER BY id DESC")->fetchAll();?>
<section class="bg-[#063b2e] text-white">
    <div class="max-w-7xl mx-auto px-5 py-20">
        <span class="text-emerald-300 text-xs font-bold uppercase tracking-[.18em]">Our community</span>
        <h1 class="mt-4 text-5xl md:text-6xl font-black">Moments that matter.</h1>
        <p class="mt-5 max-w-2xl text-emerald-100 text-lg">A glimpse into our activities, people and community.</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-7xl mx-auto px-5">
        <?php if(!$rows):?>
            <div class="text-center py-20 text-slate-500">Gallery images will appear here soon.</div>
        <?php else:?>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                <?php foreach($rows as $g):?>
                    <button onclick="openLightbox('<?=h('./admin/' .assetImage($g['image_url']))?>','<?=h($g['title'])?>')" class="group text-left overflow-hidden rounded-3xl border bg-white">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="<?=h('./admin/' .assetImage($g['image_url']))?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="<?=h($g['title'])?>">
                        </div>
                        <div class="p-4">
                            <h2 class="font-bold"><?=h($g['title'])?></h2>
                            <?php if($g['description']):?>
                                <p class="mt-1 text-sm text-slate-500"><?=h(excerpt($g['description'],90))?></p>
                            <?php endif;?>
                        </div>
                    </button>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>

<div id="lightbox" class="hidden fixed inset-0 z-50 bg-black/90 p-5 items-center justify-center" onclick="closeLightbox()">
    <div class="max-w-5xl w-full" onclick="event.stopPropagation()">
        <button onclick="closeLightbox()" class="float-right text-white text-3xl mb-3">×</button>
        <img id="lightImg" class="w-full max-h-[80vh] object-contain rounded-2xl">
        <p id="lightTitle" class="text-white text-center mt-4 font-bold"></p>
    </div>
</div>
<script>function openLightbox(i,t){document.getElementById('lightImg').src=i;document.getElementById('lightTitle').textContent=t;document.getElementById('lightbox').classList.remove('hidden');document.getElementById('lightbox').classList.add('flex');}function closeLightbox(){document.getElementById('lightbox').classList.add('hidden');document.getElementById('lightbox').classList.remove('flex')}</script>
<?php require_once __DIR__.'/footer.php';?>
