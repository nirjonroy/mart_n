@extends('frontEnd.layouts.master')
@section('title','Customer profile')
@section('content')
  <section class="breadcrumb-area dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="custom-breadcrumb">
            <ul>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div id="hidemenu" class="hidemenu sidebar-menu">
                    @include('frontEnd.layouts.includes.sidebar')
                  </div>
                </div>
              </div>
              <!-- sidebar-menu end -->
              <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a> <span>/</span></li>
              <li><a class="anchor"> Customer</a> <span>/</span></li>
              <li><a class="anchor"> Profile</a> <span>/</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--custom breadcrumb end-->
	<section class="customer-profile ">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="paddleft-120 col-lg-12 col-md-12 col-sm-12">
	                <div class="customer-profile">
	                    <div class="row">
	                        <div class="col-lg-3 col-sm-3 col-md-3">
	                            <div class="cprofile-sidebar">
	                                @include('frontEnd.layouts.pages.customer.sidebar')
	                            </div>
	                        </div>
	                        <!-- col end -->
	                        <div class="col-lg-9 col-md-9 col-sm-9">
	                            <div class="cprofile-details">
	                                <p class="account-title">Customer Profile</p>
	                                <table class="table table-bordered text-left">
	                                    <tbody>
	                                        <tr>
	                                            <td>Profile Picture</td>
	                                            <td> <img type="file" src="{{asset($customerInfo->image)}}"  name="image" class="backend_img" alt=""></td>
	                                        </tr>
	                                        <tr>
	                                            <td>Name</td>
	                                            <td>{{$customerInfo->fullName}}</td>
	                                        </tr>
	                                        <tr>
	                                            <td>Phone Number</td>
	                                            <td>{{$customerInfo->phoneNumber}}</td>
	                                        </tr>
	                                        <tr>
	                                            <td>Address</td>
	                                            <td>{{$customerInfo->address}}</td>
	                                        </tr>
	                                            <td>My Point</td>
	                                            <td>{{$customerInfo->mypoint}}</td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
<script type="text/javascript">
    document.forms['editForm'].elements['district'].value="{{$customerInfo->district}}"
</script>
@endsection