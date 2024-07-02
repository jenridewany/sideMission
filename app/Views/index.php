<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVN PROJECT</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Arial&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">AVN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about">ABOUT</a>
                </li>
                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROJECTS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="couple-session">COUPLE SESSION</a>
                        <a class="dropdown-item" href="private-session">PRIVATE SESSION</a>
                        <a class="dropdown-item" href="brand">BRAND</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="career">CAREER</a>
                </li>
                <li class="nav-item">
                  <a href="sign-up" class="btn btn-light">SIGN UP</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>


  <!-- Hero Section -->
  <section class="hero">
    <div class="video-container">
      <video autoplay loop muted>
        <source src="<?= base_url('assets/video.mp4'); ?>" type="video/mp4">
      </video>
    </div>
    <div class="hero-content">
      <h1>"WE DON'T JUST CAPTURE THE MOMENT,</h1>
      <h1>WE CAPTURE THE FEELING"</h1>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000" data-wrap="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= base_url('assets/carousel1.png'); ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?= base_url('assets/carousel2.png'); ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="<?= base_url('assets/carousel3.png'); ?>" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="quote text-center">
              <p class="quote-text">"IN LOVE'S EMBRACE, TWO HEARTS INTERTWINE, CREATING ONE BEAUTIFUL JOURNEY."</p>
              <p class="quote-author">-</p>
            </div>
          </div>
      </div>
    </div>
  </section>
  

  <!-- Copywriting Section -->
  <section class="copywriting">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
          <h3>"LET US GUIDE YOU ON A JOURNEY AROUND THE WORLD"</h3>
          <hr>
          <p>WHERE DO YOU WANT TO GO ?</p>
        </div>
      </div>
    </div>
  </section>

  <!-- gallery -->
  <section class="gallery">
    <div class="image-container">
      <div class="image-wrapper">
        <img src="assets/priv-ses-jj.JPEG" alt="Image 1">
        <div class="description">
          <h3>PRIVATE SESSION OF JEJE</h3>
          <P>TUGU, JOGJA</P>
        </div>
      </div>
      <div class="image-wrapper">
        <img src="assets/couple-ses.jpg" alt="Image 2">
        <div class="description">
          <h3>COUPLE SESSION OF SADIE & JOE</h3>
          <P>SAND DUNES, CALIFORNIA</P></div>
      </div>
    </div>
  </section>

  <section class="img-gallery">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12">
          <div class="column-content">
            <img src="assets/gallery1.png" alt="Image 1">
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="column-content">
            <div class="copy">
              <h2>LET'S CONNECT!</h2>
            <p>WE ARE COMMITTED TO DELIVERING PROFESSIONAL-GRADE WORK, ENSURING THE HIGHEST QUALITY WITHIN YOUR EXPECTED PRICE RANGE. REST ASSURED, YOUR PROJECT WILL BE OUR TOP PRIORITY. WE EAGERLY ANTICIPATE HEARING FROM YOU SOON AND LOOK FORWARD TO FORGING A MUTUALLY BENEFICIAL PARTNERSHIP! <br><br>REACH OUT TO US! INTERESTED IN GETTING IN TOUCH? WE'RE ALL EARS! HERE'S HOW YOU CAN REACH US</p>
            <a href="contact" class="btn btn-light">GET IN TOUCH</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="column-content">
            <img src="assets/gallery2.png" alt="Image 2">
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <!-- shortcut -->
  <div class="shortcut">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h4>JL. LAKSDA ADISUCIPTO NO.80, AMBARUKMO, CATURTUNGGAL, KEC. DEPOK, KABUPATEN SLEMAN, DAERAH ISTIMEWA YOGYAKARTA 55281</h4>
        </div>
        <div class="col-md-3">
          <ul>
            <li><a href="private-session">PRIVATE SESSION</a></li>
            <li><a href="couple-session">COUPLE PHOTO SESSION</a></li>
            <li><a href="brand">BRAND</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul>
            <li><a href="#">JOGJA</a></li>
            <li><a href="#">SOLO</a></li>
            <li><a href="#">BANDUNG</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <p>INFO@AVNPROJECTS.ID</p>
          <blockquote>
            A MOMENT,
            <br>
            WHISPERS OF ETERNITY.
          </blockquote>
        </div>
      </div>
    </div>
  </div>

  <!-- scroll button -->
  <button id="scrollBtn" onclick="topFunction()">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
      <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
  </button>
  

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>AVN PROJECTS &copy; 2024 </p>
        </div>
      </div>
    </div>
  </footer>
  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    $(document).ready(function() {
      $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
          $('.navbar').addClass('scrolled');
        } else {
          $('.navbar').removeClass('scrolled');
        }
      });
    });

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollBtn").style.display = "block";
      } else {
        document.getElementById("scrollBtn").style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

  </script>
</body>
</html>
