<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Suymedia</title>

    <!--    Stylesheets-->
    <!-- ===============================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/svg-with-js.min.css" integrity="sha512-OiNHhQwzS1LlbvAM+EbRs/LeCL5RhAkv2pvr432TxTFGcxNcG6I8VVII7s4dUVwJJG7HtHKvsR7zzD5vuSlAlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="aos/aos.css" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
   </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
	
	<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-lg-flex d-md-flex text-center align-items-center justify-content-between">

      <div class="logo">
        <a href="/"><img src="../images/logo.png" alt="" class="img-fluid"></a>
      </div>

     <!--- <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>--><!-- .navbar -->
         @php
              use App\Models\CartItem;
            if(session()->has('user_id')){
              $cartItems = CartItem::where(['user_id' => session()->get('user_id'),'status' => 1])->get();
            }
          @endphp
      @if (session()->has('user_id'))
      
          <div>
              <a class="top-button-login my-lg-0 my-md-0 my-4" href="/user-dashboard"><span><i class="fa fa-user-o" aria-hidden="true"></i> Dashboard</span></a>
          </div>
          <a class="text-1000" href="{{ route('cart.index') }}">
          <div class="me-3">
          <svg class="feather feather-shopping-cart" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg>
              @if(session()->has('user_id'))
                <span id="cart_no">{{ $cartItems->count() }}</span>
              @else
                   <span id="cart_no"></span>
              @endif
          </div>
        </a>
      @else
         <div>
          <a class="top-button-login my-lg-0 my-md-0 my-4" href="/login"><span><i class="fa fa-user-o" aria-hidden="true"></i> Login</span></a>
          <a class="top-button my-lg-0 my-md-0 my-4" href="/sign-up"><span><i class="fa fa-user-o" aria-hidden="true"></i> Sign Up</span></a>
          </div>
      @endif
    </div>
  </header><!-- End Header -->

      @yield('content')

   <footer id="footer">
  <div class="container">
  <div class="row">
  <div class="col-lg-8 mb-4">
  <h2 class="white-text">Let's Start Your Project, <span class="orange-text">Mail Us</span></h2>
  </div>
  <div class="col-lg-4 text-lg-end text-md-end mb-4">
  <h2 class="white-text">+1 123-456-7890</h2>
  </div> 
  </div>
  <div class="row border-top py-5">
  <div class="col-lg-3">
  <div class="me-lg-4">
  <img class="img-fluid py-2" src="../images/logo.png">
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
  </div>
  </div>
  <div class="col-lg-3">
  <div class="me-lg-4">
  <h4 class="white-text">Services</h4>
  <ul>
  <li>Marketing & SEO</li>
  <li>Startup</li>
  <li>Finance Solution</li>
  <li>Food</li>
  </ul>
  </div>
  </div>
  <div class="col-lg-3">
  <div class="me-lg-4">
  <h4 class="white-text">Useful Link</h4>
  <ul>
  <li>About</li>
  <li>Blog</li>
  <li>Contact</li>
  <li>Appointment</li>
  </ul>
  </div> 
  </div>
  <div class="col-lg-3">
  <div>
   <h4 class="white-text">Subscribe</h4>
   <div class="input-group mb-3 mt-4"> <input type="text" class="form-control email-sub" placeholder="Enter email" aria-label="Recipient's username" aria-describedby="button-addon2"> <button class="subscrib" type="button" id="button-addon2">Subscribe</button> </div>
     Lorem Ipsum is simply dummy text of the printing and typesetting industry.           
  </div> 
  </div>  
  </div>
  <div class="row pb-3">
  <div class="col-lg-6">
  © 2022 Sun Media, All Rights Reserved
  </div>
  <div class="col-lg-6 text-lg-end text-md-end">
 Terms And Conditions | Design By Local SEO
  </div>
  </div>
  </div>
  </footer>

  </body>
  </html>