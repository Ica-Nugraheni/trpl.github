
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - PhotoFolio Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1 class="sitename">Ica Nugraheni</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="?p=mhs" class="active">Mahasiswa<br></a></li>
          <li><a href="?p=prodi">Prodi</a></li>
          <li><a href="?p=dosen"><span>Dosen</span></a>
          </li>
          <li><a href="?p=kategori">Kategori</a></li>
          <li><a href="?p=berita">Berita</a></li>
          <li><a href="?p=tambah_user">Tambah User</a></li>
          <li><a href="?p=mata_kuliah">Mata Kuliah</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2><span>Teknologi Informasi</span><span class="underlight">Jurusan Teknologi Rekayasa Perangkat Lunak</span> Angkatan 2023<span></span></h2>
            <p style="text-align: justify;">Teknologi Informasi merupakan salah satu jurusan yanga ada di Politeknik Negeri Padang,jurusan Teknologi informasi sudah ada sejak awal tahun 2000, namun terkendala karena beberapa pertimbangan antara lain ketersediaan Sumber Daya Manusia dan Infra Struktur .Pada Awal bulan Febuari 2005, beberapa orang dosen yang antara lain terdiri dari
              Erwadi Bakar , Surfayondri , Andrizal , H A Mooduto , Yulindon, Ahmad Dahlan, Ronal Hadi dan Rahmat Hidayat, 
              atas dukungan yang kuat dari pimpinan Politeknik Suhendrik Hanwar dan pimpinan lainnya membuat proposal pendirian program studi yang berkaitan dengan Teknologi Informasi.</p>
            <a href="login.php" class="btn-get-started">Log In<br></a>
          </div>
        </div>
      </div>

   
  </main>
  <?php
                $page = isset($_GET['p']) ? $_GET['p'] : 'home';
                if ($page == 'home')
                    include 'home.php';
                if ($page == 'mhs')
                    include 'mahasiswa.php';
                if ($page == 'prodi')
                    include 'prodi.php';
                if ($page == 'dosen')
                    include 'dosen.php';
                if ($page == 'kategori')
                    include 'kategori.php';
                if ($page == 'berita')
                    include 'berita.php';
                if ($page == 'tambah_user')
                    include 'tambah_user.php';
                if ($page == 'mata_kuliah')
                    include 'mata_kuliah.php';

                ?>

                

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Ica Nugraheni</strong> <span>2311081020</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

    

  </footer>

  

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>2