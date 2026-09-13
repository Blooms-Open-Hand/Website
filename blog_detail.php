<?php
require_once __DIR__.'/site.php';
$slug=trim($_GET['slug']??'');
$stmt=$pdo->prepare("SELECT * FROM blogs WHERE slug=? AND status='published' LIMIT 1");$stmt->execute([$slug]);$post=$stmt->fetch();
if(!$post){http_response_code(404);$pageTitle='Article Not Found';require __DIR__.'/header.php';echo '<div class="max-w-4xl mx-auto px-5 py-32 text-center"><h1 class="text-4xl font-black">Article not found</h1><a class="mt-6 inline-block text-emerald-700 font-bold" href="blog.php">← Back to blog</a></div>';require __DIR__.'/footer.php';exit;}
$pageTitle=$post['title'];$pageDescription=excerpt($post['excerpt']?:$post['content'],155);require __DIR__.'/header.php';
?>
<article>
    <section class="bg-slate-50 py-16">
        <div class="max-w-4xl mx-auto px-5">
            <a href="blog.php" class="text-emerald-700 font-bold text-sm">← Back to blog</a>
            <div class="mt-8 text-xs font-bold text-emerald-700"><?=h($post['published_at']?date('M d, Y',strtotime($post['published_at'])):date('M d, Y',strtotime($post['created_at'])))?></div>
            <h1 class="mt-4 text-5xl md:text-6xl font-black leading-tight"><?=h($post['title'])?></h1>
            <?php if($post['excerpt']):?>
                <p class="mt-6 text-xl text-slate-600 leading-8"><?=h($post['excerpt'])?></p>
            <?php endif;?>
        </div>
    </section>
    <div class="max-w-4xl mx-auto px-5 py-12">
        <?php if($post['featured_image']):?>
            <img src="<?=h('./admin/' .assetImage($post['featured_image']))?>" class="w-full max-h-[560px] object-cover rounded-3xl mb-12" alt="<?=h($post['title'])?>">
        <?php endif;?>
        <div class="prose prose-lg max-w-none text-slate-700 leading-8 whitespace-pre-line"><?=nl2br(h($post['content']))?></div>
    </div>
</article>
<?php require __DIR__.'/footer.php';?>
