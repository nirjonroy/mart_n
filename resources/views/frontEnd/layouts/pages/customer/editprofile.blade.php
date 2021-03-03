@extends('frontEnd.layouts.master')
@section('title','Customer profile edit')
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
              <li><a class="anchor">Edit</a></li>
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
	                                <p class="account-title">Customer Profile Edit</p>
	                                 <form action="{{url('/customer/profile/information/update')}}" method="POST" class="form-row" name="editForm" enctype="multipart/form-data">
	            						@csrf
	            						<input type="hidden" value="{{$customerInfo->id}}" name="customerid">
	                                	<div class="col-lg-6 col-md-6 col-sm-6">
	                                        <div class="form-group">
	                                          <label for="name">Full Name <span>*</span></label>
	                                          <input type="text" name="fullName" class="form-control{{ $errors->has('fullName') ? ' is-invalid' : '' }}"  value="{{$customerInfo->fullName}}">
	                                          @if ($errors->has('fullName'))
	                                          <span class="invalid-feedback" role="alert">
	                                            <strong>{{ $errors->first('fullName') }}</strong>
	                                          </span>
	                                          @endif
	                                        </div>
	                                      </div>
	                                      <div class="col-lg-6 col-md-6 col-sm-6">
	                                        <div class="form-group">
	                                          <label for="phoneNumber">phone Number <span>*</span></label>
	                                          <input type="text" name="phoneNumber" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}"  value="{{$customerInfo->phoneNumber}}">
	                                          @if ($errors->has('phoneNumber'))
	                                          <span class="invalid-feedback" role="alert">
	                                            <strong>{{ $errors->first('phoneNumber') }}</strong>
	                                          </span>
	                                          @endif
	                                        </div>
	                                      </div>
	                                      <div class="col-lg-6 col-md-6 col-sm-6">
	                                        <div class="form-group">
	                                          <label for="image">Profile Image<span>*</span> (Size:150px*150px)</label>
	                                          <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"  value="{{$customerInfo->image}}">
	                                          <img type="file" src="{{asset($customerInfo->image)}}"  name="image" class="backend_img" alt="">
	                                          @if ($errors->has('image'))
	                                          <span class="invalid-feedback" role="alert">
	                                            <strong>{{ $errors->first('image') }}</strong>
	                                          </span>
	                                          @endif
	                                        </div>
	                                      </div>             
	                                      <div class="col-lg-6 col-md-6 col-sm-6">
	                                        <div class="form-group">
	                                          <label for="address">Full Address</label>
	                                          <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  >{!!$customerInfo->address!!}</textarea>

	                                            @if ($errors->has('address'))
	                                              <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $errors->first('address') }}</strong>
	                                              </span>
	                                              @endif
	                                        </div>
	                                      </div>
	                                      <div class="col-md-6 col-sm-6 text-left">
	                                      	<input type="submit" class="registerbtn" value="save update">
	                                      </div>
	                                </form>
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