<?php $pageTitle='Blog & Updates';$pageDescription='News, stories and updates from our organization.';require_once __DIR__.'/header.php';$rows=$pdo->query("SELECT * FROM blogs WHERE status='published' ORDER BY COALESCE(published_at,created_at) DESC")->fetchAll();?>
<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-5 py-20">
        <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.18em]">News & stories</span>
        <h1 class="mt-4 text-5xl md:text-6xl font-black">Ideas, updates & community stories.</h1>
        <p class="mt-5 max-w-2xl text-lg text-slate-600 leading-8">Stay connected with the latest news and stories from our community.</p>
    </div>
</section>s
<section class="py-16">
    <div class="max-w-7xl mx-auto px-5">
        <?php if(!$rows):?>
            <div class="text-center py-20 text-slate-500">No published articles yet.</div>
        <?php else:?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
                <?php foreach($rows as $b):?>
                    <article class="group rounded-3xl border overflow-hidden bg-white hover:shadow-xl transition">
                        <a href="blog_detail.php?slug=<?=urlencode($b['slug'])?>">
                            <img src="<?=h('./admin/' .assetImage($b['featured_image']))?>" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="<?=h($b['title'])?>">
                        </a>
                        <div class="p-7">
                            <div class="text-xs font-bold text-emerald-700"><?=h($b['published_at']?date('M d, Y',strtotime($b['published_at'])):date('M d, Y',strtotime($b['created_at'])))?></div>
                            <h2 class="mt-3 text-2xl font-bold leading-tight"><?=h($b['title'])?></h2>
                            <p class="mt-4 text-slate-600 leading-7"><?=h(excerpt($b['excerpt'] ?: $b['content'],155))?></p>
                            <a href="blog_detail.php?slug=<?=urlencode($b['slug'])?>" class="mt-6 inline-block font-bold text-emerald-700">Read article →</a>
                        </div>
                    </article>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>
<?php require_once __DIR__.'/footer.php';?>
