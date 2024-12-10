<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>
        Our Wedding Gallery
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <style>
        .photo-gallery .photos {
            padding-bottom: 20px;
        }

        .photo-gallery .item {
            padding-bottom: 30px;
        }
    </style>
    <style>
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            /* Background color for the preloader */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensures it's above other elements */
        }

        #preloader img {
            width: 100px;
            /* Adjust size of the loading GIF or image */
        }

        /* Optionally, you can add transition for a smoother appearance */
        #page_wrapper {
            visibility: hidden;
        }

        html,
        body {
            margin: 0;
            height: 100%;
        }
    </style>
</head>

<body class="{{ $class ?? '' }}">

    @guest
    @include('layouts.navbars.guest.navbar', ['title' => 'Profile'])
    @yield('content')
    @endguest


    <!-- @auth
    <main class="main-content border-radius-lg">
        @yield('content')
    </main>
    @endauth -->

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <!-- <script src="assets/js/core/bootstrap.min.js"></script> -->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    @stack('js');


    <script>
        window.addEventListener('load', function() {
            // JavaScript to hide the preloader and show the page content after assets are loaded
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('page_wrapper').style.visibility = 'visible';

        });
    </script>
</body>

</html>