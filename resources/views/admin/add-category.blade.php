@extends('admin.layouts.header')

@section('title', 'dashboard')

@section('content')
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Add Category</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
				 <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
  <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
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
                              <h4 class="mb-4">Add Category</h4>
                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                        
                        </div>

    

                      <div class="d-flex justify-content-end">
													<button type="submit" class="add-btn">Add</button>
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
													<h6 class="m-0 font-weight-bold ">Category List</h6>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-end">Action</th>
                                              </tr>
                                              
                                            </thead>

                                  <tbody>
                                  @if($categories->count() > 0)
                                              @foreach($categories as $category)
                                                <tr>
                                                     <td>{{ $loop->iteration }}</td>
                                                     <td>{{ $category->name }}</td>
                                                     <td>@if($category->status)
                                                            @php $statusBtn = '<a title="Deactivate" href="'. route('change_status', ['type' => 'category', 'id' => $category->id, 'status' => '0']) .'" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-user-times"></i></a>' @endphp
                                                            Active
                                                        @else
                                                            @php $statusBtn = '<a title="Activate" href="'. route('change_status', ['type' => 'category', 'id' => $category->id, 'status' => '1']) .'" class="btn btn-success btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i></a>' @endphp
                                                            Deactive
                                                        @endif</td>
                                                        <td>
                                                        {!! $statusBtn !!}
                                                        
                                                    </td>
                                                </tr>
                                               @endforeach
                                              @else
                                                  <div class="text-center">
                                                       <h3>No Category Found</h3>
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