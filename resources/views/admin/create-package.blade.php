@extends('admin.layouts.header')

@section('title', 'dashboard')

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Add Package</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
				 <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
<form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
    @csrf
             @if(Session::has('success'))
                <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span> </button>
                  {{Session::get('success')}}</div>
               @endif
               @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
                 @endif
                                <div class="card-body">
                                    <div class=" pb-2">
                                        <div class="row">    

    <div class="col-lg-12 col-md-12 mb-4 element-title">
        <h4 class="mb-4">Add Package</h4>

         <div class="row"> 
          <div class="col-lg-6 col-md-6 col-12 mb-2">
            <label>Category</label>
                  <select class="form-control" name="category">
                        <option value="" selected hidden>Select Category</option>
                        @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                        
                    </select>
            </div>
          
          </div>

            <div class="row"> 
            <div class="col-lg-6 col-md-6 col-12 mb-2">
                  <label>Package Name</label>
                  <input type="text" class="form-control" placeholder="Package Name" name="name">
          </div>
          <div class="col-lg-6 col-md-6 col-12 mb-2">
            <label>Time Period</label>
                  <select class="form-control" name="period">
                        <option value="">Months / Year</option>
                        <option value="1 month">Per Month</option>
                        <option value="1 year">One Year</option>
                        <option value="2 year">Two Year</option>
                        <option value="3 year">Three Year</option>
                    </select>
            </div>
          
          </div>
          <div class="row"> 
            <label>Package Description</label>
            <div class="col-lg-12 col-md-12 col-12 mb-2">
                <Textarea name="description" class="form-control" placeholder="Enter Package description" name="description"></Textarea>
            </div>
          </div>
          <div class="row"> 
            <div class="col-lg-6 col-md-6 col-12 mb-2">
              <label>Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price">
          </div>
          <div class="col-lg-6 col-md-6 col-12 mb-2">
            <label>Image</label>
          <input type="file" class="form-control" name="image">
          </div>
          
          </div>
		 
    </div>

    

                     <div class="d-flex justify-content-end">
													<button type="submit" class="add-btn" >Add</button>
												</div>
</div>          
                               
                            </div>
                        </div>

</form>
                        <!-- Area -->
                       

                       
                    </div>
						<div class="card shadow mb-4">
                               <div class="card-header py-3">
                                    
									<div class="d-flex justify-content-between">
												<!--begin::User-->
												<div class="d-flex flex-column">
													<h6 class="m-0 font-weight-bold ">Package List</h6>
												</div>
												<!--end::User-->
												
											</div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class=" pb-2 table-responsive">
									               <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">S.no</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Period</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-end">Action</th>
                                              </tr>
                                              
                                            </thead>

                                  <tbody>
                                  @if($packages->count() > 0)
                                              @foreach($packages as $package)
                                                <tr>
                                                     <td>{{ $loop->iteration }}</td>
                                                     <td><img class="img-fluid" src="/images/package/{{$package->image}}" width="30%" height="10%"></td>
                                                     <td>{{ $package->name }}</td>
                                                     <td>{{ $package->period }}</td>
                                                     <td>Rs.{{ $package->price }}</td>
                                                     <td>@if($package->status)
                                                            @php $statusBtn = '<a title="Deactivate" href="'. route('change_status', ['type' => 'package', 'id' => $package->id, 'status' => '0']) .'" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-user-times"></i></a>' @endphp
                                                            Active
                                                        @else
                                                            @php $statusBtn = '<a title="Activate" href="'. route('change_status', ['type' => 'package', 'id' => $package->id, 'status' => '1']) .'" class="btn btn-success btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i></a>' @endphp
                                                            Deactive
                                                        @endif</td>
                                                        <td>
                                                        {!! $statusBtn !!}
                                                        {{-- <span class="btn btn-warning" onclick="edit_sub_category({{ $package->id }})"><i class="fa fa-pencil-alt" aria-hidden="true"></i></span> --}}
                                                        <!-- <button class="btn btn-warning" ><i class="fa fa-plus" aria-hidden="true"></i></button> -->
                                                    </td>
                                                </tr>
                                               @endforeach
                                              @else
                                                  <div class="text-center">
                                                       <h3>No Package Found</h3>
                                                  </div>
                                              @endif


                                  </tbody>                                        
                                </table>
                                       
                                   
                                    
                               
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
