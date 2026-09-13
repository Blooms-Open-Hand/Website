<?php
function sidebar(string $active): string {
    $items = [
        'dashboard' => ['index.php','▦','Dashboard'],
        'banners' => ['banner_management.php','▣','Banner Management'],
        'blogs' => ['blog_management.php','▤','Blog Management'],
        'gallery' => ['gallery_management.php','▧','Gallery Management'],
        'schedule' => ['schedule_management.php','◷','Tour Schedule'],
        'content' => ['website_content.php','⚙','Website Content'],
    ];
    $html = '<aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full lg:translate-x-0 bg-[#063b2e] text-white transition-transform duration-300">
        <div class="h-full overflow-y-auto p-5">
        <div class="flex items-center gap-3 px-2 mb-8">
            <div class="h-11 w-11 rounded-xl bg-white text-emerald-800 flex items-center justify-center font-bold text-xl">♥</div>
            <div><div class="font-bold">BLOOMS OPEN HAND AFH LLC</div><div class="text-xs text-emerald-200">Admin Panel</div></div>
        </div><nav class="space-y-1">';
    foreach ($items as $key => [$url,$icon,$label]) {
        $cls = $active === $key ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-white/10 hover:text-white';
        $html .= '<a href="'.$url.'" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium '.$cls.'"><span class="w-5">'.$icon.'</span>'.h($label).'</a>';
    }
    $html .= '</nav><div class="mt-8 border-t border-white/10 pt-5">
        <div class="text-xs text-slate-400 px-2">SIGNED IN AS</div>
        <div class="mt-2 rounded-xl bg-white/5 p-3"><div class="font-medium">'.h($_SESSION['admin_name'] ?? 'Administrator').'</div>
        <a href="auth.php?logout=1" class="mt-2 inline-block text-sm text-emerald-200 hover:text-white">Logout →</a></div>
        </div></div></aside>';
    return $html;
}

function pageStart(string $title, string $active): void {
    echo '<!DOCTYPE html><html lang="en"><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>'.h($title).' - Home Care Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{brand:{700:"#0d644c",800:"#084f3c",900:"#063b2e"}}}}}</script><script>
    function toggleSidebar(){document.getElementById("sidebar").classList.toggle("-translate-x-full");}
    function openModal(id){var el=document.getElementById(id);if(!el)return;el.classList.remove("hidden");document.body.classList.add("overflow-hidden");}
    function closeModal(id){var el=document.getElementById(id);if(!el)return;el.classList.add("hidden");document.body.classList.remove("overflow-hidden");}
    document.addEventListener("click",function(e){
        var modal=e.target.closest("[data-modal]");
        if(modal && e.target===modal) closeModal(modal.id);
    });
    document.addEventListener("keydown",function(e){
        if(e.key==="Escape") document.querySelectorAll("[data-modal]:not(.hidden)").forEach(function(m){closeModal(m.id);});
    });
    </script>
    </head><body class="bg-slate-100 text-slate-700">';
    echo sidebar($active);
    echo '<main class="lg:ml-72 min-h-screen"><header class="sticky top-0 z-30 bg-white/95 backdrop-blur border-b px-5 lg:px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3"><button onclick="toggleSidebar()" class="lg:hidden h-10 w-10 rounded-lg border">☰</button>
        <div><p class="text-xs text-slate-400">BLOOMS OPEN HAND AFH LLC</p><h1 class="text-xl font-bold text-slate-800">'.h($title).'</h1></div></div>
        <div class="text-sm text-slate-500">'.date('M d, Y').'</div></header><div class="p-5 lg:p-8">';
    $f = flash();
    if ($f) echo '<div class="mb-6 rounded-xl border p-4 '.($f[1]==='error'?'bg-red-50 border-red-200 text-red-700':'bg-emerald-50 border-emerald-200 text-emerald-700').'">'.h($f[0]).'</div>';
}

function pageEnd(): void {
    echo '</div></main></body></html>';
}

function modalStart(string $id, string $title): void {
    echo '<div id="'.h($id).'" data-modal class="hidden fixed inset-0 z-50 bg-slate-900/60 p-4 overflow-y-auto">
    <div class="min-h-full flex items-center justify-center py-8"><div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">
    <div class="flex items-center justify-between border-b px-6 py-4"><h3 class="text-lg font-bold text-slate-800">'.h($title).'</h3>
    <button type="button" onclick="closeModal(\''.h($id).'\')" class="h-9 w-9 rounded-lg hover:bg-slate-100 text-xl">×</button></div><div class="p-6">';
}

function modalEnd(): void { echo '</div></div></div></div>'; }

function inputField(string $name, string $label, string $value='', string $type='text', bool $required=false, string $placeholder=''): void {
    echo '<div><label class="mb-1 block text-sm font-medium text-slate-700">'.h($label).'</label><input type="'.h($type).'" name="'.h($name).'" value="'.h($value).'" '.($required?'required':'').' placeholder="'.h($placeholder).'" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"></div>';
}
function textareaField(string $name, string $label, string $value='', int $rows=4): void {
    echo '<div><label class="mb-1 block text-sm font-medium text-slate-700">'.h($label).'</label><textarea name="'.h($name).'" rows="'.$rows.'" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 outline-none focus:border-emerald-600">'.h($value).'</textarea></div>';
}
?>
