@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

   <section class="my-7">
	<div class="container">

@if($cartItems->count() > 0)
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table class="mb-2 w-100 ">
						<tbody class="items">
         @if($cartItems->count() > 0)
            @foreach($cartItems as $row)  
							<tr class="selected-product">
								<td class="item-thumbnail"> <img src="images/package/{{ $row->image }}" width="80" height="80" data-max-width="80" data-max-height="80"> </td>
								<td class="item-info">
									<p class="item-title"><a href="">{{ $row->name }}</a></p>
								</td>
								{{-- <td class="text-end">Rs.{{ $row->price }} </td> --}}
								<td class="item-qty mt-2">
										<button class="minus mt-2" onclick="decreaseQty({{ $row->id }})"><i class="fa fa-minus" aria-hidden="true"></i> </button>
										<input class="form-control input-fild mt-2" data-page="product-view" title="Available Quantity" type="text" id="quantity-{{ $row->id }}" name="quantity" max="10" min="1" value="{{ $row->qty }}" readonly="">
										<button class="plus mt-2" onclick="increaseQty({{ $row->id }})"><i class="fa fa-plus" aria-hidden="true"></i> </button>
								</td>
								<td class="text-end">
                  <span id="price-{{ $row->id }}">Rs.{{ $row->total }}</span>
                </td>
								<td class="ps-2">
                  <form method="POST" action="{{ route('remove.item.from.cart') }}">
                     @csrf
                        <input type="hidden" name="cart_id" value="{{ $row->id }}"/>
                        <button class="border-0"><i class="fa fa-trash green-text" aria-hidden="true"></i></button>
                  </form>
                   
                   </td>
							</tr>
              @endforeach
            @else
              <tr>
                <td colspan="5">No Items in the cart</td>
              </tr>
            @endif
						</tbody>
					</table>
					<hr>
				</div>
			
				<div class="row">
             
					<div class="text-start col">
                 @if($cartItems->count() > 0)
                  <form method="POST" action="{{ route('remove.from.cart') }}">
                    @csrf
                    <button class="btn btn-danger btn-block">Empty Cart</button>
                  </form>
                  @endif
          </div>
					<div class="text-end col">Subtotal: <span class="cart-subtotal total"> Rs.{{ $total }}</span></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="p-4 border shadow">
					<ul class="p-0 sub-total">
						<li class="subtotal"> 
              <strong>Subtotal:</strong>
              <span class="cart-subtotal total">Rs.{{ $total }}</span>
             </li>
						<li class="order-modifier SHIPPING-modifier shipping-code-modifier"> <strong>Service Fee / Shipping Cost:</strong> <span class=""></span>
							<div class="estimator" data-deferred="1" data-shipping-cost="375">
								<ul class="p-0">
									<li>Next Day Delivery </li>
									<li> <span class="section">Estimated for:</span> India, AN </li>
								</ul>
								<hr>
								<h4 class="cart-subtotal total">Rs.{{ $total }}</h4> </div>
						</li>
						<li class="main-button"> <button type="button" class="checkout-btn text-center" onclick="order()" id="pay_now">Go to checkout</button> </li>
						<li class="d-inline-block w-100 text-center mt-2">
							<div class="small"> <a href="">
              Have a Cash Card or Discount Coupon?
          </a> </div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

  @else

         <div class="text-center">
              <h2>Your Shopping Cart is Empty!!!</h2>
              <a class="btn btn-lg btn-dark mt-3" href="/">View Products</a>
          </div>

  @endif

                <button class="buttonload d-none" id="loading">
                         <i class="fa fa-spinner fa-spin"></i>
                      </button>


 <div id="your-modal-cod" class="modal">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				  {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
			</div>
			<div class="modal-body text-center">
				<div class="modal-subheading text-center">
					<h4>Great!</h4>
				</div>
				<div class="modal-sub-heading text-center">
					<h5>Your order has been created successfully.</h5>
				</div>
				<div class="row text-center">
					<img src="/images/logo.png"class="img-fluid PreviewOrderImage" id="PreviewOrderImage" border="0" width="120" height="100" align="center" alt="image">
				</div>
				<div class="row text-center">
					<div class="ml-2 productname">
        	  <div>Order ID: <strong id="OrderID"></strong></div>
        	</div>
				</div>
				<div class="row text-center">
					<div class="ml-5">
            <div class="price">Payment Mode: <a href="javascript:void(0);">COD</a></div>
        </div>
				</div>
				<div class="row text-center">
					<div class="ml-5">
	          <div class="price">Total Amount: ₹<strong id="TotalAmount"></strong></div>
	        </div>
				</div>
				<form action="/user_last_order" method="GET" enctype="multipart/form-data">
					<button class="btn btn-success" type="submit"><span>View Your Order Details</span></button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="your-modal-razorpay" class="modal">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				 <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
			</div>
			
			<div class="modal-body text-center">
				<div class="modal-subheading text-center">
					<h4>Great!</h4>
				</div>
				<div class="modal-sub-heading text-center">
					<h5>Your order has been created successfully.</h5>
				</div>
				<div class="row text-center">
					<img src="/images/logo.png" class="img-fluid PreviewOrderImage" id="PreviewOrderImageRazorpay" border="0" width="100" height="100" align="center" alt="image">
				</div>
				<div class="row text-center mt-3">
					<div class="ml-2 productname">
        	  <div>Order ID: <strong id="OrderIDRazorpay"></strong></div>
        	</div>
				</div>
				<div class="row text-center">
					<div class="ml-5">
            <div class="price">Payment Mode: <a href="javascript:void(0);">Online</a></div>
        </div>
				</div>
				<div class="row text-center">
					<div class="ml-5">
	          <div class="price">Total Amount: ₹<strong id="TotalAmountRazorpay"></strong></div>
	        </div>
				</div>
				<div class="row text-center mb-3">
					<div class="ml-5">
            <div class="price"><small>Razorpay Payment ID: <span id="razorpay_payment_id"></span></small></div>
            <div class="price"><small>Razorpay Order ID: <span id="razorpay_order_id"></span></small></div>
        </div>
				</div>
				<form action="/user_last_order" method="GET" enctype="multipart/form-data">
					<button class="btn btn-success" type="submit"><span>View Your Order Details</span></button>
				</form>
			</div>
		</div>
	</div>
</div>

</section>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

    

  function loading(iRun) {

    var loader = document.getElementById('loading').classList;

            if (iRun) {
                loader.remove('d-none');
            }
            else {
                loader.add('d-none');
            }
        }
    


    function order(){
          loading(true);
          document.getElementById('pay_now').disabled = true; 
           $.ajax({
                            type: "Get",
                            url: '{{route('order.place')}}',
                            datatype: 'json',
                            data: $("#contactForm").serialize(),
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                const obj = JSON.parse(data);
                                console.log(obj);
                                      loading(false);
                                      if (obj.new.order.status == 'COD') {
								  
                                            $('#PreviewOrderImage').attr("src", window.location.origin + '/images/logo3.png');
                                            $('#OrderID').empty().html(obj.new.order.id);
                                            $('#TotalAmount').empty().html(obj.new.order.amount);

                                             document.getElementById('your-modal-cod').classList.add('modal-show');
                                            // $('#your-modal-cod').modal({
                                            //     backdrop: 'static',
                                            //     keyboard: false
                                            // });

                                       } else {
                                            var options = {
                                              "key": "rzp_test_6H6AUtBZCXyatL", // Enter the Key ID generated from the Dashboard
                                              "amount": obj.new.order.amount * 100, // Amount is in currency subunits. Default currency is <i class="fas fa-rupee-sign"></i> Hence, 50000 refers to 50000 paise
                                              "currency": "INR",
                                              "name": "SUYMedia",
                                              "description": "Razorpay Transaction",
                                              "image": window.location.origin + "/images/logo.png",
                                              "order_id": obj.new.orderId, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                              "handler": function (response){
                                                $.ajaxSetup({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    }
                                                });
                                                $.ajax({
                                                    type: "POST",
                                                    url: '{{route('update_order_status')}}',
                                                    datatype: 'json',
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "OrderID": obj.new.order.id,
                                                        "TotalAmount": obj.new.order.amount,
                                                        "razorpay_payment_id": response.razorpay_payment_id,
                                                        "razorpay_order_id": response.razorpay_order_id,
                                                        "razorpay_signature": response.razorpay_signature,
                                                      },
                                                    success: function (data) {
                                                        // alert('jhvjkvkj');
                                                      $('#PreviewOrderImageRazorpay').attr("src", window.location.origin + '/images/logo.png');
                                                      $('#OrderIDRazorpay').empty().html(obj.new.order.order_no);
                                                      $('#TotalAmountRazorpay').empty().html(obj.new.order.amount);
                                                      $('#razorpay_payment_id').empty().html(response.razorpay_payment_id);
                                                      $('#razorpay_order_id').empty().html(response.razorpay_order_id);

                                                      document.getElementById('your-modal-razorpay').classList.add('modal-show');
                                                      // $('#your-modal-razorpay').modal({
                                                      //     backdrop: 'static',
                                                      //     keyboard: false
                                                      // });
                                                      
                                                    },
                                                    complete: function () {
                                                    },
                                                    error: function () {
                                                    }
                                                });
                                              },
                                              "prefill": {
                                                  "name": "",
                                                  "email": "",
                                                  "contact": ""
                                              },
                                              "notes": {
                                                  "address": ""
                                              },
                                              "theme": {
                                                  "color": "#e54033"
                                              },
                                              "modal": {
                                                  "backdrop": 'static',
                                                  "keyboard": false,
                                                  "ondismiss": function(){
                                                      window.location.replace(window.location.origin + '/');
                                                  }
                                              }
                                            };
                                            var rzp1 = new Razorpay(options);
                                            rzp1.on('payment.failed', function (response){
                                                    alert('failed');
                                                    // alert(response.error.code);
                                                    // alert(response.error.description);
                                                    // alert(response.error.source);
                                                    // alert(response.error.step);
                                                    // alert(response.error.reason);
                                                    // alert(response.error.metadata.order_id);
                                                    // alert(response.error.metadata.payment_id);
                                            });
                                            rzp1.open();
                                          }
                                
                                

                              },
                            complete: function () {
                            },
                            error: function () {
                            }
                        });

    }

