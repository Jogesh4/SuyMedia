@extends('admin.layouts.header')

@section('title', 'dashboard')

@section('content')
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Add Product</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
				 
					<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                               
                                <div class="card-body">
                                    <div class=" pb-2">
                                        
                               <div class="inner-bg">
                      <div class="element-title mb-2">
                        <h4>Product</h4>
                        <span>Please fill the form bellow.</span> </div>
                      <div class="add-prod-from">
						  <div class="row">
							<div class="col-md-6 pt-2 mb-3">
							<label>Product Name</label>
							 <input type="text" class="form-control" placeholder="Men's watch">
							</div>
							<div class="col-md-6 pt-2 mb-3">
							  <label>Sub text</label>
							  <input type="text" class="form-control" placeholder="leather">
							</div>
							<div class="col-md-12 mb-3">
							  <label>category</label>
							  <select class="form-control">
								<option value="">Slect Option</option>
								<option value="">option one</option>
								<option value="">option two</option>
								<option value="">option three</option>
								<option value="">option four</option>
								<option value="">option five</option>
							  </select>
							</div>
							<div class="col-md-12 mb-3">
							  <label>Status</label>
							  <input type="radio" name="status">
							  <label>Published</label>
							  <input type="radio" name="status">
							  <label>draft</label>
							  <input type="radio" name="status">
							</div>
							<div class="col-md-6 mb-3">
							  <div class="input-group">
								<label class="w-100">price</label>
								<input class="form-control" name="email" placeholder="$20" type="text">
							  </div>
							</div>
							<div class="col-md-6 mb-3">
							  <div class="input-group">
								<label class="w-100">discount</label>
								<input class="form-control" name="email" placeholder="5%" type="text">
							  </div>
							</div>
							<div class="col-md-12 mb-3">
							  <label>Product Description</label>
							  <textarea cols="30" rows="10" class="form-control" placeholder="loram ipsum dolor sit amit"></textarea>
							</div> 
							<div class="col-md-6 mb-3">
							  <label>Meta Tital</label>
							  <input type="text" class="form-control" placeholder="any title">
							</div>
							<div class="col-md-6 mb-3">
							  <label>Meta Keyword</label>
							  <input type="text" class="form-control" placeholder="any key">
							</div>
							<div class="col-md-12 mb-3"> 
							<label class="fileContainer"> <span>upload Image</span>
								<input type="file" class="form-control">
							  </label>
							</div>
							<div class="col-md-6 mb-3">
							  <label>type</label>
							  <input type="text" class="form-control" placeholder="leather">
							</div>
							<div class="col-md-6 mb-3">
							  <label>style</label>
							  <select class="form-control">
								<option value="">Slect Option</option>
								<option value="">option one</option>
								<option value="">option two</option>
								<option value="">option three</option>
								<option value="">option four</option>
								<option value="">option five</option>
							  </select>
							</div>
							<div class="col-md-12 mb-3">
							  <div class="buttonz">
								<button type="submit" class="add-btn">save</button>
								<button type="submit" class="cancel-btn">cancel</button>
							  </div>
							</div>
                      	</div>
					  </div>	  
                    </div>
                            </div>
                        </div>
                        <!-- Area -->
                       

                       
                    </div>
					
					
</div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © 2022
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->
          </div>
@endsection