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
     * Basic validation
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
     * Make sure the selected date/time is actually in the future
     */
    elseif(strtotime($date.' '.$time) <= time()){

        $error='Please select a future date and time.';

    } 
    else {

        try {

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

            $sent=true;

        } catch(Throwable $e) {

            $error='We could not submit your request right now. Please call or email us directly.';

        }
    }
}

require __DIR__.'/header.php';
?>

<!-- HERO -->
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


<!-- MAIN CONTENT -->
<section class="py-16 lg:py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-5 grid lg:grid-cols-5 gap-10 items-start">

        <!-- LEFT INFORMATION -->
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


        <!-- FORM -->
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


            <!-- SUCCESS MESSAGE -->
            <?php if($sent): ?>

                <div class="mt-7 rounded-2xl bg-emerald-50 border border-emerald-200 p-6 text-emerald-900">

                    <strong class="block text-lg">
                        Request received.
                    </strong>

                    <p class="mt-2">
                        Thank you, <?=h($name)?>. We received your preferred schedule and will contact you to confirm the appointment.
                    </p>

                    <a
                        href="index.php"
                        class="mt-5 inline-flex font-bold text-emerald-700 hover:text-emerald-900 transition"
                    >
                        Return home →
                    </a>

                </div>

            <?php endif; ?>


            <!-- ERROR MESSAGE -->
            <?php if($error): ?>

                <div
                    class="mt-7 rounded-2xl bg-red-50 border border-red-200 p-4 text-red-700"
                    role="alert"
                >
                    <?=h($error)?>
                </div>

            <?php endif; ?>


            <!-- REQUEST FORM -->
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
                            value="<?=h($_POST['name']??'')?>"
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
                            value="<?=h($_POST['email']??'')?>"
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
                            value="<?=h($_POST['phone']??'')?>"
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
                            value="<?=h($_POST['tour_date']??'')?>"
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
                            value="<?=h($_POST['tour_time']??'')?>"
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
                    ><?=h($_POST['message']??'')?></textarea>

                </div>


                <!-- SUBMIT -->
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


<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('scheduleForm');
    const dateInput = document.getElementById('tour_date');
    const timeInput = document.getElementById('tour_time');

    const dateError = document.getElementById('dateError');
    const timeError = document.getElementById('timeError');


    /*
     * Get today's date in the user's local timezone.
     *
     * Format:
     * YYYY-MM-DD
     */
    function getToday() {

        const now = new Date();

        const year = now.getFullYear();

        const month = String(
            now.getMonth() + 1
        ).padStart(2, '0');

        const day = String(
            now.getDate()
        ).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }


    /*
     * Update the minimum allowed date and time.
     */
    function updateMinimumDateTime() {

        const today = getToday();

        /*
         * The date picker cannot select a date before today.
         */
        dateInput.min = today;


        /*
         * If today is selected,
         * the time picker cannot select a past time.
         */
        if (dateInput.value === today) {

            const now = new Date();

            const hours = String(
                now.getHours()
            ).padStart(2, '0');

            const minutes = String(
                now.getMinutes()
            ).padStart(2, '0');

            timeInput.min = `${hours}:${minutes}`;

        } else {

            /*
             * For future dates, any time is allowed.
             */
            timeInput.removeAttribute('min');

        }

    }


    /*
     * Validate the selected date and time.
     */
    function validateDateTime(showErrors = true) {

        const selectedDate = dateInput.value;
        const selectedTime = timeInput.value;

        /*
         * Clear previous errors.
         */
        dateError.classList.add('hidden');
        timeError.classList.add('hidden');

        dateInput.classList.remove(
            'border-red-500',
            'focus:border-red-500',
            'focus:ring-red-100'
        );

        timeInput.classList.remove(
            'border-red-500',
            'focus:border-red-500',
            'focus:ring-red-100'
        );


        /*
         * If either field is empty,
         * let the required validation handle it.
         */
        if (!selectedDate || !selectedTime) {
            return true;
        }


        const today = getToday();


        /*
         * Check if the selected date is before today.
         */
        if (selectedDate < today) {

            if (showErrors) {

                dateError.textContent =
                    'Please select today or a future date.';

                dateError.classList.remove('hidden');

                dateInput.classList.add(
                    'border-red-500'
                );

            }

            return false;
        }


        /*
         * Create the selected date/time.
         */
        const selectedDateTime = new Date(
            `${selectedDate}T${selectedTime}`
        );


        /*
         * Get the current date/time.
         */
        const now = new Date();


        /*
         * Make sure the appointment is in the future.
         */
        if (selectedDateTime <= now) {

            if (showErrors) {

                timeError.textContent =
                    'Please select a future date and time.';

                timeError.classList.remove('hidden');

                timeInput.classList.add(
                    'border-red-500'
                );

            }

            return false;
        }


        /*
         * Everything is valid.
         */
        return true;

    }


    /*
     * When the date changes.
     */
    dateInput.addEventListener(
        'change',
        function () {

            updateMinimumDateTime();

            validateDateTime(true);

        }
    );


    /*
     * When the time changes.
     */
    timeInput.addEventListener(
        'change',
        function () {

            validateDateTime(true);

        }
    );


    /*
     * Validate while the user is typing/changing values.
     */
    dateInput.addEventListener(
        'input',
        function () {

            updateMinimumDateTime();

            validateDateTime(false);

        }
    );


    timeInput.addEventListener(
        'input',
        function () {

            validateDateTime(false);

        }
    );


    /*
     * Final validation before submitting.
     */
    form.addEventListener(
        'submit',
        function (event) {

            /*
             * Update the minimum values first.
             */
            updateMinimumDateTime();


            /*
             * Check date/time.
             */
            const dateTimeIsValid =
                validateDateTime(true);


            /*
             * If date/time is in the past,
             * completely stop the form submission.
             */
            if (!dateTimeIsValid) {

                event.preventDefault();

                const errorField =
                    document.querySelector(
                        '.border-red-500'
                    );

                if (errorField) {

                    errorField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    errorField.focus();

                }

                return false;
            }

        }
    );


    /*
     * Initialize when page loads.
     */
    updateMinimumDateTime();


    /*
     * Re-check every 30 seconds.
     *
     * This is useful if the user keeps the page open
     * for a long time and then selects "today".
     */
    setInterval(
        function () {
            updateMinimumDateTime();

            if (
                dateInput.value &&
                timeInput.value
            ) {
                validateDateTime(false);
            }
        },
        30000
    );

});
</script>


<?php require __DIR__.'/footer.php'; ?>