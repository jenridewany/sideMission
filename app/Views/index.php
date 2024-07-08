<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pixel mingle</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Google Fonts - Outfit -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
  <link  href="https://fonts.googleapis.com/css2?family=Vogue&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand" href="#">pixel mingle</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#about">About   </a>
                </li>
                <li class="nav-item">
                  <a class="btn" href="<?= base_url(); ?>sign-up">Sign Up</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
    
    <section class="jumbotron">
      <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid jumbotron-content">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="text-jumbotron">
                    <span>
                      PIXEL MINGLE
                    </span>
                    <h3>
                        Unleash your creativity, Discover your audience.
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="jumbotron-image ">
                  <img src="<?= base_url('assets/hero.png'); ?>" class="image-fluid">
                </div>
            </div>
          </div>
        </div>
        <div class="marquee-container">
            <marquee behavior="scroll" direction="left" scrollamount="10">
              PIXEL MINGLE, DISCOVER YOUR AUDIENCE
            </marquee>
        </div>
      </div>
    </section>

    <!-- About Me Section -->
    <section class="about-me" id="about">
      <div class="container">
        <div class="row">
          <!-- Image Box -->
          <div class="col-md-6 py-5 px-1">
            <div class="image-box">
              <img src="<?= base_url('assets/hero.png'); ?>" alt="PIXEL MINGLE">
            </div>
          </div>
          <!-- Description Box -->
          <div class="col-md-6 py-5 px-1">
            <div class="description-box">
              <h2>Pixel Mingle</h2>
              <p>is a marketplace designed for creators to showcase their work and connect with a global audience. Whether you're an artist, or designer, Pixel Mingle provides a platform to share your work and monetize your creativity. For users, it's a hub of discovery, where you can explore unique creations, and support your favorite creators. Join Pixel Mingle today and discover a world where creativity thrives and connections flourish.</p>
              <a href="<?= base_url(); ?>sign-up" class="btn btn-primary">SIGN UP</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Skills -->
    <section class="skills">
      <div class="container">
        <h2>WHAT CREATOR SAY'S :</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="skills-item">
              <div class="d-flex flex-fill">
                <div class="skills-img">
                  <img src="assets/image/skills/video editing.jpg" alt="">
                </div>
                <div class="skills-desc">
                  <h2>Aria</h2>
                  <p>Pixel Mingle gave my music a global stage, connecting me with fans worldwide.</p>
                </div>           
              </div>
            </div>          
          </div>
          
          <div class="col-md-6">
            <div class="skills-item">
              <div class="d-flex flex-fill">
                <div class="skills-img">
                  <img src="assets/image/skills/social-media.jpg" alt="">
                </div>
                <div class="skills-desc">
                  <h2>Ethan</h2>
                  <p>As a designer, Pixel Mingle's community has inspired and challenged my creative process.</p>
                </div>           
              </div>
            </div>          
          </div>
          
          <div class="col-md-6">
            <div class="skills-item">
              <div class="d-flex flex-fill">
                <div class="skills-img">
                  <img src="assets/image/skills/project-management.jpg" alt="">
                </div>
                <div class="skills-desc">
                  <h2>Laura</h2>
                  <p>I've found financial independence through Pixel Mingle's seamless monetization options.</p>
                </div>           
              </div>
            </div>          
          </div>
          
          <div class="col-md-6">
            <div class="skills-item">
              <div class="d-flex flex-fill">
                <div class="skills-img">
                  <img src="assets/image/skills/developer.jpg" alt="">
                </div>
                <div class="skills-desc">
                  <h2>Breeze</h2>
                  <p>Pixel Mingle is where my writing found its audience, turning passion into profession.</p>
                </div>           
              </div>
            </div>          
          </div>
        </div>
      </div>
    </section>
    
    <!-- Get In Touch -->
    <section class="get-in-touch" id="get-in-touch">
      <div class="container">
          <div class="card card-body p-5">
            <h2>ASK YOUR QUESTIONS</h2>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 p-5">
                <form>
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="YOUR NAME*">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="YOUR EMAIL*">
                  </div>
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="message" placeholder="MESSAGE*" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn">SUBMIT</button>
                </form>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 p-5">
                <div class="contact p-2">
                  <h2>Contact</h2>
                  <h3 class="card-title">admin@pixelmingle.com</h3>
                </div>
                <div class="contact p-2">
                  <h2>Based In</h2>
                  <h3 class="card-title">Yogyakarta, ID</h3>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    
  
  <!-- Footer -->
 <footer class="footer">
    <div class="container">
      <div class="footer-content row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="container">
            <h2>Join Pixel Mingle Now</h2>
            <p>where creativity meets community. Showcase your talent, connect with a global audience, and turn your passion into profit. Whether you're an artist, musician, writer, or creator of any kind, discover a platform designed to support and elevate your craft. Embrace a world of endless possibilities at Pixel Mingle—where every creation finds its admirers and every creator finds their success.</p>
            <a href="<?= base_url(); ?>sign-up" class="button">SIGN UP</a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="container text-center">
            <img src="<?= base_url('assets/login.jpg'); ?>" class="rounded-circle profile" alt="Profile image">
          </div>
        </div>
      </div>
    </div>
    <div class="text-center text-md-start g-0 border-top py-2 copyright">
      <span>© <span id="copyright">
          <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
      </span>pixel mingle. All Rights Reserved.</span>
    </div>
</footer>
    

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="assets/js/script.js" type="text/javascript"></script>

</body>
</html>
