<html lang="en">

<head>
    <title style="color: brown">Login</title>
    <meta name="author" content="Zaur">
    <meta descryption content="Presentation of website">
    <meta name="keywords" content="technology, cyber security, software">
    <meta http-equiv="refresh" content="100">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="login13.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit"></script>
</head>
<style>
    /* ======================================================================== */

    /*                      NOT RELATED TO THE TTUTORIAL                        */

    /* ======================================================================== */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none;
        list-style: none;
    }


    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none;
        list-style: none;
    }


    :root {
        --step--2: clamp(0.69rem, calc(0.58rem + 0.60vw), 1.00rem);
        --step--1: clamp(0.83rem, calc(0.67rem + 0.81vw), 1.25rem);
        --step-0: clamp(1.00rem, calc(0.78rem + 1.10vw), 1.56rem);
        --step-1: clamp(1.20rem, calc(0.91rem + 1.47vw), 1.95rem);
        --step-2: clamp(1.44rem, calc(1.05rem + 1.95vw), 2.44rem);
        --step-3: clamp(1.73rem, calc(1.21rem + 2.58vw), 3.05rem);
        --step-4: clamp(2.07rem, calc(1.39rem + 3.40vw), 3.82rem);
        --step-5: clamp(2.49rem, calc(1.60rem + 4.45vw), 4.77rem);

        /* Font style */

        --ff-primary: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;

        /* Color style */

        --color-primary: #0575E6;
        --color-secondary: #6dd5ed;
        --color-primary-light: #8dc6ff;
        --color-primary-dark: #021B79;
        --color-error: #cc3333;
        --color-success: #4bb544;
        --color-link: #606470;
        --color-text: #5f6769;
        --color-header-dark: #393e46;
        --color-background: #f5f9ee;
        --color-border-sc: #ececec;
        --color-border-focus: #69c2ff;
        --color-border: #d3d6db;
        --bs: #ffa857;
        --color-button: #f8e7e7;
        --color-percentage: #5f6769;
        --color-header-light: #9ba6a5;
        --color-border-focus: #a9d7f6;
        --color-input-background: #f5f9ee;
        --gradient: linear-gradient(135deg var(--color-primary), var(--color-secondary));


    }

    /* Remove default margin */
    body,
    h1,
    h2,
    h3,
    h4,
    p,
    figure,
    blockquote,
    dl,
    dd {
        margin: 0;
    }

    /* Remove list styles on ul, ol elements with a list role, which suggests default styling will be removed */

    ul[role='list'],
    ol[role='list'] {
        list-style: none;
    }


    /* Set core root defaults */
    html:focus-within {
        scroll-behavior: smooth;
    }

    /* Set core body defaults */
    body {
        min-height: 100vh;
        text-rendering: optimizeSpeed;
        line-height: 1.5;
        font-family: var(--ff-primary);
    }

    /* A elements that don't have a class get default styles */
    a:not([class]) {
        text-decoration-skip-ink: auto;
    }

    /* Make images easier to work with */
    img,
    picture {
        max-width: 100%;
        display: block;
    }

    /* Inherit fonts for inputs and buttons */
    input,
    button,
    textarea,
    select {
        font: inherit;
    }

    /* Remove all animations, transitions and smooth scroll for people that prefer not to see them */
    @media (prefers-reduced-motion: reduce) {
        html:focus-within {
            scroll-behavior: auto;
        }

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
    }

    html,
    body {
        height: 100%;
    }



    /* ======================================================================== */

    /*                      RELATED TO THE TTUTORIAL                        */

    /* ======================================================================== */




    body {
        display: grid;
        place-items: center;
        color: #000;
        background: #D10024;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #D10024, #AA076B);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #D10024, #AA076B);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        /* background-image: url(images/Snow.svg);
 background-repeat: no-repeat;
 background-size: cover; */

        padding: 0 2rem;
        animation: rotate 6s infinite alternate linear;
    }

    @keyframes rotate {
        100% {
            background-position: 50% 90%;
        }
    }

    @media (width >=500px) {
        body {
            padding: 0;
        }
    }

    .login-form {
        position: relative;
        width: 100%;
        background: #fff;
        text-align: center;
        border-radius: 1.1rem;
        margin: 0 1.9rem;
        padding: 70px 30px 44px;
    }

    @media (width >=500px) {
        .login-form {
            width: min(100%, 400px);
            margin: 0;
        }
    }

    .login-header>h2 {
        font-size: var(--step-1);
        font-weight: 700;
        margin: 0 0 1.1rem;
    }

    .login-header>h3 {
        /*color: rgba(0, 0, 0, .38);*/
        color: rgb(0 0 0 / 38%);
        font-size: var(--step--1);
        font-weight: 500;
        margin: 0 0 30px;
    }

    form {
        display: grid;
        grid-gap: 1rem;
    }

    :is(form > input, form > button) {
        width: 100%;
        height: 8.2vh;
    }

    form>input {
        border: 2px solid #ebebeb;
        font-family: inherit;
        font-size: var(--step--2);
        border-radius: .5rem;
        padding: 0 1rem;
    }

    form>input::placeholder {
        opacity: .8;
    }



    /* -----------------The start of Validation* ----------------- */

    :is(form > input:focus, form > input:not(:placeholder-shown)) {
        background-color: var(--color-background);
        border-color: var(--color-border-focus);
    }

    form>input:focus:valid {
        box-shadow: 0 0 1px solid var(--color-success);
        border-color: var(--color-success);
    }

    form>input:valid:not(:placeholder-shown) {
        border-color: var(--color-success);
    }

    form>input:focus:invalid {
        box-shadow: 0 0 1px solid var(--color-error);
    }

    form>input:invalid:not(:placeholder-shown) {
        border-color: var(--color-error);
    }

    /* -----------------The end of Validation* ----------------- */



    form>button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        color: #f9f9f9;
        background: #216ce7;
        border-radius: .5rem;
        font-family: inherit;
        font-size: var(--step--2);
        font-weight: 500;
        border: none;
        outline: none;
        padding: 0 1.8rem;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all .2s;
    }

    form>button:hover {
        background: #2374f9;
    }

    form>a {
        color: #216ce7;
        font-size: var(--step--2);
        text-align: left;
        margin: 0 0 .6rem;
    }

    .copy {
        position: absolute;
        top: 85%;
        left: 50%;
        transform: translate(-50%, 60px);
        font-size: var(--step-0);
        font-weight: 400;
    }

    .copy p {
        color: #f9f9f9;
    }

    .copy a {
        color: #fff;
        font-size: var(--step--1);
    }
