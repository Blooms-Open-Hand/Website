<?php
require_once __DIR__.'/auth.php'; require_once __DIR__.'/layout.php'; $pdo=db();
$defaults=['organization_name'=>'Home Care','phone'=>'','email'=>'','address'=>'','google_maps_url'=>'','facebook'=>'','instagram'=>'','linkedin'=>'','working_hours'=>''];
if($_SERVER['REQUEST_METHOD']==='POST'){
 try{
  $stmt=$pdo->prepare("INSERT INTO website_settings(setting_key,setting_value) VALUES(?,?) ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value)");
  foreach($defaults as $key=>$unused){$stmt->execute([$key,trim($_POST[$key]??'')]);}
  flash('Website content saved successfully.');
 }catch(Exception $e){flash($e->getMessage(),'error');}
 redirect('website_content.php');
}
$settings=$defaults;foreach($pdo->query("SELECT setting_key,setting_value FROM website_settings") as $r)$settings[$r['setting_key']]=$r['setting_value'];
pageStart('Website Content','content');
?>
<div class="max-w-5xl"><div class="mb-6"><h2 class="text-2xl font-bold">Website Content</h2><p class="mt-1 text-sm text-slate-500">Manage frequently changing organization and contact information.</p></div>
<form method="POST" class="bg-white border rounded-2xl shadow-sm p-6"><div class="grid md:grid-cols-2 gap-5">
<?php inputField('organization_name','Organization Name',$settings['organization_name']);?><?php inputField('phone','Phone Number',$settings['phone']);?><?php inputField('email','Email Address',$settings['email'],'email');?><?php inputField('working_hours','Working Hours',$settings['working_hours'],'text',false,'Mon-Fri: 8:00 AM - 5:00 PM');?>
<div class="md:col-span-2"><?php inputField('address','Physical Address',$settings['address']);?></div>
<div class="md:col-span-2"><?php inputField('google_maps_url','Google Maps URL',$settings['google_maps_url'],'url');?></div>
<?php inputField('facebook','Facebook URL',$settings['facebook'],'url');?><?php inputField('instagram','Instagram URL',$settings['instagram'],'url');?><?php inputField('linkedin','LinkedIn URL',$settings['linkedin'],'url');?>
</div><div class="mt-6 flex justify-end"><button class="rounded-xl bg-emerald-700 px-6 py-3 text-white font-semibold">Save Website Content</button></div></form></div>
<?php pageEnd();?>
