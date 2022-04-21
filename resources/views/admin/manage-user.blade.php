@extends('admin.layouts.header')

@section('title', 'dashboard')

@section('content')
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Manage User</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
				 
						<div class="card shadow mb-4">
                               <div class="card-header py-3">
                                    
									<div class="table-title mb-4">
                <div class="row">
                    <div class="col-sm-5">
                        <h4>User Management</h4>
                    </div>
                    <div class="col-sm-7 text-end">
                        <a href="#" class="btn btn-secondary"><i class="fas fa-plus"></i> <span>Add New User</span></a>
                        <a href="#" class="btn btn-secondary"><i class="far fa-file"></i> <span>Export to Excel</span></a>						
                    </div>
                </div>
            </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class=" pb-2 table-responsive">
									<table class="user-list table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>                        
                            <td>@if($user->is_active)
                                                            @php $statusBtn = '<a title="Deactivate" href="'. route('change_status', ['type' => 'user', 'id' => $user->id, 'status' => '0']) .'" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-user-times"></i></a>' @endphp
                                                            Active
                                                        @else
                                                            @php $statusBtn = '<a title="Activate" href="'. route('change_status', ['type' => 'user', 'id' => $user->id, 'status' => '1']) .'" class="btn btn-success btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i></a>' @endphp
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
                             <h3>No User Found</h3>
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