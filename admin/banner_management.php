<?php
require_once __DIR__.'/auth.php';
require_once __DIR__.'/layout.php';
require_once __DIR__.'/image_helper.php';
$pdo = db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'] ?? '';
        if ($action === 'save') {
            $id = (int)($_POST['id'] ?? 0);
            $oldImage = trim($_POST['existing_image'] ?? '');
            $image = trim($_POST['image_url'] ?? '');
            $uploaded = uploadImage('image_file');
            if ($uploaded) $image = $uploaded;

            $data = [
                trim($_POST['title'] ?? ''),
                trim($_POST['description'] ?? ''),
                $image,
                trim($_POST['button_text'] ?? ''),
                trim($_POST['button_link'] ?? ''),
                $_POST['status'] ?? 'published'
            ];
            if (!$data[0]) throw new RuntimeException('Banner headline is required.');

            if ($id) {
                $s = $pdo->prepare("UPDATE banners SET title=?,description=?,image_url=?,button_text=?,button_link=?,status=? WHERE id=?");
                $s->execute([...$data, $id]);
                if ($uploaded && $oldImage && $oldImage !== $image) deleteLocalImage($oldImage);
                flash('Banner updated successfully.');
            } else {
                $s = $pdo->prepare("INSERT INTO banners(title,description,image_url,button_text,button_link,status) VALUES(?,?,?,?,?,?)");
                $s->execute($data);
                flash('Banner added successfully.');
            }
        } elseif ($action === 'delete') {
            $id=(int)($_POST['id']??0);
            $s=$pdo->prepare("SELECT image_url FROM banners WHERE id=?");$s->execute([$id]);$old=$s->fetchColumn();
            $s=$pdo->prepare("DELETE FROM banners WHERE id=?");$s->execute([$id]);
            deleteLocalImage($old); flash('Banner deleted.');
        }
    } catch (Throwable $e) { flash($e->getMessage(), 'error'); }
    redirect('banner_management.php');
}

$edit=null;
if(isset($_GET['edit'])){$s=$pdo->prepare("SELECT * FROM banners WHERE id=?");$s->execute([(int)$_GET['edit']]);$edit=$s->fetch();}
$rows=$pdo->query("SELECT * FROM banners ORDER BY id DESC")->fetchAll();
pageStart('Banner Management','banners');
?>
<div class="flex items-center justify-between mb-6"><div><h2 class="text-2xl font-bold">Landing Page Banners</h2><p class="text-sm text-slate-500 mt-1">Manage hero images, headlines, descriptions and CTAs.</p></div><button onclick="openModal('bannerModal')" class="rounded-xl bg-emerald-700 px-5 py-3 text-white font-semibold">+ Add Banner</button></div>
<div class="bg-white rounded-2xl border shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="min-w-full text-sm"><thead class="bg-slate-50"><tr><th class="p-4 text-left">Banner</th><th class="p-4 text-left">CTA</th><th class="p-4 text-left">Status</th><th class="p-4 text-right">Actions</th></tr></thead><tbody>
<?php foreach($rows as $r): ?><tr class="border-t"><td class="p-4"><div class="flex items-center gap-3"><?php if($r['image_url']): ?><img src="<?=h($r['image_url'])?>" class="h-14 w-20 rounded-lg object-cover"><?php endif; ?><div><div class="font-semibold"><?=h($r['title'])?></div><div class="max-w-md truncate text-xs text-slate-400"><?=h($r['description'])?></div></div></div></td><td class="p-4"><?=h($r['button_text'])?></td><td class="p-4"><span class="rounded-full px-2 py-1 text-xs <?=$r['status']==='published'?'bg-emerald-50 text-emerald-700':'bg-amber-50 text-amber-700'?>"><?=h($r['status'])?></span></td><td class="p-4"><div class="flex justify-end gap-3"><a href="?edit=<?=$r['id']?>" class="text-emerald-700 font-medium">Edit</a><form method="POST" onsubmit="return confirm('Delete this banner?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="text-red-600">Delete</button></form></div></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php
$m=$edit?:['id'=>'','title'=>'','description'=>'','image_url'=>'','button_text'=>'','button_link'=>'','status'=>'published'];
modalStart('bannerModal',$edit?'Edit Banner':'Add Banner');
?>
<form method="POST" enctype="multipart/form-data" class="space-y-4"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?=h($m['id'])?>"><input type="hidden" name="existing_image" value="<?=h($m['image_url'])?>">
<?php inputField('title','Banner Headline',$m['title'],'text',true,'Compassionate Care for a Healthier Life'); ?>
<?php textareaField('description','Description',$m['description'],4); ?>
<div><label class="mb-1 block text-sm font-medium">Image File <span class="text-slate-400 font-normal">(optional)</span></label><input type="file" name="image_file" accept="image/jpeg,image/png,image/webp,image/gif" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 bg-white"><p class="text-xs text-slate-400 mt-1">JPG, PNG, WEBP or GIF · max 8 MB. If selected, this replaces the URL image.</p></div>
<?php inputField('image_url','Or Image URL',$m['image_url'],'url',false,'https://example.com/image.jpg'); ?>
<?php if($m['image_url']): ?><div class="flex items-center gap-3 rounded-xl bg-slate-50 p-3"><img src="<?=h($m['image_url'])?>" class="h-16 w-24 rounded-lg object-cover"><span class="text-xs text-slate-500">Current image</span></div><?php endif; ?>
<div class="grid sm:grid-cols-2 gap-4"><?php inputField('button_text','CTA Text',$m['button_text']); ?><?php inputField('button_link','CTA Link',$m['button_link'],'text'); ?></div>
<div><label class="text-sm font-medium">Status</label><select name="status" class="mt-1 w-full rounded-xl border px-3 py-2.5"><option value="published" <?=$m['status']==='published'?'selected':''?>>Published</option><option value="draft" <?=$m['status']==='draft'?'selected':''?>>Draft</option></select></div>
<div class="flex justify-end gap-3 pt-2"><button type="button" onclick="closeModal('bannerModal')" class="rounded-xl border px-5 py-2.5">Cancel</button><button class="rounded-xl bg-emerald-700 px-5 py-2.5 text-white font-semibold"><?=$edit?'Update Banner':'Save Banner'?></button></div></form>
<?php modalEnd(); if(isset($_GET['edit']) && $edit): ?><script>document.addEventListener('DOMContentLoaded',function(){openModal('bannerModal');});</script><?php endif; pageEnd(); ?>
