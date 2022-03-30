@extends('admin.layouts.dashboard')

@php
  $title = "Add Item";
  $button_text = "Add Item";
  if($item->exists) {
    $title = "Edit Item";
    $button_text = "Update Item";
  }
@endphp

@section('title', $title)


@section('content')

 @if($item->exists)
    <form method="POST" action="{{ route('admin.items.update', $item) }}" enctype="multipart/form-data">
@method('put')
@else
  <form method="POST" action="{{ route('admin.items.store') }}" enctype="multipart/form-data">
@endif
    @csrf

<div class="container-fluid">         
                    
<div class="row">
 
    <div class="col-lg-2 col-md-4 p-3 bg-shad m-2 bg-active" id="general_click">
    
        <h5 class="pinkit">General Info.</h5>
        <p class="psmall">Setup Basic Product Details</p>
    </div>

    <div class="col-lg-2 col-md-4 p-3 bg-shad m-2" id="inventory_click">
    
        <h5>Inventory  Details</h5>
        <p class="psmall">Stock & Pricing Options</p>
    </div>


    <div class="col-lg-2 col-md-4 p-3 bg-shad m-2" id="variant_click">
    
        <h5>Options & Variants</h5>
        <p class="psmall">Add Option details</p>
    </div>


    <div class="col-lg-2 col-md-4 p-3 bg-shad m-2" id="attribute_click">
    
        <h5>Product Attribute</h5>
        <p class="psmall">Product Specifications</p>
    </div>

    <div class="col-lg-2 col-md-4 p-3 bg-shad m-2" id="media_click">
    
        <h5>Product Media</h5>
        <p class="psmall">Add Option Based Product Media</p>
    </div>

</div>
<div class="mt-5 bg-white p-3" id="general_div">

