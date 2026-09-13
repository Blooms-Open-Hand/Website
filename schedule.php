<?php
require_once __DIR__.'/site.php';

$pageTitle='Schedule a Tour';
$pageDescription='Request a tour or care meeting with Blooms Open Hand Adult Family Home.';

$sent=false;
$error='';

if($_SERVER['REQUEST_METHOD']==='POST'){

    $name=trim($_POST['name']??'');
    $email=trim($_POST['email']??'');
    $phoneNumber=trim($_POST['phone']??'');
    $date=trim($_POST['tour_date']??'');
    $time=trim($_POST['tour_time']??'');
    $meetingType=trim($_POST['meeting_type']??'Tour / Care Consultation');
    $message=trim($_POST['message']??'');

    /*
     * Validate required fields
     */
    if(
        !$name ||
        !filter_var($email,FILTER_VALIDATE_EMAIL) ||
        !$phoneNumber ||
        !$date ||
        !$time
    ){

        $error='Please complete your name, email, phone, preferred date, and preferred time.';

    }

    /*
     * Make sure the selected date/time is in the future
     */
    elseif(strtotime($date.' '.$time)<=time()){

        $error='Please select a future date and time.';

    }

    else{

        try{

            $title='Client Request - '.$meetingType.' - '.$name;

            $location=$address;

            $description=
                "Client: {$name}\n".
                "Email: {$email}\n".
                "Phone: {$phoneNumber}\n".
                "Meeting type: {$meetingType}\n".
                "Preferred date: {$date}\n".
                "Preferred time: {$time}\n".
                "Message: {$message}";

            $instructions=
                'New client request. Please review and contact the client to confirm the appointment.';

            $stmt=$pdo->prepare("
                INSERT INTO tours
                (
                    title,
                    tour_date,
                    tour_time,
                    location,
                    description,
                    instructions,
                    status
                )
                VALUES(?,?,?,?,?,?,?)
            ");

            $stmt->execute([
                $title,
                $date,
                $time,
                $location,
                $description,
                $instructions,
                'upcoming'
            ]);

            /*
             * Submission was successful
             */
            $sent=true;

        }catch(Throwable $e){

            $error='We could not submit your request right now. Please call or email us directly.';

        }

    }
}

require __DIR__.'/header.php';
?>


<!-- =========================================================
     SUCCESS POPUP
========================================================= -->

<?php if($sent): ?>

<div
    id="successModal"
    class="fixed inset-0 z-[9999] flex items-center justify-center p-5"
    aria-modal="true"
    role="dialog"
>

    <!-- Background overlay -->
    <div
        id="successOverlay"
        class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"
    ></div>


    <!-- Modal -->
    <div
        id="successBox"
        class="relative w-full max-w-md rounded-[2rem] bg-white p-8 md:p-10 text-center shadow-2xl"
    >

        <!-- Close button -->
        <button
            type="button"
            id="closeSuccessModal"
            class="absolute right-5 top-5 flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 transition"
            aria-label="Close"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        </button>


        <!-- Success icon -->
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100">

            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-emerald-600 text-white">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>

        </div>


        <!-- Title -->
        <h2 class="mt-6 text-2xl md:text-3xl font-black text-slate-900">
            Request Submitted!
        </h2>


        <!-- Message -->
        <p class="mt-4 text-slate-600 leading-7">
            Thank you, <?=h($name)?>. Your tour or care consultation request has been received successfully.
        </p>

        <p class="mt-2 text-sm text-slate-500">
            Our team will review your request and contact you to confirm the appointment.
        </p>


        <!-- Close button -->
        <button
            type="button"
            id="successDoneButton"
            class="mt-7 w-full rounded-full bg-emerald-700 px-7 py-4 text-white font-bold hover:bg-emerald-800 hover:-translate-y-0.5 transition shadow-lg shadow-emerald-700/20"
        >
            Done
        </button>

    </div>

</div>

<?php endif; ?>


<!-- =========================================================
     HERO
========================================================= -->

<section class="relative overflow-hidden bg-[#063b2e] text-white">

    <div class="absolute -right-40 -top-40 h-96 w-96 rounded-full border border-white/10"></div>

    <div class="absolute left-1/3 bottom-0 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-5 py-24 lg:py-28">

        <span class="text-emerald-300 text-xs font-bold uppercase tracking-[.2em]">
            Plan a visit
        </span>

        <h1 class="mt-5 max-w-4xl text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-[.98]">
            Let’s find a time that works for your family.
        </h1>

        <p class="mt-7 max-w-2xl text-lg md:text-xl text-emerald-50/90 leading-8">
            Request a tour or care consultation and our team will review your preferred time and follow up to confirm the appointment.
        </p>

    </div>

</section>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<section class="py-16 lg:py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-5 grid lg:grid-cols-5 gap-10 items-start">


        <!-- =================================================
             LEFT INFORMATION
        ================================================== -->

        <div class="lg:col-span-2 lg:sticky lg:top-28">

            <span class="text-emerald-700 text-xs font-bold uppercase tracking-[.2em]">
                A simple next step
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-black tracking-tight">
                Come experience the home.
            </h2>

            <p class="mt-5 text-slate-600 leading-8">
                A visit gives families an opportunity to see our residential setting, ask questions, discuss care needs, and learn whether Blooms Open Hand is the right fit.
            </p>


            <div class="mt-8 space-y-3">

                <div class="rounded-2xl bg-white border p-5">

                    <strong class="block">
                        24-hour resident care
                    </strong>

                    <span class="text-sm text-slate-500">
                        Staffed and operating around the clock.
                    </span>

                </div>


                <div class="rounded-2xl bg-white border p-5">

                    <strong class="block">
                        6 licensed beds
                    </strong>

                    <span class="text-sm text-slate-500">
                        A small, familiar home environment.
                    </span>

                </div>


                <div class="rounded-2xl bg-white border p-5">

                    <strong class="block">
                        Owner-led communication
                    </strong>

                    <span class="text-sm text-slate-500">
                        Direct and responsive family support.
                    </span>

                </div>

            </div>

        </div>


        <!-- =================================================
             FORM CARD
        ================================================== -->

        <div class="lg:col-span-3 rounded-[2rem] bg-white border border-slate-200 shadow-xl shadow-slate-200/50 p-7 md:p-10">


            <!-- FORM HEADER -->

            <div class="flex items-center gap-4">

                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl">
                    ♥
                </div>

                <div>

                    <h2 class="text-2xl font-black">
                        Request a tour or meeting
                    </h2>

                    <p class="text-sm text-slate-500">
                        Your request will be sent to our scheduling database for review.
                    </p>

                </div>

            </div>


            <!-- =================================================
                 FALLBACK SUCCESS MESSAGE
            ================================================== -->

            <?php if($sent): ?>

                <div class="mt-7 rounded-2xl bg-emerald-50 border border-emerald-200 p-6 text-emerald-900">

                    <strong class="block text-lg">
                        Request received.
                    </strong>

                    <p class="mt-2">
                        Thank you, <?=h($name)?>. We received your preferred schedule and will contact you to confirm the appointment.
                    </p>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 ERROR MESSAGE
            ================================================== -->

            <?php if($error): ?>

                <div
                    class="mt-7 rounded-2xl bg-red-50 border border-red-200 p-4 text-red-700"
                    role="alert"
                >
                    <?=h($error)?>
                </div>

            <?php endif; ?>


            <!-- =================================================
                 FORM
            ================================================== -->

            <form
                method="POST"
                id="scheduleForm"
                class="mt-7 space-y-5"
                novalidate
            >


                <!-- NAME + EMAIL -->

                <div class="grid sm:grid-cols-2 gap-5">

                    <div>

                        <label
                            for="name"
                            class="text-sm font-semibold"
                        >
                            Your name
                        </label>

                        <input
                            id="name"
                            name="name"
                            value="<?= $sent ? '' : h($_POST['name']??'') ?>"
                            required
                            autocomplete="name"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    <div>

                        <label
                            for="email"
                            class="text-sm font-semibold"
                        >
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="<?= $sent ? '' : h($_POST['email']??'') ?>"
                            required
                            autocomplete="email"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>

                </div>


                <!-- PHONE + MEETING TYPE -->

                <div class="grid sm:grid-cols-2 gap-5">

                    <div>

                        <label
                            for="phone"
                            class="text-sm font-semibold"
                        >
                            Phone number
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            value="<?= $sent ? '' : h($_POST['phone']??'') ?>"
                            required
                            autocomplete="tel"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    <div>

                        <label
                            for="meeting_type"
                            class="text-sm font-semibold"
                        >
                            What would you like to schedule?
                        </label>

                        <select
                            id="meeting_type"
                            name="meeting_type"
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                            <option value="Tour / Care Consultation">
                                Tour / Care Consultation
                            </option>

                            <option value="Care Consultation">
                                Care Consultation
                            </option>

                            <option value="Home Tour">
                                Home Tour
                            </option>

                            <option value="Respite Care Discussion">
                                Respite Care Discussion
                            </option>

                        </select>

                    </div>

                </div>


                <!-- DATE + TIME -->

                <div class="grid sm:grid-cols-2 gap-5">


                    <!-- DATE -->

                    <div>

                        <label
                            for="tour_date"
                            class="text-sm font-semibold"
                        >
                            Preferred date
                        </label>

                        <input
                            id="tour_date"
                            name="tour_date"
                            type="date"
                            min="<?=date('Y-m-d')?>"
                            value="<?= $sent ? '' : h($_POST['tour_date']??'') ?>"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                        <p
                            id="dateError"
                            class="hidden mt-2 text-sm text-red-600"
                        >
                            Please select today or a future date.
                        </p>

                    </div>


                    <!-- TIME -->

                    <div>

                        <label
                            for="tour_time"
                            class="text-sm font-semibold"
                        >
                            Preferred time
                        </label>

                        <input
                            id="tour_time"
                            name="tour_time"
                            type="time"
                            value="<?= $sent ? '' : h($_POST['tour_time']??'') ?>"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                        >

                        <p
                            id="timeError"
                            class="hidden mt-2 text-sm text-red-600"
                        >
                            Please select a future date and time.
                        </p>

                    </div>

                </div>


                <!-- MESSAGE -->

                <div>

                    <label
                        for="message"
                        class="text-sm font-semibold"
                    >
                        Tell us a little about your needs

                        <span class="text-slate-400 font-normal">
                            (optional)
                        </span>

                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                    ><?= $sent ? '' : h($_POST['message']??'') ?></textarea>

                </div>


                <!-- SUBMIT BUTTON -->

                <button
                    type="submit"
                    id="submitButton"
                    class="w-full rounded-full bg-emerald-700 px-7 py-4 text-white font-bold hover:bg-emerald-800 hover:-translate-y-0.5 transition shadow-lg shadow-emerald-700/20"
                >
                    Submit Schedule Request →
                </button>

            </form>

        </div>

    </div>

</section>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function(){

    const form=document.getElementById('scheduleForm');

    const dateInput=document.getElementById('tour_date');

    const timeInput=document.getElementById('tour_time');

    const dateError=document.getElementById('dateError');

    const timeError=document.getElementById('timeError');


    /*
     * ========================================================
     * SUCCESS MODAL
     * ========================================================
     */

    const successModal=document.getElementById('successModal');

    const closeSuccessModal=document.getElementById('closeSuccessModal');

    const successDoneButton=document.getElementById('successDoneButton');

    const successOverlay=document.getElementById('successOverlay');


    /*
     * Close success popup
     */

    function closeModal(){

        if(successModal){

            successModal.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        }

    }


    if(successModal){

        /*
         * Prevent background scrolling
         */

        document.body.classList.add('overflow-hidden');


        /*
         * Close with X
         */

        if(closeSuccessModal){

            closeSuccessModal.addEventListener(
                'click',
                closeModal
            );

        }


        /*
         * Close with Done
         */

        if(successDoneButton){

            successDoneButton.addEventListener(
                'click',
                closeModal
            );

        }


        /*
         * Close when clicking the dark background
         */

        if(successOverlay){

            successOverlay.addEventListener(
                'click',
                closeModal
            );

        }


        /*
         * Close with Escape key
         */

        document.addEventListener(
            'keydown',
            function(event){

                if(event.key==='Escape'){

                    closeModal();

                }

            }
        );

    }


    /*
     * ========================================================
     * DATE/TIME VALIDATION
     * ========================================================
     */


    /*
     * Get today's date in local browser time.
     *
     * Returns:
     * YYYY-MM-DD
     */

    function getToday(){

        const now=new Date();

        const year=now.getFullYear();

        const month=String(
            now.getMonth()+1
        ).padStart(2,'0');

        const day=String(
            now.getDate()
        ).padStart(2,'0');

        return `${year}-${month}-${day}`;

    }


    /*
     * Update minimum allowed date/time
     */

    function updateMinimumDateTime(){

        const today=getToday();


        /*
         * Prevent past dates.
         */

        dateInput.min=today;


        /*
         * If today is selected,
         * prevent past times.
         */

        if(dateInput.value===today){

            const now=new Date();

            const hours=String(
                now.getHours()
            ).padStart(2,'0');

            const minutes=String(
                now.getMinutes()
            ).padStart(2,'0');

            timeInput.min=`${hours}:${minutes}`;

        }else{

            /*
             * For future dates,
             * allow any time.
             */

            timeInput.removeAttribute('min');

        }

    }


    /*
     * Validate date and time.
     */

    function validateDateTime(showErrors=true){

        const selectedDate=dateInput.value;

        const selectedTime=timeInput.value;


        /*
         * Clear previous errors.
         */

        dateError.classList.add('hidden');

        timeError.classList.add('hidden');


        dateInput.classList.remove(
            'border-red-500'
        );

        timeInput.classList.remove(
            'border-red-500'
        );


        /*
         * Let required fields handle empty values.
         */

        if(!selectedDate || !selectedTime){

            return true;

        }


        const today=getToday();


        /*
         * Check past date.
         */

        if(selectedDate<today){

            if(showErrors){

                dateError.textContent=
                    'Please select today or a future date.';

                dateError.classList.remove(
                    'hidden'
                );

                dateInput.classList.add(
                    'border-red-500'
                );

            }

            return false;

        }


        /*
         * Build selected date/time.
         */

        const selectedDateTime=new Date(
            `${selectedDate}T${selectedTime}`
        );


        /*
         * Current date/time.
         */

        const now=new Date();


        /*
         * Check if date/time is in the past.
         */

        if(selectedDateTime<=now){

            if(showErrors){

                timeError.textContent=
                    'Please select a future date and time.';

                timeError.classList.remove(
                    'hidden'
                );

                timeInput.classList.add(
                    'border-red-500'
                );

            }

            return false;

        }


        return true;

    }


    /*
     * ========================================================
     * DATE CHANGE
     * ========================================================
     */

    dateInput.addEventListener(
        'change',
        function(){

            updateMinimumDateTime();

            validateDateTime(true);

        }
    );


    /*
     * ========================================================
     * TIME CHANGE
     * ========================================================
     */

    timeInput.addEventListener(
        'change',
        function(){

            validateDateTime(true);

        }
    );


    /*
     * ========================================================
     * DATE INPUT
     * ========================================================
     */

    dateInput.addEventListener(
        'input',
        function(){

            updateMinimumDateTime();

            validateDateTime(false);

        }
    );


    /*
     * ========================================================
     * TIME INPUT
     * ========================================================
     */

    timeInput.addEventListener(
        'input',
        function(){

            validateDateTime(false);

        }
    );


    /*
     * ========================================================
     * FORM SUBMISSION
     * ========================================================
     */

    form.addEventListener(
        'submit',
        function(event){

            /*
             * Update current minimum time.
             */

            updateMinimumDateTime();


            /*
             * Validate date/time.
             */

            const valid=validateDateTime(true);


            /*
             * Stop submission if date/time
             * is in the past.
             */

            if(!valid){

                event.preventDefault();

                const errorField=
                    document.querySelector(
                        '.border-red-500'
                    );


                if(errorField){

                    errorField.scrollIntoView({
                        behavior:'smooth',
                        block:'center'
                    });

                    errorField.focus();

                }

                return false;

            }

        }
    );


    /*
     * ========================================================
     * INITIALIZE DATE/TIME
     * ========================================================
     */

    updateMinimumDateTime();


    /*
     * Re-check every 30 seconds.
     *
     * This is useful when the page stays open
     * for a long time.
     */

    setInterval(
        function(){

            updateMinimumDateTime();

            if(
                dateInput.value &&
                timeInput.value
            ){

                validateDateTime(false);

            }

        },
        30000
    );

});

</script>


<?php require __DIR__.'/footer.php'; ?>