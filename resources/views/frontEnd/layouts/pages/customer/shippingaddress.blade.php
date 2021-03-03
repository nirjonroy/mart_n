@extends('frontEnd.layouts.master')
@section('title','Customer shipping address')
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
              <li><a class="anchor"> Account</a> <span>/</span></li>
              <li><a class="anchor">Shipping Address</a></li>
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
                                        <p class="account-title">Shipping Address</p>
                                         <form action="{{url('/shipping/information')}}" method="POST" class="form-row">
                    						@csrf
		                    					@php
					                                $customerId=Session::get('customerId');
					                             @endphp
                    						<input type="hidden" value="{{$customerId}}" name="customerid">
                                        	<div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="name">Full Name <span>*</span></label>
		                                          <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{old('name')}}" required="required">
		                                          @if ($errors->has('name'))
		                                          <span class="invalid-feedback" role="alert">
		                                            <strong>{{ $errors->first('name') }}</strong>
		                                          </span>
		                                          @endif
		                                        </div>
		                                      </div>
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="phone">Contact Number <span>*</span></label>
		                                          <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{old('phone')}}" required="required">
		                                          @if ($errors->has('phone'))
		                                          <span class="invalid-feedback" role="alert">
		                                            <strong>{{ $errors->first('phone') }}</strong>
		                                          </span>
		                                          @endif
		                                        </div>
		                                      </div>
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="district">District <span>*</span></label>
		                                          <select name="district" id="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}"  value="{{old('district')}}" required="required">
		                                            <option value="{{url('laravel')}}">Select Disctict</option>
		                                            @foreach($districts as $district)
		                                            <option value="{{$district->id}}">{{$district->name}}</option>
		                                            @endforeach
		                                          </select>

		                                            @if ($errors->has('district'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('district') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="area">Thana/Area <span>*</span></label>
		                                          <select name="area" id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"  value="{{old('area')}}" required="required">
		                                          </select>

		                                            @if ($errors->has('area'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('area') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>               
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="stateaddress">State </label>
		                                          <input type="text" name="stateaddress" class="form-control{{ $errors->has('stateaddress') ? ' is-invalid' : '' }}"  value="{{old('stateaddress')}}">

		                                            @if ($errors->has('stateaddress'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('stateaddress') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>             
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="houseaddress">House Address <span>*</span></label>
		                                          <input type="text" name="houseaddress" class="form-control{{ $errors->has('houseaddress') ? ' is-invalid' : '' }}"  value="{{old('houseaddress')}}" required="required">

		                                            @if ($errors->has('houseaddress'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('houseaddress') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>             
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="zipcode">Zip Code <span>*</span></label>
		                                          <input type="text" name="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}"  value="{{old('zipcode')}}" required="required">

		                                            @if ($errors->has('zipcode'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('zipcode') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>             
		                                      <div class="col-lg-6 col-md-6 col-sm-6">
		                                        <div class="form-group">
		                                          <label for="fulladdress">Additional Address</label>
		                                          <input type="text" name="fulladdress" class="form-control{{ $errors->has('fulladdress') ? ' is-invalid' : '' }}"  value="{{old('fulladdress')}}">

		                                            @if ($errors->has('fulladdress'))
		                                              <span class="invalid-feedback" role="alert">
		                                                <strong>{{ $errors->first('fulladdress') }}</strong>
		                                              </span>
		                                              @endif
		                                        </div>
		                                      </div>
		                                      <div class="col-md-6 col-sm-6 text-left">
		                                      	<input type="submit" class="registerbtn" value="save">
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
@endsection