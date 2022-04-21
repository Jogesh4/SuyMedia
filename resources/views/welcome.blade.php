@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
	
	  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center bg-color">

    <div  class="container ">
      <div class="row gy-4">
        <div class="col-lg-5 mt-lg-5 pt-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center z-in">
          <h1 class="heading">What kind of <span class="orange-text orang-t-size">SEO Service</span></h1>
          <h2>are you <span class="orange-text">Looking</span> for ?</h2>
          <!--<div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>-->
		  <div class="call-green">
<div class="tWLnewIconlogoouter"><div class="TWL-widget_underlay"></div><a href="tel:7548004081"><div class="tWLnewIconlogoinner"><i class="fa fa-phone TWL-widget-button__icon"></i></div></a></div>
</div>
        </div>
        <div class="col-lg-7 order-1 order-lg-2 hero-img z-in">
          <img src="./21249.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
<div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
</div>
  </section><!-- End Hero -->
  <section class="py-5">
   <div  class="container ">
  <ul class="nav nav-pills mb-3 tab-pro" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
  </li>
  @foreach($categories as $category)
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" onclick="select_category({{ $category->id }})" data-bs-toggle="pill" data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo" aria-selected="false">{{ $category->name }}</button>
    </li>
  @endforeach
  
</ul>
<div class="tab-content pb-3 pt-3" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
  
          <div class="row">
             @if($packages->count() > 0)
             @foreach($packages as $package)
                    <div class="col-lg-6 mb-2">
                    <div class="product-item">
                      <div id="ribbon-container">
                          <a href="product-page.html" id="ribbon">Best  Seller</a>
                      </div>
                      <div class="width-40"><img src="images/package/{{ $package->image }}" class="img-fluid" alt=""></div>
                      <div class="width-60">
                      <h5>{{ $package->name }}</h5>
                        <div class="text-div">{{ $package->description }}.</div>
                           {{-- <a class="text-green pt-3" href="pricing.html">$ Starts at $<span>500</span>/month + $<span>250</span> set up</a> --}}
                          @if(session()->has('user_id'))
                          @if(!\Cart::session(session()->get('user_id'))->get($package->id))
                          
                            <button id="add-{{ $package->id }}" class="bttn" type="button" style=" border: 0; background: transparent;" onclick="add_cart({{ $package->id }})"><i class="fa fa-cart-arrow-down" style=" color: #ae0151; font-size: 20px; "></i></button>
                            
                            <button id="added-{{ $package->id }}" type="button" disabled class="bttn d-none" style=" border: 0; background: transparent;" ><i class="fa fa-cart-arrow-down" style=" color: #ccc; font-size: 20px; "></i></button>
                            
                          @else
                              <button type="button" disabled class="bttn" style=" border: 0; background: transparent;" ><i class="fa fa-cart-arrow-down" style=" color: #ccc; font-size: 20px; "></i></button>
                            @endif
                          @else
                            <a href="{{ route('login') }}" class="bttn"><i class="fa fa-cart-arrow-down" style=" color: #ae0151; font-size: 20px; "></i></a>
                          @endif

                           <div class="row">
                                <div class="col-6">
                                      <p class="text-green">Duration -: <span>{{ $package->period }}</span></p>
                                </div>
                                <div class="col-6">
                                      <p class="text-green">Price -: <span>Rs.{{ $package->price }}</span></p>
                                </div>
                           </div>
                           
                      </div>
                      </div>
                  </div>
              @endforeach
              @else 
                   <div class="text-center">
                        <h3>No Package Found</h3>
                   </div>
              @endif
         
          </div>
  
  </div>

   <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab">
  
        <div class="row" id="package_div">
                
        </div>
  
  </div>
</div>
</div>
  </section>

  @endsection
 
	
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="aos/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
    <script>

      function add_cart(id){

          var cart_no = document.getElementById('cart_no').textContent;

                  $.ajax({
                          type: "Post",
                          url: '{{route('add.to.cart')}}',
                          datatype: 'json',
                          data: {
                            "_token": "{{ csrf_token() }}",
                              'package_id' : id,
                          },
                          success: function (data) {
                              const obj = JSON.parse(data);
                              
                                document.getElementById('add-'+id).classList.add('d-none');
                                document.getElementById('added-'+id).classList.remove('d-none');
                                document.getElementById('cart_no').textContent = parseInt(cart_no) + 1;

                            },
                          complete: function () {
                          },
                          error: function () {
                          }
                      });

    }

              function select_category(id){

                  $.ajax({
                          type: "Get",
                          url: '{{route('welcome')}}',
                          datatype: 'json',
                          data: {
                              'category_id' : id,
                          },
                          success: function (data) {
                              const obj = JSON.parse(data);
                              console.log(obj);
                                var item = $('#package_div');
                                item.empty();
                              if(obj.new.packages.length == 0){
                                      item.append('<div class="text-center mt-5 mb-5"><h4>No Package Found</h4></div>');
                              }
                              else{
                                  $.each(obj.new.packages, function(key,value) {
                                      item.append('<div class="col-lg-6 mb-2"><div class="product-item"><div id="ribbon-container"><a href="product-page.html" id="ribbon">Best  Seller</a></div><div class="width-40"><img src="images/package/'+ value.image +'" class="img-fluid" alt=""></div><div class="width-60"><h5>' + value.name + '</h5><div class="text-div">'+ value.description +'.</div><div class="row"><div class="col-6"><p class="text-green">Duration -: <span>'+ value.period +'</span></p></div><div class="col-6"><p class="text-green">Price -: <span>Rs.'+ value.price  +'</span></p></div></div></div></div> </div>');
                                  });
                              }
                              
                                // document.getElementById('nav-'+id).classList.add('active');

                            },
                          complete: function () {
                          },
                          error: function () {
                          }
                      });

                }

    </script>
