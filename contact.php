<?php

/*
|--------------------------------------------------------------------------
| SEO SETTINGS
|--------------------------------------------------------------------------
*/

require_once __DIR__.'/site.php';

$pageTitle = 'Contact Blooms Open Hand Adult Family Home | Marysville, WA';

$pageDescription = 'Contact Blooms Open Hand Adult Family Home in Marysville, WA to ask questions, discuss care needs, schedule a visit, or learn more about our personalized senior care services.';

$pageCanonical = '/contact.php';

$pageOgTitle = 'Contact Blooms Open Hand Adult Family Home | Marysville, WA';

$pageOgDescription = 'Get in touch with Blooms Open Hand Adult Family Home in Marysville, Washington. Ask about care services, availability, visits, and personalized support.';

$pageOgType = 'website';


/*
|--------------------------------------------------------------------------
| CONTACT FORM
|--------------------------------------------------------------------------
*/

$sent = false;
$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = trim($_POST['name'] ?? '');
    $visitorEmail = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if(
        !$name ||
        !filter_var($visitorEmail, FILTER_VALIDATE_EMAIL) ||
        !$message
    ){

        $error = 'Please complete your name, valid email and message.';

    } else {

        $subject = 'Website Contact Form - '.$name;

        $body =
            "Name: ".$name."\n".
            "Email: ".$visitorEmail."\n\n".
            $message;

        $headers =
            "Reply-To: ".$visitorEmail."\r\n".
            "Content-Type: text/plain; charset=UTF-8";

        $sent = @mail(
            $email,
            $subject,
            $body,
            $headers
        );

        if($sent){

            $sent = true;

        } else {

            $error = 'Your message could not be sent automatically. Please call or email us directly.';

        }

    }

}


/*
|--------------------------------------------------------------------------
| CONTACT PAGE STRUCTURED DATA
|--------------------------------------------------------------------------
*/

$contactSchema = [

    '@context' => 'https://schema.org',

    '@graph' => [

        [

            '@type' => 'LocalBusiness',

            '@id' => '/#blooms-open-hand',

            'name' => 'Blooms Open Hand Adult Family Home',

            'description' =>
                'Adult family home care and personalized residential support for seniors and adults in Marysville, Washington.',

            'telephone' => $phone,

            'email' => $email,

            'address' => [

                '@type' => 'PostalAddress',

                'streetAddress' => $address,

                'addressLocality' => 'Marysville',

                'addressRegion' => 'WA',

                'addressCountry' => 'US'

            ],

            'areaServed' => [

                '@type' => 'AdministrativeArea',

                'name' => 'Snohomish County'

            ]

        ],

        [

            '@type' => 'ContactPage',

            '@id' => '/contact.php#contact-page',

            'name' =>
                'Contact Blooms Open Hand Adult Family Home',

            'description' =>
                $pageDescription,

            'about' => [

                '@id' => '/#blooms-open-hand'

            ]

        ]

    ]

];

require __DIR__.'/header.php';

?>

<script type="application/ld+json">
<?=json_encode(
    $contactSchema,
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_PRETTY_PRINT
)?>
</script>


<!-- =========================================================
     CONTACT HERO
     ========================================================= -->

<section class="bg-[#063b2e] text-white">

    <div class="max-w-7xl mx-auto px-5 py-20">

        <span class="text-emerald-300 text-xs font-bold uppercase tracking-[.18em]">
            Get in touch
        </span>

        <h1 class="mt-4 text-5xl md:text-6xl font-black">
            We would love to hear from you.
        </h1>

        <p class="mt-5 max-w-2xl text-emerald-100 text-lg leading-8">
            Ask a question, arrange a visit or simply learn more about our services.
        </p>

    </div>

</section>


<!-- =========================================================
     CONTACT CONTENT
     ========================================================= -->

