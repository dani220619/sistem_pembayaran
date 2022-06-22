<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMAN 1 Selomerto</title>
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
                            <li><i class="far fa-envelope"></i> smaselomerto@gmail.com</li>
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
                    <img src="<?= base_url('assets/assets1/images/banner/sman.jpeg')  ?>" style="width: 100%; background-color: black;" alt="Slider One Image">
                    <div class="container">
                        <div class="slider-content">
                            <div class="slider-content-inner">
                                <h1 style="color: white;">SELAMAT DATANG</h1>
                                <h5 class="delay1" style="color: white;">SMAN 1 Selomerto sekolah dengan segudang prestasi</h5>
                                <h5 class="delay3 d-block" style="color: white;">Akademik maupun non akademik</h5>
                                <a href="<?= base_url('auth/registration') ?>" class="btn delay4 mt-3">Mulai</a>
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
                            <h2><span>SMA N 1 Selomerto</span></h2>
                            <p>SMA N 1 Selomerto merupakan salah satu instansi pendidikan dikota Wonosobo Jawa Tengah. Tepatnya berada di jl. balekambang km 4 selomerto
                                balekambang, kecamatan selomerto. SMAN 1 Selomerto sudah ada sejak 31 Desember tahun 2011 yang mana sekolah ini termasuk sekolah baru.
                                Sekolah ini selalu meningkatkan kualitas pelayanan pendidikan dari waktu ke waktu.
                            </p>
                            <p>Sekolah ini menyediakan berbagai fasilitas penunjang pendidikan bagi siswa siswi disana seperti ekstrakurikuler (ekskul), organisasi siswa, komunitas belajar, tim olahraga, dan perpustakaan. Pembelajaran di SMA N 1 Selomerto dilakukan selama 5 hari penuh yaitu dari hari senin sampai hari jumat untuk hari sabtu dan minggu siswa di SMA N 1 Selomerto libur.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="video-post text-center">
                            <div class="video-thumb">
                                <img src="<?= base_url('assets/assets1/images/portfolio/i.jpg') ?>" alt="about-us">
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
                            <h2>Galeri Kami</h2>
                            <h2><span>SMA N 1 Selomerto</span></h2>
                        </div>
                    </div>
                    <div class="portfolio-wrapper">
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/a.jpg') ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/a.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/b.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/b.jpg') ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/c.jpg ') ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/c.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-md-0">
                    <div class="portfolio-wrapper">
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/e.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/e.jpg') ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/f.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/f.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/g.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/g.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                        <div class="post-thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                            <div class="post-thumb-inner">
                                <a class="gallery-icon" href="<?= base_url('assets/assets1/images/portfolio/h.jpg')  ?>" data-rel="lightcase">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="<?= base_url('assets/assets1/images/portfolio/g.jpg')  ?>" alt="portfolio">
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- footer section start here -->
    <footer>
        <div class="footer-bottom wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
            <div class="container">
                <div class="section-wrapper">
                    <p class="text-center">&copy; 2021 <a href="<?= base_url('beranda') ?>">SMA N 1 Selomerto</a>.All Rights Reserved By <a href="https://www.instagram.com/anisa_rahma007/">Annisa Rahmawati</a></p>
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