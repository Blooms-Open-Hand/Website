<?php
require_once __DIR__.'/site.php';
$pageTitle='Schedule a Tour';
$pageDescription='Request a tour or care meeting with Blooms Open Hand Adult Family Home.';
$sent=false; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']??'');
    $email=trim($_POST['email']??'');
    $phoneNumber=trim($_POST['phone']??'');
    $date=trim($_POST['tour_date']??'');
    $time=trim($_POST['tour_time']??'');
    $meetingType=trim($_POST['meeting_type']??'Tour / Care Consultation');
    $message=trim($_POST['message']??'');
    if(!$name || !filter_var($email,FILTER_VALIDATE_EMAIL) || !$phoneNumber || !$date || !$time){
        $error='Please complete your name, email, phone, preferred date, and preferred time.';
    } elseif(strtotime($date.' '.$time) < time()) {
        $error='Please choose a future date and time.';
    } else {
        try {
            $title='Client Request - '.$meetingType.' - '.$name;
            $location=$address;
            $description="Client: {$name}\nEmail: {$email}\nPhone: {$phoneNumber}\nMeeting type: {$meetingType}\nPreferred date: {$date}\nPreferred time: {$time}\nMessage: {$message}";
            $instructions='New client request. Please review and contact the client to confirm the appointment.';
            $stmt=$pdo->prepare("INSERT INTO tours(title,tour_date,tour_time,location,description,instructions,status) VALUES(?,?,?,?,?,?,?)");
            $stmt->execute([$title,$date,$time,$location,$description,$instructions,'requested']);
            $sent=true;
        } catch(Throwable $e) {
            $error='We could not submit your request right now. Please call or email us directly.';
        }
    }
}
require __DIR__.'/header.php';
?>
<section class="relative overflow-hidden bg-[#063b2e] text-white">
 <div class="absolute -right-40 -top-40 h-96 w-96 rounded-full border border-white/10"></div>
 <div class="absolute left-1/3 bottom-0 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>
 <div class="relative max-w-7xl mx-auto px-5 py-24 lg:py-28">
  <span class="text-emerald-300 text-xs font-bold uppercase tracking-[.2em]">Plan a visit</span>
  <h1 class="mt-5 max-w-4xl text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-[.98]">Let’s find a time that works for your family.</h1>
  <p class="mt-7 max-w-2xl text-lg md:text-xl text-emerald-50/90 leading-8">Request a tour or care consultation and our team will review your preferred time and follow up to confirm the appointment.</p>
 </div>
</section>

<section class="py-16 lg:py-24 bg-slate-50">
 <div class="max-w-7xl mx-auto px-5 grid lg:grid-cols-5 gap-10 items-start">
  <div class="lg:col-span-2 lg:sticky lg:top-28">
   <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.2em]">A simple next step</span>
   <h2 class="mt-4 text-4xl md:text-5xl font-black tracking-tight">Come experience the home.</h2>
   <p class="mt-5 text-slate-600 leading-8">A visit gives families an opportunity to see our residential setting, ask questions, discuss care needs, and learn whether Blooms Open Hand is the right fit.</p>
   <div class="mt-8 space-y-3">
    <div class="rounded-2xl bg-white border p-5"><strong class="block">24-hour resident care</strong><span class="text-sm text-slate-500">Staffed and operating around the clock.</span></div>
    <div class="rounded-2xl bg-white border p-5"><strong class="block">6 licensed beds</strong><span class="text-sm text-slate-500">A small, familiar home environment.</span></div>
    <div class="rounded-2xl bg-white border p-5"><strong class="block">Owner-led communication</strong><span class="text-sm text-slate-500">Direct and responsive family support.</span></div>
   </div>
  </div>
  <div class="lg:col-span-3 rounded-[2rem] bg-white border border-slate-200 shadow-xl shadow-slate-200/50 p-7 md:p-10">
   <div class="flex items-center gap-4"><div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl">♥</div><div><h2 class="text-2xl font-black">Request a tour or meeting</h2><p class="text-sm text-slate-500">Your request will be sent to our scheduling database for review.</p></div></div>
   <?php if($sent): ?>
    <div class="mt-7 rounded-2xl bg-emerald-50 border border-emerald-200 p-6 text-emerald-900"><strong class="block text-lg">Request received.</strong><p class="mt-2">Thank you, <?=h($name)?>. We received your preferred schedule and will contact you to confirm the appointment.</p><a href="index.php" class="mt-5 inline-flex font-bold text-emerald-700">Return home →</a></div>
   <?php elseif($error): ?>
    <div class="mt-7 rounded-2xl bg-red-50 border border-red-200 p-4 text-red-700"><?=h($error)?></div>
   <?php endif; ?>
   <form method="POST" class="mt-7 space-y-5">
    <div class="grid sm:grid-cols-2 gap-5">
     <div><label class="text-sm font-semibold">Your name</label><input name="name" value="<?=h($_POST['name']??'')?>" required class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"></div>
     <div><label class="text-sm font-semibold">Email address</label><input name="email" type="email" value="<?=h($_POST['email']??'')?>" required class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"></div>
    </div>
    <div class="grid sm:grid-cols-2 gap-5">
     <div><label class="text-sm font-semibold">Phone number</label><input name="phone" type="tel" value="<?=h($_POST['phone']??'')?>" required class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"></div>
     <div><label class="text-sm font-semibold">What would you like to schedule?</label><select name="meeting_type" class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"><option>Tour / Care Consultation</option><option>Care Consultation</option><option>Home Tour</option><option>Respite Care Discussion</option></select></div>
    </div>
    <div class="grid sm:grid-cols-2 gap-5">
     <div><label class="text-sm font-semibold">Preferred date</label><input name="tour_date" type="date" min="<?=date('Y-m-d')?>" value="<?=h($_POST['tour_date']??'')?>" required class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"></div>
     <div><label class="text-sm font-semibold">Preferred time</label><input name="tour_time" type="time" value="<?=h($_POST['tour_time']??'')?>" required class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"></div>
    </div>
    <div><label class="text-sm font-semibold">Tell us a little about your needs <span class="text-slate-400 font-normal">(optional)</span></label><textarea name="message" rows="5" class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"><?=h($_POST['message']??'')?></textarea></div>
    <button class="w-full rounded-full bg-emerald-700 px-7 py-4 text-white font-bold hover:bg-emerald-800 hover:-translate-y-0.5 transition shadow-lg shadow-emerald-700/20">Submit Schedule Request →</button>
   </form>
  </div>
 </div>
</section>
<?php require __DIR__.'/footer.php'; ?>