<section class="py-16">

    <div class="max-w-7xl mx-auto px-5 grid lg:grid-cols-5 gap-10">

        <div class="lg:col-span-2 space-y-4">


            <!-- Phone -->

            <div class="rounded-3xl bg-emerald-50 p-7">

                <div class="text-2xl" aria-hidden="true">
                    ☎
                </div>

                <h2 class="mt-4 font-bold">
                    Phone
                </h2>

                <a
                    class="mt-2 block text-emerald-700 font-semibold"
                    href="tel:<?=h($phone)?>"
                    aria-label="Call Blooms Open Hand at <?=h($phone)?>"
                >
                    <?=h($phone)?>
                </a>

            </div>


            <!-- Email -->

            <div class="rounded-3xl bg-slate-50 p-7">

                <div class="text-2xl" aria-hidden="true">
                    ✉
                </div>

                <h2 class="mt-4 font-bold">
                    Email
                </h2>

                <a
                    class="mt-2 block text-emerald-700 font-semibold break-all"
                    href="mailto:<?=h($email)?>"
                    aria-label="Email Blooms Open Hand at <?=h($email)?>"
                >
                    <?=h($email)?>
                </a>

            </div>


            <!-- Address -->

            <div class="rounded-3xl bg-slate-50 p-7">

                <div class="text-2xl" aria-hidden="true">
                    ⌖
                </div>

                <h2 class="mt-4 font-bold">
                    Visit us
                </h2>

                <address class="mt-2 text-slate-600 not-italic">
                    <?=h($address)?>
                </address>

            </div>


        </div>


        <!-- =====================================================
             CONTACT FORM
             ===================================================== -->

        <div class="lg:col-span-3 rounded-3xl border p-7 md:p-9">

            <h2 class="text-2xl font-black">
                Send us a message
            </h2>

            <p class="mt-2 text-slate-500">
                We will get back to you as soon as possible.
            </p>


            <?php if($sent):?>

                <div
                    class="mt-6 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-800"
                    role="status"
                    aria-live="polite"
                >
                    Thank you. Your message has been sent.
                </div>

            <?php elseif($error):?>

                <div
                    class="mt-6 rounded-2xl bg-red-50 border border-red-200 p-4 text-red-700"
                    role="alert"
                    aria-live="assertive"
                >
                    <?=h($error)?>
                </div>

            <?php endif;?>


            <form
                method="POST"
                class="mt-7 space-y-5"
                aria-label="Contact Blooms Open Hand Adult Family Home"
            >

                <div class="grid sm:grid-cols-2 gap-5">


                    <!-- Name -->

                    <div>

                        <label
                            for="contact-name"
                            class="text-sm font-semibold"
                        >
                            Your name
                        </label>

                        <input
                            id="contact-name"
                            name="name"
                            type="text"
                            autocomplete="name"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"
                        >

                    </div>


                    <!-- Email -->

                    <div>

                        <label
                            for="contact-email"
                            class="text-sm font-semibold"
                        >
                            Email address
                        </label>

                        <input
                            id="contact-email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            inputmode="email"
                            required
                            class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"
                        >

                    </div>


                </div>


                <!-- Message -->

                <div>

                    <label
                        for="contact-message"
                        class="text-sm font-semibold"
                    >
                        Message
                    </label>

                    <textarea
                        id="contact-message"
                        name="message"
                        rows="7"
                        required
                        class="mt-2 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600"
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="rounded-full bg-emerald-700 px-7 py-4 text-white font-bold hover:bg-emerald-800"
                >
                    Send Message →
                </button>


            </form>

        </div>

    </div>

</section>


<!-- =========================================================
     MAP
     ========================================================= -->

<?php if($maps):?>

    <section class="pb-20">

        <div class="max-w-7xl mx-auto px-5">

            <div class="rounded-3xl overflow-hidden border bg-slate-100 h-96">

                <iframe
                    src="<?=h($maps)?>"
                    class="w-full h-full border-0"
                    title="Map showing the location of Blooms Open Hand Adult Family Home in Marysville, Washington"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>

            </div>

        </div>

    </section>

<?php endif;?>


<?php require __DIR__.'/footer.php';?>