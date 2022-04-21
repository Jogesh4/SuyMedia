@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  
      
      <section class="my-7">
        <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center pb-4"> <img id="main-image" src="{{ asset('images/package/' . $package->image)}}" class="img-fluid" /> </div>
                            {{-- <div class="thumbnail text-center"> <img onclick="change_image(this)" src="managed-seo1.svg" width="70"> <img onclick="change_image(this)" src="managed-seo.svg" width="70"> </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <a href="/"><i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span></a> </div>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{{ $package->category->name }}</span>
                                <h5 class="text-uppercase">{{ $package->name }}</h5>
                                <div class="price d-flex flex-row align-items-center"> <h6 class="act-price">Rs.{{ $package->price }}</h6>
                                    {{-- <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div> --}}
                                </div>
                            </div>
                            <p class="about">{{ $package->description }}.</p>
                            {{-- <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div> --}}
                            <div class="cart mt-4 align-items-center">
                            @if(session()->has('user_id'))
                              @if(!\Cart::session(session()->get('user_id'))->get($package->id))
                              
                                <button id="add" class="btn-pink text-uppercase mr-2 px-4" onclick="add_cart({{ $package->id }})">Add to Cart</button>

                                <button id="added" type="button" disabled class="btn-pink text-uppercase mr-2 px-4 d-none" disabled>Added to Cart</button>

                              @else
                                <button type="button" disabled class="btn-pink text-uppercase mr-2 px-4" disabled>Added to Cart</button>
                              @endif
                            @else
                              <a href="{{ route('login') }}" class="btn-pink text-uppercase mr-2 px-4">Login to add</a>
                            @endif
                            <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                            </div>
                            {{-- <div class="cart mt-4 align-items-center"> <a class="btn-pink text-uppercase mr-2 px-4" href="/cart">Add to cart</a> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      </section>

@endsection

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
                              
                                document.getElementById('add').classList.add('d-none');
                                document.getElementById('added').classList.remove('d-none');
                                document.getElementById('cart_no').textContent = parseInt(cart_no) + 1;

                            },
                          complete: function () {
                          },
                          error: function () {
                          }
                      });

    }

</script>