<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Suy media</title>

    <!--    Stylesheets-->
    <!-- ===============================================-->
    


    <link href="{{asset('css/demo.css')}}" rel="stylesheet" /> 
    <link href="{{asset('css/core.css')}}" rel="stylesheet" /> 
    <link href="{{asset('css/theme-default.css')}}" rel="stylesheet" /> 
    <link href="{{asset('css/style.css')}}" rel="stylesheet" /> 


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
<ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../images/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../images/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="my-order.html">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="login.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
    </div>
  </header><!-- End Header -->

  <section class="py-5">
   <div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <i class="fa fa-adjust"></i>
                        <div class="price-value"> $10.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Standard</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Monthly Bandwidth</li>
                            <li><b>10</b> subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="login.html">sign up</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <i class="fa fa-briefcase"></i>
                        <div class="price-value"> $20.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Business</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>60GB</b> Disk Space</li>
                            <li><b>60</b> Email Accounts</li>
                            <li><b>60GB</b> Monthly Bandwidth</li>
                            <li><b>15</b> subdomains</li>
                            <li><b>20</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="login.html">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <i class="fa fa-diamond"></i>
                        <div class="price-value"> $30.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Premium</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>70GB</b> Disk Space</li>
                            <li><b>70</b> Email Accounts</li>
                            <li><b>70GB</b> Monthly Bandwidth</li>
                            <li><b>20</b> subdomains</li>
                            <li><b>25</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="login.html">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pricingTable red">
                    <div class="pricingTable-header">
                        <i class="fa fa-cube"></i>
                        <div class="price-value"> $40.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Extra</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>80GB</b> Disk Space</li>
                            <li><b>80</b> Email Accounts</li>
                            <li><b>80GB</b> Monthly Bandwidth</li>
                            <li><b>25</b> subdomains</li>
                            <li><b>30</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="login.html">sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </section>
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
  © 2022 Suy Media, All Rights Reserved
  </div>
  <div class="col-lg-6 text-lg-end text-md-end">
 Terms And Conditions | Design By Local SEO
  </div>
  </div>
  </div>
  </footer>
	
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

<script src="aos/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    
    <script src="vendors/feather-icons/feather.min.js"></script>
   
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>


</html>