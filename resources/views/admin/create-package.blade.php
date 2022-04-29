@extends('admin.layouts.header')

@php
  $title = "Add Package";
  $button_text = "Add";
  if(!empty($package)) {
    $title = "Edit Package";
    $button_text = "Update";
  }
@endphp

@section('title', $title)

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ $title }}</h4>

              <div class="row">
                 <div class="col-xl-12 col-lg-12">
				 <div class="card shadow mb-4">

 @if(!empty($package))  
      <form action="" method="post" enctype="multipart/form-data">
        @method('put')
 @else        
      <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
@endif
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
                  <select class="form-control" name="category" value="{{ !empty($package->category_id) ? $package->category_id : "" }}" >
                        <option value="" hidden>Select Category</option>
                        @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                        
                    </select>
            </div>
          
          </div>

            <div class="row"> 
            <div class="col-lg-6 col-md-6 col-12 mb-2">
                  <label>Package Name</label>
                  <input type="text" class="form-control" placeholder="Package Name" name="name" value="{{ !empty($package->name) ? $package->name : "" }}">
          </div>
          <div class="col-lg-6 col-md-6 col-12 mb-2">
            <label>Time Period</label>
                  <select class="form-control" name="period" value="{{ !empty($package->period) ? $package->period : "" }}">
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
                <Textarea name="description" class="form-control" placeholder="Enter Package description" id="editor" value="{{ !empty($package->description) ? $package->description : "" }}"></Textarea>
            </div>
          </div>

           <div>
        
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th>Quantity</th>
                    <th>Price(excl. tax)</th>
                    {{-- <th>SKU</th> --}}
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  @if($variants->count() > 0)
                    @foreach($variants as $variant)
                     <tr>
                          <td><input type="text" name="qty[]" class="form-control" value="{{ $variant->qty }}" placeholder="Enter qty" /></td>
                          <td><input type="text" name="price[]" class="form-control" value="{{ $variant->price }}" placeholder="Enter price" /></td>
                          <td>
                          <button type="button" class="btn btn-danger btn-sm btn-remove-row">x</button>
                          </td>
                          <td>
                          <button type="button" class="btn btn-info btn-sm btn-add-row">+</button>
                          </td>
                      </tr>
                    @endforeach

                  @else
                      <tr>
                        <td><input type="text" name="qty[]" class="form-control" placeholder="Enter qty" /></td>
                        <td><input type="text" name="price[]" class="form-control" placeholder="Enter price" /></td>
                        <td>
                        <button type="button" class="btn btn-danger btn-sm btn-remove-row">x</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-info btn-sm btn-add-row">+</button>
                        </td>
                        </tr>
                  @endif
                </tbody>
              </table>
            </div>

          <div class="row mt-3"> 
            <div class="col-lg-6 col-md-6 col-12 mb-2">
              <label>Price</label>
                <input type="text" class="form-control" placeholder="Price" name="total" value="{{ !empty($package->price) ? $package->price : "" }}">
          </div>
          <div class="col-lg-6 col-md-6 col-12 mb-2">
            <label>Image</label>
          <input type="file" class="form-control" name="image">
          </div>
          
          </div>
		 
    </div>

    

                     <div class="d-flex justify-content-end">
													<button type="submit" class="add-btn" >{{ $button_text }}</button>
												</div>
</div>          
                               
                            </div>
                        </div>

</form>
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



