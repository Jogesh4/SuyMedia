@extends('admin.layouts.header')

@section('title', 'dashboard')

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                  <div class="col-6">
                       <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Manage Package</h4>
                  </div>
                  <div class="col-6 text-end mt-5">
                          <h5><a href="/packages/create" class="add-btn">Add Package</a></h5>
                  </div>
              </div>
              
              <div class="row">
                 <div class="col-xl-12 col-lg-12">
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
                                                        <a style="text-decoration: underline;" href="{{ route('packages.edit', $package->id) }}"><span class="btn btn-warning"><i class="fa fa-pencil-alt" aria-hidden="true"></i></span></a>
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
@section('script')
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'#editor',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 200,           
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
                    editor.getContainer().style.borderColor="#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow="",
                    editor.getContainer().style.borderColor=""
                });
            }
        });
    </script>

    <script>

          $(document).on('click', '.btn-add-row', function() {
            // $(this).hide();
            $("#tbody").append(`<tr>
              <td><input type="text" name="qty[]" class="form-control" placeholder="Enter qty" /></td>
                <td><input type="text" name="price[]" class="form-control" placeholder="Enter price" /></td>
                <td>
                        <button type="button" class="btn btn-danger btn-sm btn-remove-row">x</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-info btn-sm btn-add-row">+</button>
                        </td>
              </tr>`);
          });

          $(document).on("click", ".btn-remove-row", function(){
            $(this).parent().parent().remove();
          });

    </script>

    @endsection



