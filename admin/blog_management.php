<?php
require_once __DIR__.'/auth.php';
require_once __DIR__.'/layout.php';
require_once __DIR__.'/image_helper.php'; $pdo=db();

if($_SERVER['REQUEST_METHOD']==='POST'){
    try{
        $action=$_POST['action']??'';
        if($action==='save'){
            $id=(int)($_POST['id']??0);$oldImage=trim($_POST['existing_image']??'');$image=trim($_POST['featured_image']??'');
            $uploaded=uploadImage('image_file'); if($uploaded)$image=$uploaded;
            $title=trim($_POST['title']??'');$slug=trim($_POST['slug']??'');
            if(!$title)throw new RuntimeException('Blog title is required.');
            if(!$slug)$slug=strtolower(trim(preg_replace('/[^A-Za-z0-9]+/','-',$title),'-'));
            $status=$_POST['status']??'draft';$published=$status==='published'?date('Y-m-d H:i:s'):null;
            $data=[$title,$slug,trim($_POST['excerpt']??''),trim($_POST['content']??''),$image,$status,$published];
            if($id){$s=$pdo->prepare("UPDATE blogs SET title=?,slug=?,excerpt=?,content=?,featured_image=?,status=?,published_at=? WHERE id=?");$s->execute([...$data,$id]);if($uploaded&&$oldImage&&$oldImage!==$image)deleteLocalImage($oldImage);flash('Blog post updated.');}
            else{$s=$pdo->prepare("INSERT INTO blogs(title,slug,excerpt,content,featured_image,status,published_at) VALUES(?,?,?,?,?,?,?)");$s->execute($data);flash('Blog post created.');}
            }elseif($action==='delete'){$id=(int)$_POST['id'];$s=$pdo->prepare("SELECT featured_image FROM blogs WHERE id=?");$s->execute([$id]);$old=$s->fetchColumn();$s=$pdo->prepare("DELETE FROM blogs WHERE id=?");$s->execute([$id]);deleteLocalImage($old);flash('Blog post deleted.');}
            }catch(Throwable $e){flash($e->getMessage(),'error');}redirect('blog_management.php');
}
$edit=null;if(isset($_GET['edit'])){$s=$pdo->prepare("SELECT * FROM blogs WHERE id=?");$s->execute([(int)$_GET['edit']]);$edit=$s->fetch();}
$rows=$pdo->query("SELECT * FROM blogs ORDER BY id DESC")->fetchAll();pageStart('Blog Management','blogs');
?>
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold">Blog Posts</h2>
        <p class="text-sm text-slate-500 mt-1">Create, edit, publish and remove articles.</p>
    </div>
    <button onclick="openModal('blogModal')" class="rounded-xl bg-emerald-700 px-5 py-3 text-white font-semibold">+ Add Blog Post</button>
</div>
<div class="bg-white border rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-4 text-left">Article</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Created</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $r): ?>
                    <tr class="border-t">
                        <td class="p-4">
                            <div class="flex gap-3 items-center">
                                <?php if($r['featured_image']):?>
                                    <img src="<?=h($r['featured_image'])?>" class="w-20 h-14 rounded-lg object-cover">
                                    <?php endif;?><div><div class="font-semibold"><?=h($r['title'])?></div><div class="text-xs text-slate-400 max-w-lg truncate"><?=h($r['excerpt'])?></div></div></div></td><td class="p-4"><?=h($r['status'])?></td><td class="p-4 text-slate-500"><?=date('M d, Y',strtotime($r['created_at']))?></td><td class="p-4"><div class="flex justify-end gap-3"><a class="text-emerald-700" href="?edit=<?=$r['id']?>">Edit</a><form method="POST" onsubmit="return confirm('Delete this post?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="text-red-600">Delete</button></form></div></td></tr><?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php $m=$edit?:['id'=>'','title'=>'','slug'=>'','excerpt'=>'','content'=>'','featured_image'=>'','status'=>'draft'];modalStart('blogModal',$edit?'Edit Blog Post':'Add Blog Post');?>
<form method="POST" enctype="multipart/form-data" class="space-y-4"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?=h($m['id'])?>"><input type="hidden" name="existing_image" value="<?=h($m['featured_image'])?>">
<?php inputField('title','Title',$m['title'],'text',true); ?><?php inputField('slug','Slug',$m['slug'],'text',false,'auto-generated-if-empty'); ?><?php textareaField('excerpt','Short Description',$m['excerpt'],3); ?><?php textareaField('content','Article Content',$m['content'],8); ?>
<div><label class="mb-1 block text-sm font-medium">Featured Image File <span class="text-slate-400 font-normal">(optional)</span></label><input type="file" name="image_file" accept="image/jpeg,image/png,image/webp,image/gif" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 bg-white"><p class="text-xs text-slate-400 mt-1">JPG, PNG, WEBP or GIF · max 8 MB.</p></div>
<?php inputField('featured_image','Or Image URL',$m['featured_image'],'url'); ?><?php if($m['featured_image']): ?><div class="flex items-center gap-3 rounded-xl bg-slate-50 p-3"><img src="<?=h($m['featured_image'])?>" class="h-16 w-24 rounded-lg object-cover"><span class="text-xs text-slate-500">Current image</span></div><?php endif; ?>
<div><label class="text-sm font-medium">Status</label><select name="status" class="mt-1 w-full rounded-xl border px-3 py-2.5"><option value="draft" <?=$m['status']==='draft'?'selected':''?>>Draft</option><option value="published" <?=$m['status']==='published'?'selected':''?>>Published</option></select></div>
<div class="flex justify-end gap-3"><button type="button" onclick="closeModal('blogModal')" class="rounded-xl border px-5 py-2.5">Cancel</button><button class="rounded-xl bg-emerald-700 px-5 py-2.5 text-white font-semibold"><?=$edit?'Update Post':'Save Post'?></button></div></form>
<?php modalEnd();if(isset($_GET['edit'])&&$edit):?><script>document.addEventListener('DOMContentLoaded',function(){openModal('blogModal');});</script><?php endif;pageEnd();?>
