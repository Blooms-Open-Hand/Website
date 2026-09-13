<?php $pageTitle='Upcoming Tours';$pageDescription='View upcoming tours and visit schedules.';require_once __DIR__.'/header.php';$rows=$pdo->query("SELECT * FROM tours WHERE status='upcoming' AND tour_date >= CURDATE() ORDER BY tour_date ASC,tour_time ASC")->fetchAll();?>
<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-5 py-20">
        <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.18em]">Visit us</span>
        <h1 class="mt-4 text-5xl md:text-6xl font-black">Upcoming tours.</h1>
        <p class="mt-5 max-w-2xl text-lg text-slate-600">Check available dates and plan your visit.</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-5xl mx-auto px-5 space-y-5">
        <?php if(!$rows):?>
            <div class="text-center py-20 text-slate-500">No upcoming tours are currently scheduled.</div>
        <?php else: foreach($rows as $t):?>
            <div class="rounded-3xl border bg-white p-6 md:p-8 flex flex-col md:flex-row gap-6 md:items-center">
                <div class="rounded-2xl bg-emerald-50 text-emerald-800 p-4 text-center min-w-24">
                    <div class="text-xs font-bold uppercase"><?=date('M',strtotime($t['tour_date']))?></div>
                    <div class="text-3xl font-black"><?=date('d',strtotime($t['tour_date']))?></div>
                    <div class="text-xs font-bold"><?=date('Y',strtotime($t['tour_date']))?></div>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold"><?=h($t['title'])?></h2>
                    <div class="mt-2 flex flex-wrap gap-4 text-sm text-slate-500">
                        <span>◷ <?=h($t['tour_time']?date('g:i A',strtotime($t['tour_time'])):'Time TBA')?></span>
                        <span>⌖ <?=h($t['location'])?></span>
                    </div>fe
                    <p class="mt-4 text-slate-600 leading-7"><?=h($t['description'])?></p>
                    <?php if($t['instructions']):?>
                        <p class="mt-3 text-sm bg-slate-50 rounded-xl p-4">
                            <strong>Information:</strong> <?=h($t['instructions'])?></p>
                    <?php endif;?>
                </div>
            </div>
        <?php endforeach;endif;?>
    </div>
</section>
<?php require_once __DIR__.'/footer.php';?>