function increaseQty(id){
       var quantity = document.getElementById('quantity-'+id).value;

       
            $.ajax({
                    type: "Get",
                    url: '{{route('add_cart_quantity')}}',
                    datatype: 'json',
                    data: {
                        'cart_id' : id,
                        'quantity' : quantity,
                    },
                    success: function (data) {
                        const obj = JSON.parse(data);
                         
                        if(obj.new.code == 1){
                            $('#quantity-'+id).val(obj.new.quantity);
                            $('#price-'+id).text('Rs.' + obj.new.price);
                            $('.total').text('Rs.' + obj.new.subtotal);

                            

                        }
                      },
                    complete: function () {
                    },
                    error: function () {
                    }
                });

    }

    function decreaseQty(id){
       var quantity = document.getElementById('quantity-'+id).value;

       if(quantity > 1){
       
            $.ajax({
                    type: "Get",
                    url: '{{route('minus_cart_quantity')}}',
                    datatype: 'json',
                    data: {
                        'cart_id' : id,
                        'quantity' : quantity,
                    },
                    success: function (data) {
                        const obj = JSON.parse(data);
                         
                        if(obj.new.code == 1){
                            $('#quantity-'+id).val(obj.new.quantity);
                            $('#price-'+id).text('Rs.' + obj.new.price);
                            $('.total').text('Rs.' + obj.new.subtotal);

                            

                        }
                      },
                    complete: function () {
                    },
                    error: function () {
                    }
                });
          }
    }

</script>