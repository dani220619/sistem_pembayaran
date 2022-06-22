<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMAN 1 Solomerto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gowala is a Creative Dairy Farm & Eco Product HTML5 Template">
    <meta name="keywords" content="Gowala, HTML5, Dairy Farm & Eco Product, Template">
    <meta name="author" content="CodexCoder">

    <link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400,500,700,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('assets/assets/images/logo/logo.PNG')  ?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/flaticon/flaticon.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/swiper.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/slick-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets1/css/style.css') ?>">
</head>

<body>
    <div class="search-area">
        <div class="search-input">
            <div class="search-close">
                <span></span>
                <span></span>
            </div>
            <form>
                <input type="text" name="text" placeholder="*Search Here">
            </form>
        </div>
    </div>


    <!-- mobile-nav section start here -->
    <div class="mobile-menu">
        <nav class="mobile-header primary-menu d-lg-none">
            <div class="header-logo">
                <a href="index.html" class="logo"><img src="<?= base_url('assets/assets/images/logo/logo.png')  ?>" alt="logo"></a>
            </div>
            <div class="header-bar" id="open-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <nav class="menu">
            <div class="mobile-menu-area d-lg-none">
                <div class="mobile-menu-area-inner" id="scrollbar">
                    <ul class="m-menu">
                        <li><a class="active" href="#banner">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                    </ul>
                    <ul class="social-link-list d-flex flex-wrap">
                        <li><a href="#" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- mobile-nav section ending here -->



    <!-- header section start here -->
    <header class="header-section style-2 d-none d-lg-block">
        <div class="header-top">
            <div class="container">
                <div class="htop-area row">
                    <div class="htop-left">
                        <ul class="htop-information">
                            <li><i class="far fa-envelope"></i> smasolomerto@gmail.com</li>
                            <li><i class="fas fa-phone-volume"></i> +6282136247355</li>
                        </ul>
                    </div>
                    <div class="htop-right">
                        <ul>
                            <li><a href="https://www.youtube.com/channel/UClINbgPY46MHlnhZ6jxKWDg"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="https://www.instagram.com/sman1selomerto/"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <nav class="primary-menu">
                        <div class="menu-area">
                            <div class="row justify-content-between align-items-center">
                                <a href="index.html" class="logo">
                                    <img src="<?= base_url('assets/assets/images/logo/logo.png')  ?>" width="80" height="80" alt="logo">
                                </a>
                                <div class="main-menu-area d-flex align-items-center">
                                    <ul class="main-menu d-flex align-items-center">
                                        <li><a class="active" href="#banner">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#gallery">Gallery</a></li>

                                    </ul>
                                    <div class="d-none d-lg-block">
                                        <ul class="search-cart">
                                            <li class="search">
                                                <a href="<?= base_url('auth') ?>" class="btn btn-primary" style="background-color: aqua;">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->
    <!-- banner section start here -->
    <section class="slider-section banner style-1 style-2" id="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/assets1/images/banner/banner20.jpg')  ?>" style="width: 100%;" alt="Slider One Image">
                    <div class="container">
                        <div class="slider-content">
                            <div class="slider-content-inner">
                                <h1 style="color: black;">SELAMAT DATANG</h1>
                                <h2 class="delay1" style="color: white;">Fresh & Healthy Milk For Your Family</h2>
                                <p class="delay3 d-block" style="color: white;">Dynamically supply web-enabled portals for high standards income and business Completely productivate optimal sources rather than strategic.</p>
                                <a href="<?= base_url('auth/registration') ?>" class="btn delay4">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ending here -->

    <!-- about section start here -->
    <section id="about" class="about style-2 padding-tb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-left">
                        <div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                            <h2><span>Welcome to Our Gowala Dairy Farm</span></h2>
                            <p>Continually productize compelling quality for packed with Elated
                                productize compelling quality for packed with all Elated Them
                                Setting up to website and creating pages.</p>
                        </div>
                        <div class="section-wrapper">
                            <ul class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <li><i class="far fa-check-square"></i>We are providing different services</li>
                                <li><i class="far fa-check-square"></i>We are one of leading company</li>
                                <li><i class="far fa-check-square"></i>Profitability is the primary goal of all business</li>
                                <li><i class="far fa-check-square"></i>Learn how to grow your Business</li>
                                <li><i class="far fa-check-square"></i>Professional solutions for your business</li>
                            </ul>
                            <a href="#" class="btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="video-post text-center">
                            <div class="video-thumb">
                                <img src="<?= base_url('assets/assets1/images/about/01.jpg')  ?>" alt="about-us">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section ending here -->

    <!-- portfolio section start here -->
    <section id="gallery" class="portfolio padding-tb bg-image-1">
        <div class="container">
            <div class="section-wrapper row justify-content-center">
                <div class="col-lg-6 p-md-0 left">
                    <div class="section-header">
                        <div class="title wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                            <h2>Our Gallery</h2>
                            <h2><span>Visit Our MilkSheke Farm </span></h2>
                            <p>Continually productize compelling quality for packed with Elated
                                Themes Setting up to website and it crating pages .</p>
                        </div>
                    </div>
                    <div class="portfolio-wrapper">
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/01.jpg') ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/01.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/02.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/02.jpg') ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/03.jpg ') ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/03.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-md-0">
                    <div class="portfolio-wrapper">
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/04.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/04.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/05.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/05.jpg') ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/06.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/06.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/07.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/07.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">View Gallery</a>
            </div>
        </div>
    </section>
    <!-- portfolio section ending here -->


    <!-- video post start here -->
    <div class="youtube-video padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="video-post text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="video-thumb">
                        <iframe width="900" height="500" src="https://www.youtube.com/embed/Wm-IMEf0c84" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video post start here -->

    <!-- contact us section start here -->
    <div id="contact" class="contact padding-tb">
        <div class="container">
            <div class="section-wrapper row">
                <div class="col-lg-8 col-12">
                    <div class="contact-part">
                        <div class="contact-title">
                            <h4>Send Message us</h4>
                        </div>
                        <div class="contact-form d-flex flex-wrap justify-content-between">
                            <input type="text" name="name" placeholder="Your Name">
                            <input type="email" name="email" placeholder="Your Email">
                            <input type="tel" name="tel" placeholder="Phone">
                            <input type="text" placeholder="Subject">
                            <textarea rows="7" placeholder="Enter Your Message"></textarea>
                            <div class="gdprs">
                                <label><input type="checkbox" checked="checked" name="sameadr">i’m not a robot </label>
                                <img src="<?= base_url('assets/assets1/images/contact/icon/01.png')  ?>" alt="contact">
                            </div>
                            <input class="btn" type="submit" value="Submit Now">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <h3>Quick Contact</h3>
                        <p>Continually productize compelling quality dome
                            packed with all Elated Themes ently utilize
                            website and creating pages corporate </p>
                        <ul class="contact-location">
                            <li>
                                <div class="icon-part">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <div class="content-part">
                                    <p>+88130-589-745-6987</p>
                                    <p>+1655-456-523</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="content-part">
                                    <p>Mon - Fri 09:00 - 18:00</p>
                                    <p>(except public holidays)</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content-part">
                                    <p>25/2 Lane2 Vokte Street Building <br>Melborn City</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact us section ending here -->

    <!-- footer section start here -->
    <footer>
        <div class="footer-bottom wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
            <div class="container">
                <div class="section-wrapper">
                    <p class="text-center">&copy; 2021 <a href="<?= base_url('beranda') ?>">SMAN 1 Selomerto</a>.All Rights Reserved By <a href="#">Annisa Rahmawati</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section start here -->



    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="flaticon-chevron-up"></i></a>
    <!-- scrollToTop ending here -->


    <script src="<?= base_url('assets/assets1/js/jquery.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/fontawesome.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets1/js/jquery.counterup.min.js') ?>"></script>
    <script src='<?= base_url('assets/assets1/js/jquery.easing.js') ?>'></script>
    <script src='<?= base_url('assets/assets1/js/slick.min.js') ?>'></script>
    <script src="<?= base_url('assets/assets1/js/lightcase.js') ?>"></script>
    <script src="<?= base_url('assets/assets1/js/circular-countdown.js') ?>"></script>
    <script src="<?= base_url('assets/assets1/js/jquery.countdown.min.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets1/js/bootstrap.min.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/isotope.pkgd.min.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/wow.min.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/theia-sticky-sidebar.js')  ?>"></script>
    <script src="<?= base_url('assets/assets1/js/swiper.min.js') ?>"></script>
    <script src="<?= base_url('assets/assets1/js/functions.js')  ?>"></script>
</body>

</html>