</style>

<body>
    @include('sweetalert::alert')
    <div class="login-form">
        <header class="login-header">
            <h2>Login</h2>

        </header>
        <form action="{{ route('signin_submit') }}" class="form" method="POST" id="formLogin">
            @csrf
            <input type="email" required placeholder="Email" name="email">
            <input type="password" required placeholder="Password" name="password">
            <a href="{{ route('signup') }}">Not an account? Create your account</a>

            <div class="g-recaptcha-contact" data-sitekey="6Le_kCwkAAAAACQh41Tf3qAZaOLEmwU3Jmo6ieUS"
                id="RecaptchaField2"></div>
            <input type="hidden" class="hiddenRecaptcha" name="ct_hiddenRecaptcha" required id="ct_hiddenRecaptcha">
            <button type="button" id="formButton">
                LOGIN
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script>
    console.log("ascac");
    var CaptchaCallback = function() {
        var widgetId2;
        widgetId2 = grecaptcha.render('RecaptchaField2', {
            'sitekey': '6Le_kCwkAAAAACQh41Tf3qAZaOLEmwU3Jmo6ieUS',
            'callback': correctCaptcha_contact
        });
    };

    var correctCaptcha_contact = function(response) {
        $("#ct_hiddenRecaptcha").val(response);
    };


    // $("#formLogin").validate({
    //     ignore: [],
    //     rules: {
    //         ct_hiddenRecaptcha: {
    //             required: true,
    //         },

    //     },
    // });

    $("#formButton").click(function() {

        var val = $("#ct_hiddenRecaptcha").val();
        if(val == '') {
            alert("Recaptcha is required")
        } else {
            $("#formLogin").submit();
        }
    })
</script>

</html>
