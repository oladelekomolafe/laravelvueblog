@extends('layouts.appfrontend')

<?php
$title = 'Blog - Laravel | Vue';
?>

@section('content')

<body>
  <div id="app">
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:boyiajas@gmail.com">boyiajas@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+27 84 257 5612</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex justify-content-between">

        <div class="logo">
          <h1 class="text-light"><a href="index.html">Flattern</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><router-link active-class="active" to="/">Home</router-link></li>
            <li><a href="about.html">About</a></li>
            <!-- <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="services.html">Service 1</a></li>
                
                <li><a href="services.html">Service 2</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="testimonials.html">Testimonials</a></li>
            <li><a href="portfolio.html">Portfolio</a></li> -->
            <li><router-link to="/blog">Blog</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
            <li><span style="float:right;color:#fafafa;">
                    
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <!-- <a href="{{ url('/home') }}">Home</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" style="display: ruby !important;">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" style="display: ruby !important;"> | &nbsp;&nbsp;&nbsp;&nbsp;Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </span>
              </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <main id="main">

      {{--Vue Routing --}}
        
          <homemain csrf="{{csrf_token()}}"></homemain>

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">

          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3>We've created more than <span>200 websites</span> this year!</h3>
              <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="#">Request a quote</a>
            </div>
          </div>

        </div>
      </section><!-- End Cta Section -->

    

      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2>Our <strong>Clients</strong></h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Our Clients Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Flattern</h3>
              <p>
                A108 Adam Street <br>
                New York, NY 535022<br>
                United States <br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Flattern</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  </div>

  <script src="{{mix('/js/app.js')}}"></script>
</body>

@endsection

@section('title'){{ $title }}@stop

@section('footer')

@stop

<style lang="css">
    .active, .router-link-active{
        /*background-color: #487bc8;
        border-radius: 5px;*/
        color: #f03c02 !important;
    }
</style> 

</html>