<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-3 p-2">
         <label>Product Type<span style="color:red;">*</span></label>
        <select class="selectpicker form-control1" id="product_type" name="product_type" required="">
            <option value="" disabled="" selected="" hidden="">Product Type</option>
            <option value="physical">Physical</option>
            <option value="digital">Digital</option>                                      
        </select>

    </div> 

       <div class="col-md-12 col-lg-3 form-outline p-2">
         <label>Product Title<span style="color:red;">*</span></label>
        <input type="text" name="product_title" id="" placeholder="Product title" class="form-control2 ">
    </div>

    <div class="col-sm-12 col-md-12 col-lg-3 p-2">

         <label>Brand</label>
        <select class="selectpicker form-control1" id="brand" name="brand" required="">
            <option value="" disabled="" selected="" hidden="">Brand</option>
            <option value="1">ABCDEF</option>
            <option value="2">GHIJKL</option>                                      
        </select>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-3 p-2">

         <label>Category<span style="color:red;">*</span></label>
        <select class="selectpicker form-control1" id="category" name="category" required="">
            <option value="" disabled="" selected="" hidden="">Category</option>
            @foreach($categories as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
                                                  
        </select>
  
    </div>

    {{-- <div class="col-sm-12 col-md-12 col-lg-12 p-2">

        <label>Description</label>
         <textarea id="basic-example"></textarea>

    </div> --}}


<div class="content">

<div id="alerts"></div>
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
		    <div class="dropdown-menu input-append">
			    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
			    <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>

    <div id="editor" contenteditable="true"> Enter your text here.. </div>
    
<textarea rows="2" name="desc" cols="20" style="display:none; " > Enter your text here.. </textarea>
    

<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>
<br/>
<input type="submit" value="Submit" name="B1" class="btn btn-primary btn-large"></div>    
    
    

    <div class="col-md-12 col-lg-3 form-outline p-2">
      <label>Model No.</label>
        <input type="text" name="model" id="model" placeholder="Model No." class="form-control2">
    </div>

    <div class="col-sm-12 col-md-12 col-lg-3 p-2">

         <label>Tax Category<span style="color:red;">*</span></label>
        <select class="selectpicker form-control1" id="tax_category" name="tax_category" required="">
            <option value="" disabled="" selected="" hidden="">Tax Category</option>
            <option value="tax">Tax</option>
        </select>
  
    </div>

    

    <div class="col-sm-12 col-md-12 col-lg-3 p-2">

         <label>Product Condition<span style="color:red;">*</span></label>
        <select class="selectpicker form-control1" id="product_condition" name="product_condition" required="">
            <option value="" disabled="" selected="" hidden="">Product Condition </option>
            <option value="old">Old</option>
            <option value="new">New</option>
            <option value="refurbished">Refurbished</option>                                      
        </select>

    </div>

    <div class="col-md-12 col-lg-3 form-outline p-2">
         <label>Warranty(Days)<span style="color:red;">*</span></label>
        <input type="number" name="warranty" id="warranty" placeholder="Warranty" class="form-control2 ">
    </div>

    <div class="col-md-12 col-lg-3 form-outline p-2">
         <label>Return(Days)<span style="color:red;">*</span></label>
        <input type="number" name="return" id="return" placeholder="Return (Days)" class="form-control2 ">
    </div>




    <div class="col-md-12 col-lg-3 form-outline p-2">
         <textarea id="basic-example">
  
</textarea>
    </div>





    </div>
        <div class="row mt-5">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn-blu-login " data-bs-toggle="modal" data-bs-target="">DISACRD</a>
                <span class="ml-3" id="general_next"> <a href="#" class="btn-blu-login">NEXT <i class="fas text-white fa-arrow-right"></i> </a></span>
            </div>
        </div>

    </div>
<!-- --------------------------------Section 2--------------------------- -->
  <div class="p-3 bg-white d-none mt-5" id="inventory_div">
        <div class="row ">	
            
            <div class="col-md-12 col-lg-10">
              <p class="ptext">  Do you want to track inventory for this product?</p>
            </div>

            <div class="col-md-12 col-lg-2 form-outline">
                <span class="ml-3 mr-4">
                    <input class="form-check-input" type="radio" name="track_inventory" value="1" checked>
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Yes
                    </label>
                    </span>
                    <span class="ml-3" >
                    <input class="form-check-input" type="radio" name="track_inventory" value="0">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    No
                    </label>   
                </span>           
            </div>
        </div>



        <div class="row ">	
            
            <div class="col-md-12 col-lg-8">
              <p class="ptext">  You want to sell this product as?</p>
            </div>

            <div class="col-md-12 col-lg-4 form-outline">
                <span class="ml-3 mr-4">
                    <input class="form-check-input" type="radio" name="want_sell" value="shipping">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Shipping
                    </label>
                    </span>
                    <span class="ml-3 mr-4" >
                    <input class="form-check-input" type="radio" name="want_sell" value="pickup">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Pick Up
                    </label>   
                </span>   
                <span class="ml-3" >
                    <input class="form-check-input" type="radio" name="want_sell" value="both" checked>
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Both
                    </label>   
                </span>                   
            </div>
        </div>



        <div class="row ">	
            
            <div class="col-md-12 col-lg-10">
              <p class="ptext">  Continue selling when out of stock</p>
            </div>

            <div class="col-md-12 col-lg-2 form-outline">
                <span class="ml-3 mr-4">
                    <input class="form-check-input" type="radio" name="continue_selling" value="1" checked>
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Yes
                    </label>
                    </span>
                    <span class="ml-3" >
                    <input class="form-check-input" type="radio" name="continue_selling" value="0">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    No
                    </label>   
                </span>           
            </div>
        </div>



        <div class="row ">	
            
            <div class="col-md-12 col-lg-10">
              <p class="ptext">  Available for Cash on Delivery</p>
            </div>

            <div class="col-md-12 col-lg-2 form-outline">
                <span class="ml-3 mr-4">
                    <input class="form-check-input" type="radio" name="cash_on_delivery" value="1" checked>
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    Yes
                    </label>
                    </span>
                    <span class="ml-3" >
                    <input class="form-check-input" type="radio" name="cash_on_delivery" value="0">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    No
                    </label>   
                </span>           
            </div>
        </div>


        <div class="row ">	
            
            <div class="col-md-12 col-lg-10">
              <p class="ptext">  Availabel for Gift Wrap</p>
            </div>

            <div class="col-md-12 col-lg-2 form-outline">
                <span class="ml-3 mr-4">
                    <input class="form-check-input" type="radio" name="gift_wrap" value="1" checked>
                    <label class="form-check-label clabel" for="flexRadioDefault1">
                    Yes
                    </label>
                    </span>
                    <span class="ml-3" >
                    <input class="form-check-input" type="radio" name="gift_wrap" value="0">
                    <label class="form-check-label ptext" for="flexRadioDefault1">
                    No
                    </label>   
                </span>           
            </div>
        </div>

<div class="row mt-3">
    <div class="col-md-12 col-lg-3 form-outline p-2">
    <label>Minimum Purchase Quantity<span style="color:red;">*</span></label>
        <input type="number" name="min_purchase" id="" placeholder="Minimum Purchase Quantity *" class="form-control2 ">
    </div>

    <div class="col-md-12 col-lg-3 form-outline p-2">
    <label>Maximum Purchase Quantity<span style="color:red;">*</span></label>
        <input type="number" name="max_purchase" id="" placeholder="Maximum Purchase Quantity *" class="form-control2 ">
    </div>

    <div class="col-md-12 col-lg-3 form-outline p-2">
    <label>Stock Alert Quantity<span style="color:red;">*</span></label>
        <input type="number" name="stock_alert" id="" placeholder="Stock Alert Quantity *" class="form-control2 ">
    </div>

    <div class="col-md-12 col-lg-3 form-outline p-2">
    <label>Cost Price <span style="color:red;">*</span></label>
        <input type="number" name="cost_price" id="" placeholder="Cost Price *" class="form-control2 ">
    </div>

</div>
        

<div class="row  mt-5">
    <div class="d-flex justify-content-end">
        <a href="#" class="btn-blu-login " data-bs-toggle="modal" data-bs-target="">DISACRD</a>
        <span class="ml-3 mr-3" id="inventory_previous"> <a href="#" class="btn-blu-login"><i class="fas text-white fa-arrow-left"></i> PREVIOUS</a></span>
        <span class="ml-3 mr-3" id="inventory_next"> <a href="#" class="btn-blu-login">NEXT <i class="fas text-white fa-arrow-right"></i> </a></span>
    </div>
</div>



   </div>
<!-- --------------------------------Section 3--------------------------- -->

<div class="bg-white p-3 mt-5 d-none" id="variant_div">
    <div class="row ">	
            
        <div class="col-md-12 col-lg-10">
          <p class="ptext">  This product has multiple options, like different sizes or colors</p>
        </div>

        <div class="col-md-12 col-lg-2 form-outline">
            <span class="ml-3 mr-4">
                <input class="form-check-input" type="radio" name="Inventory" value="1">
                <label class="form-check-label ptext" for="flexRadioDefault1">
                Yes
                </label>
                </span>
                <span class="ml-3" >
                <input class="form-check-input" type="radio" name="Inventory" value="0">
                <label class="form-check-label ptext" for="flexRadioDefault1">
                No
                </label>   
            </span>           
        </div>
    </div>

    <div class="row ">	
            
        <div class="col-md-12 col-lg-3">
          <p class="ptext mt-3">Option 1</p>
        </div>


        <div class="col-sm-12 col-md-12 col-lg-3 p-2">

            <select class="selectpicker form-control1" id="type" name="type">
                <option value="" disabled="" >Select Option</option>
                <option value="1" selected="" >Color</option>
                <option value="2">Size</option>
                <option value="3">Carat</option>                                      
                <option value="4">Clarity</option>                                      
                <option value="5">Strap</option>                                      
            </select>
    
        </div>
        <div class="col-md-12 col-lg-4 form-outline p-2">
            <input type="number" name="type-product" id="" placeholder="Add Tag *" class="form-control2 ">
        </div>

        <div class="col-md-12 col-lg-2 form-outline p-2">
            
            
            <div class="actions">
                <a href="#" title="Delete"><i class="fas faslls fa-trash-alt ml-4"></i></a>
                <span class="ml-4"> <a href="#" title="Add"><i class="fas faslls fa-plus"></i></a> </span>
                </a>
            </div>

        </div>
    </div>


    <div class="row p-5 ">
        <div class="bor-uplo p-2">
            
            <table class=" table table-justified">
                <thead >
                    <tr>
                        <th class="fw-bold text-dark">Variant</th>
                        <th class="fw-bold text-dark">Price(excl.tax)</th>
                         <th class="fw-bold text-dark">Quantity</th> 
                         <th class="fw-bold text-dark">SKY</th> 
                        
                    </tr>
                 </thead>
                
                
                
                <tbody>
                <tr>
                <td scope="row">6546</td>
                 <td>11/04/2022</td>
                 <td>Addan</td> 
                 <td><i class="fas fa-rupee-sign"></i> 2565</td> 
                 </tr>
                 
                
                </tbody>
            </table>





        </div>
    </div>

    <div class="row ">	
            
        <div class="col-md-12 col-lg-8">
          <p class="ptext">  Select Default Product Variant  </p>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-3 p-2">

            <select class="selectpicker form-control1" id="type" name="type">
                <option value="" disabled="" >Select Option</option>
                                       
            </select>
    
        </div>
    </div>


    <div class="row  mt-5">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn-blu-login " data-bs-toggle="modal" data-bs-target="">DISACRD</a>
            <span class="ml-3 mr-3" id="variant_previous"> <a href="#" class="btn-blu-login"><i class="fas text-white fa-arrow-left"></i> PREVIOUS</a></span>
            <span class="ml-3 mr-3" id="variant_next"> <a href="#" class="btn-blu-login">NEXT <i class="fas text-white fa-arrow-right"></i> </a></span>
        </div>
    </div>


</div>
<!-- ---------------------------------------------section4-------------------------- -->
<div class="bg-white p-3 mt-5 d-none" id="attribute_div">
    <div class="row ">	
        <h5 >Attributes</h5>
    </div>
    <div class="row ">	
            
        <div class="col-md-12 col-lg-4">
          <p class="ptext mt-3">Country of origin<span style="color: red">*</span></p>
        </div>

        <div class="col-md-12 col-lg-8">
          <select class="selectpicker form-control1" id="country" name="country" required="">
                <option value="" disabled selected hidden>Select Option</option>
                <option value="india">India</option>
            </select>
        </div>


        <div class="col-md-12 col-lg-4">
            <p class="ptext mt-3">Weight<span style="color: red">*</span></p>
        </div>
  
        <div class="col-sm-12 col-md-12 col-lg-4 p-2">  
            <select class="selectpicker form-control1" id="weight_type" name="weight_type" required="">
                <option value="" disabled="" hidden selected>Select Weight</option>
                <option value="1">gm</option>
                <option value="2">Kg</option>
            </select>      
        </div>

        <div class="col-sm-12 col-md-12 col-lg-4 p-2">  
            <input type="number" name="weight" id="weight" placeholder="Weight " class="form-control2 ">    
        </div>

    </div>
    <div class="row p-2">
        <div class="bg-light p-2">
            <div class="row ">
                <div class="col-lg-6 col-md-12">
                    <label class="txt-styel">ISBN </label>
                    <input type="text" name="isbn" id="" placeholder="ISBN " class="form-control2 "> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="txt-styel">HSN </label>
                    <input type="text" name="hsn" id="" placeholder="HSN " class="form-control2 "> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="txt-styel">SAC </label>
                    <input type="text" name="sac" id="" placeholder="SAC " class="form-control2 "> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="txt-styel">UPC </label>
                    <input type="text" name="upc" id="" placeholder="UPC " class="form-control2 "> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="txt-styel">File: </label>
                    <input type="text" name="file_size" id="" placeholder="File: " class="form-control2 "> 
                </div>


                <div class="col-md-12 col-lg-6 form-outline  position-relative">
                    <label class="txt-styel">UPLOAD</label>
                    <input type="file" id="attribute_image" name="attribute_image" class="file-box">
					         <p>Max file size is 1MB and max number of file is 1.</p>
                </div>
            </div>
        </div>
    </div>




    <div class="row  mt-5">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn-blu-login " data-bs-toggle="modal" data-bs-target="">DISACRD</a>
            <span class="ml-3 mr-3" id="attribute_previous"> <a href="#" class="btn-blu-login" ><i class="fas text-white fa-arrow-left"></i> PREVIOUS</a></span>
            <span class="ml-3 mr-3" id="attribute_next"> <a href="#" class="btn-blu-login">NEXT <i class="fas text-white fa-arrow-right"></i> </a></span>
        </div>
    </div>

</div>

<!-- ---------------------------------------------section5-------------------------- -->

<div class="d-none bg-white mt-5 p-3 row" id="media_div">
<div class="col-lg-3 col-md-12 col-sm-12">
<p class="ptext h5"> Images</p>
</div>
<div class="col-lg-9">
   <input type="file" id="product_image" name="product_image" class="file-box">
<p class="text-secondary mt-2"><b> Image Disclaimer: </b>File type must be a .jpg, .gif or .png smaller than 2MB and at least 800x1067 in 3:4 aspect ratio</p>
</div>

<div class="col-md-12 col-lg-3 form-outline p-2">
<p class="ptext h5"> Video</p>
</div>

<div class="col-md-12 col-lg-9 form-outline p-2">
        <input type="text" name="video_url" id="video_url" placeholder="Video Url" class="form-control2 ">
</div>

<div class="col-md-12 col-lg-3 form-outline p-2">
<p class="ptext h5"> Product Published</p>
</div>

<div class="col-md-12 col-lg-9 form-outline p-2">
<select class="selectpicker form-control1" id="publish" name="publish" required="">
                <option value="" disabled="" >Product Published</option>
                <option value="1" selected="" >Yes</option>
                <option value="2">No</option>
            </select> 
</div>


<div class="col-md-12 col-lg-3 form-outline p-2">
<p class="ptext h5"> Product Published From</p>
</div>

<div class="col-md-12 col-lg-9 form-outline p-2">
        <input type="date" name="publish_from" id=""  class="form-control2 ">
</div>



<div class="row  mt-5">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn-blu-login " data-bs-toggle="modal" data-bs-target="">DISACRD</a>
            <span class="ml-3 mr-3" id="media_previous"> <a href="#" class="btn-blu-login"><i class="fas text-white fa-arrow-left"></i> PREVIOUS</a></span>
         <button class="btn-blu-login">SUBMIT </button>
        </div>
    </div>

</div>

</div>
  </form>

@endsection


{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('external/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('external/google-code-prettify/prettify.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysiwyg.js') }}"></script>






<script>




 $( document ).ready(function() {

     $("#general_click").click(function(){

         document.getElementById('general_div').classList.remove('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.add('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');
    });

    $("#inventory_click").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.remove('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.add('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#variant_click").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.remove('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.add('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#attribute_click").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.remove('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.add('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#media_click").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.remove('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.add('bg-active');

    });

    // for next button

    $("#general_next").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.remove('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.add('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

     $("#inventory_next").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.remove('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.add('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#variant_next").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.remove('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.add('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#attribute_next").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.remove('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.add('bg-active');

    });

    // for previous button


     $("#inventory_previous").click(function(){

         document.getElementById('general_div').classList.remove('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.add('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#variant_previous").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.remove('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.add('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#attribute_previous").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.remove('d-none');
         document.getElementById('attribute_div').classList.add('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.add('bg-active');
         document.getElementById('attribute_click').classList.remove('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

    $("#media_previous").click(function(){

         document.getElementById('general_div').classList.add('d-none');
         document.getElementById('inventory_div').classList.add('d-none');
         document.getElementById('variant_div').classList.add('d-none');
         document.getElementById('attribute_div').classList.remove('d-none');
         document.getElementById('media_div').classList.add('d-none');

         document.getElementById('general_click').classList.remove('bg-active');
         document.getElementById('inventory_click').classList.remove('bg-active');
         document.getElementById('variant_click').classList.remove('bg-active');
         document.getElementById('attribute_click').classList.add('bg-active');
         document.getElementById('media_click').classList.remove('bg-active');

    });

});

</script>