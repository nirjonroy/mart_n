<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mart9294 :: @yield('sellertitle','Seller Account')</title>
    <!--======css start========-->
     @foreach($faveicon as $key=>$value)
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset($value->faveicon)}}">
    @endforeach
    <!-- fabeicon css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/bootstrap.min.css">
     <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/font-awesome.min.css">
     <!-- font awesome 4.7 css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/all.min.css">
     <!-- font awesome 5.11 css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/animate.css">
     <!-- bootstrap css -->
  	<link rel="stylesheet" href="{{asset('public/backEnd')}}/plugins/select2/select2.min.css">
     <!-- select2 css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/summernote-lite.css">
    <!-- summernote css -->
   <link rel="stylesheet" href="{{asset('public/backEnd')}}/plugins/datatables/dataTables.bootstrap4.css}}">
   <!-- data table -->
  <link rel="stylesheet" href="{{asset('public/backEnd')}}/plugins/datatables/dataTables.bootstrap4.css">
    <!-- data table -->
    <!--<link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/normalize.css">-->
	<link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/main.css">
	
 	<link rel="stylesheet" href="{{asset('public/backEnd')}}/css/custom.css">
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/style.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/responsive.css">
    <!-- responsive css -->
    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="{{asset('public/frontEnd/')}}/js/jquery-3.4.1.min.js"></script>
	<!-- bootstrap js -->
	<!--======css end========-->

</head>
<body>	
	@include('frontEnd.layouts.includes.flash-message')
	<header>
		<div class="mheader-top">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-7">
					<div class="mheader-top-left">
						      <nav class="seller-mobile-menu">
                        		<ul>
                        			<li><a href="#" class="icon icon-menu" id="btn-menu"><i class="fas fa-bars"></i></a></li>
                        		</ul>
                        	</nav>
                        	<div id="sideNav">
                        		<ul>
                        			<li><a href="{{url('/me/seller')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        			<li><a href="{{url('/me/seller/edit/profile')}}"><i class="fas fa-edit"></i> Edit Profile</a></li>
                        			<li><a href="{{url('/me/seller/new/product')}}"><i class="fas fa-shopping-cart"></i> Upload Product</a></li>
                        			<li><a href="{{url('/me/seller/manage/product')}}"><i class="fas fa-cogs"></i> Product Manage</a></li>
                        			<li><a href="{{url('/me/seller/order/manage')}}"><i class="fas fa-shopping-bag"></i> Order</a></li>
                        			<li><a href="{{url('/me/seller/logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        		</ul>
                        	</div>
                        <!--End Menu-->
                        
						<div class="elogo">
						    @php
            	                 $SellerId = Session::get('SellerId');
            	                 $sellerInfo=App\Seller::where(['id'=>$SellerId])->first();
            	            @endphp
							<a href="{{url('me/seller')}}" target="_blank">
                                <img src="{{asset($sellerInfo->shoplogo)}}" style="height:80px" alt="">
                                
							</a>
						</div>
					</div>
				</div>
				<!-- col-4 -->
				<div class="col-lg-8 col-md-8 col-sm-6 col-5">
					<div class="mheader-top-right">
						<ul>
							<li><a href="{{url('/')}}" target="_blank"><i class="fas fa-tv"></i> Visit Shop</a></li>
						</ul>
					</div>
				</div>
				<!-- col-4 -->
			</div>
		</div>
	</header>
	
        
	<div class="mleft-nav">
		<div class="title">
			<a href="{{url('/me/seller')}}">
				@if($sellerInfo) {{$sellerInfo->shopname}} @endif
			</a>
		</div>
		<div class="close-mleft-nav">
			<a class="anchor">
				<i class="fas fa-times"></i>
			</a>
		</div>
		<ul>
			<li><a href="{{url('/me/seller')}}"><i class="fas fa-home"></i> Dashboard</a></li>
			<li><a href="{{url('/me/seller/edit/profile')}}"><i class="fas fa-edit"></i> Edit Profile</a></li>
			<li><a href="{{url('/me/seller/new/product')}}"><i class="fas fa-shopping-cart"></i> Upload Product</a></li>
			<li><a href="{{url('/me/seller/manage/product')}}"><i class="fas fa-cogs"></i> Product Manage</a></li>
			<li><a href="{{url('/me/seller/order/manage')}}"><i class="fas fa-shopping-bag"></i> Order</a></li>
			<li><a href="{{url('/me/seller/logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
		</ul>
	</div>
	<section class="mcontent">
		@yield('sellercontent')
	</section>
	<script src="{{asset('public/frontEnd/')}}/js/jquery.ajax.js"></script>
	<!-- scrollUp js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
	
    <!-- scrollUp js -->
	<script src="{{asset('public/frontEnd/')}}/js/bootstrap.min.js"></script>
	<!-- bootstrap js -->
	
	<script type="text/javascript" src="{{asset('public/frontEnd/')}}/js/gnmenu.js"></script>
	
	<script src="{{asset('public/backEnd')}}/plugins/select2/select2.full.min.js"></script>
	<script>
	  $(function () {
	   $('.select2').select2()
	       });
	</script>
	<script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });

        });
        // 
    </script>
	<script src="{{asset('public/frontEnd/')}}/js/summernote-lite.js"></script>
	<!-- summernote js -->
		<script>
        $(".textarea").summernote({
          callbacks: {
            // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
          }
        });
	 </script>
	<script src="{{asset('public/frontEnd/')}}/js/script.js"></script>
	<!-- script js -->
	<script type="text/javascript">
        $('#productcat').change(function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-subcategory')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productsubcat").empty();
                    $("#productsubcat").append('<option>=====select subcategory======</option>');
                    $.each(res,function(key,value){
                        $("#productsubcat").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productsubcat").empty();
                }
               }
            });
        }else{
            $("#productsubcat").empty();
            $("#productchildcat").empty();
        }      
       });
        // category end
        $('#productsubcat').on('change',function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-childsubcategory')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productchildcat").empty();
                     $("#productchildcat").append('<option value="0">==== select childcategory ====</option>');
                    $.each(res,function(key,value){
                        $("#productchildcat").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productchildcat").empty();
                }
               }
            });
        }else{
            $("#productchildcat").empty();
            $("#productchildcat").empty();
        }
            
       });
        $('#productsubcat').on('change',function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-brand')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productbrand").empty();
                     $("#productbrand").append('<option value="0">==== select brand ====</option>');
                    $.each(res,function(key,value){
                        $("#productbrand").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productbrand").empty();
                }
               }
            });
        }else{
            $("#productbrand").empty();
            $("#productbrand").empty();
        }
            
       });
    </script>
    <script>    
    $(".alert").delay(4000).fadeOut(2000, function() {
                $(this).alert('close');
            });
	</script>
	

</body>
</html>