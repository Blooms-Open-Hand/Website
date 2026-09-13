<?php
require_once __DIR__.'/auth.php';
require_once __DIR__.'/layout.php';
$pdo = db();
$stats = [
    'blogs'=>(int)$pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn(),
    'gallery'=>(int)$pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn(),
    'tours'=>(int)$pdo->query("SELECT COUNT(*) FROM tours WHERE status='upcoming'")->fetchColumn(),
    'banners'=>(int)$pdo->query("SELECT COUNT(*) FROM banners")->fetchColumn()
];
pageStart('Dashboard','dashboard');
?>
<div class="mb-8"><h2 class="text-2xl font-bold text-slate-800">Website Overview</h2><p class="mt-1 text-slate-500">Manage your Home Care website from one place.</p></div>
<div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
<?php foreach ([['Blog Posts',$stats['blogs'],'▤','blog_management.php'],['Gallery Images',$stats['gallery'],'▧','gallery_management.php'],['Upcoming Tours',$stats['tours'],'◷','schedule_management.php'],['Active Banners',$stats['banners'],'▣','banner_management.php']] as $c): ?>
<a href="<?=$c[3]?>" class="bg-white border rounded-2xl p-5 shadow-sm hover:-translate-y-1 hover:shadow-md transition">
<div class="flex justify-between"><span class="text-2xl"><?=$c[2]?></span><span class="text-xs rounded-full bg-emerald-50 text-emerald-700 px-2 py-1">Manage</span></div>
<div class="mt-5 text-3xl font-bold text-slate-800"><?=$c[1]?></div><div class="mt-1 text-sm text-slate-500"><?=h($c[0])?></div></a>
<?php endforeach; ?>
</div>
<div class="grid gap-6 xl:grid-cols-2 mt-8">
<div class="bg-white border rounded-2xl p-6 shadow-sm"><h3 class="font-bold text-slate-800">Quick Actions</h3>
<div class="grid sm:grid-cols-2 gap-3 mt-5">
<a href="banner_management.php?action=add" class="rounded-xl border p-4 hover:bg-emerald-50 hover:border-emerald-400">▣ Add Banner</a>
<a href="blog_management.php?action=add" class="rounded-xl border p-4 hover:bg-emerald-50 hover:border-emerald-400">▤ Add Blog Post</a>
<a href="gallery_management.php?action=add" class="rounded-xl border p-4 hover:bg-emerald-50 hover:border-emerald-400">▧ Add Gallery Image</a>
<a href="schedule_management.php?action=add" class="rounded-xl border p-4 hover:bg-emerald-50 hover:border-emerald-400">◷ Add Tour</a>
<a href="website_content.php" class="rounded-xl border p-4 hover:bg-emerald-50 hover:border-emerald-400 sm:col-span-2">⚙ Update Website Contact Information</a>
</div></div>
<div class="bg-white border rounded-2xl p-6 shadow-sm"><h3 class="font-bold">Recent Blog Posts</h3>
<div class="mt-4 divide-y">
<?php foreach($pdo->query("SELECT title,status,created_at FROM blogs ORDER BY id DESC LIMIT 5") as $r): ?>
<div class="py-3 flex justify-between gap-4"><div><div class="font-medium"><?=h($r['title'])?></div><div class="text-xs text-slate-400"><?=date('M d, Y',strtotime($r['created_at']))?></div></div><span class="text-xs"><?=h($r['status'])?></span></div>
<?php endforeach; ?>
</div></div></div>
<?php pageEnd(); ?>
