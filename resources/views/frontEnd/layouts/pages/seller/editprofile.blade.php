@extends('frontEnd.layouts.pages.seller.sellermaster')
@section('sellertitle','Seller Edit Profile')
@section('sellercontent')
@include('frontEnd.layouts.includes.flash-message')
<div class="seller-breadcrumb">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-left">
				<h6> <strong>Edit Profile</strong></h6>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-right">
				<ul>
					<li><a href="{{url('me/seller')}}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
					<li><a class="anchor" >-</a></li>
					<li><a class="anchor" >Edit Profile</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="mcontent-body">
	<div class="row">
		<div class="col-sm-12">
			<div class="custom-form">
				<form action="{{url('auth/seller/profile/edit')}}" method="POST" enctype="multipart/form-data">
				@csrf 

					@php
		                 $SellerId = Session::get('SellerId');
		            @endphp
					<input type="hidden" name="hidden_id" value="{{$SellerId}}">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="shopname">Shop Name</label>
								<input type="text" class="form-control {{$errors->has('shopname')? 'is-invalid' : ''}}" name="shopname"  value="{{$editprofile->shopname}}">
								@if($errors->has('shopname'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('shopname')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="contperson">Contact Person</label>
								<input type="text" class="form-control {{$errors->has('contperson')? 'is-invalid' : ''}}" name="contperson"  value="{{$editprofile->contperson}}">
								@if($errors->has('contperson'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('contperson')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerphone">Phone</label>
								<input type="text" class="form-control {{$errors->has('sellerphone')? 'is-invalid' : ''}}" name="sellerphone"  value="{{$editprofile->sellerphone}}">
								@if($errors->has('sellerphone'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerphone')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerphone2">Optional Phone</label>
								<input type="text" class="form-control {{$errors->has('sellerphone2')? 'is-invalid' : ''}}" name="sellerphone2"  value="{{$editprofile->sellerphone2}}">
								@if($errors->has('sellerphone2'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerphone2')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="selleremail">Email</label>
								<input type="text" class="form-control {{$errors->has('selleremail')? 'is-invalid' : ''}}" name="selleremail"  value="{{$editprofile->selleremail}}">
								@if($errors->has('selleremail'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('selleremail')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerwebsite">Website</label>
								<input type="text" class="form-control {{$errors->has('sellerwebsite')? 'is-invalid' : ''}}" name="sellerwebsite"  value="{{$editprofile->sellerwebsite}}">
								@if($errors->has('sellerwebsite'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerwebsite')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerbankaccount">Bank Account</label>
								<input type="text" class="form-control {{$errors->has('sellerbankaccount')? 'is-invalid' : ''}}" name="sellerbankaccount"  value="{{$editprofile->sellerbankaccount}}">
								@if($errors->has('sellerbankaccount'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerbankaccount')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerbankname">Bank Name</label>
								<input type="text" class="form-control {{$errors->has('sellerbankname')? 'is-invalid' : ''}}" name="sellerbankname"  value="{{$editprofile->sellerbankname}}">
								@if($errors->has('sellerbankname'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerbankname')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerbankbranch">Bank Branch</label>
								<input type="text" class="form-control {{$errors->has('sellerbankbranch')? 'is-invalid' : ''}}" name="sellerbankbranch"  value="{{$editprofile->sellerbankbranch}}">
								@if($errors->has('sellerbankbranch'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerbankbranch')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="sellerroutingno">Bank Routing</label>
								<input type="text" class="form-control {{$errors->has('sellerroutingno')? 'is-invalid' : ''}}" name="sellerroutingno"  value="{{$editprofile->sellerroutingno}}">
								@if($errors->has('sellerroutingno'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellerroutingno')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="shoplogo">Shop Logo</label>
								<input type="file" class="form-control {{$errors->has('shoplogo')? 'is-invalid' : ''}}" name="shoplogo"  value="{{$editprofile->shoplogo}}">
								@if($errors->has('shoplogo'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('shoplogo')}}</strong>
				                    </span>
				                @endif
				               <img src="{{asset($editprofile->shoplogo)}}" alt="" class="selleredit">
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="shopbanner">Shop Banner</label>
								<input type="file" class="form-control {{$errors->has('shopbanner')? 'is-invalid' : ''}}" name="shopbanner"  value="{{$editprofile->shopbanner}}">
								@if($errors->has('shopbanner'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('shopbanner')}}</strong>
				                    </span>
				                @endif
				               <img src="{{asset($editprofile->shopbanner)}}" alt="" class="selleredit">
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label for="selleraddress">Seller Address</label>
								<textarea name="selleraddress" rows="4" class="form-control {{$errors->has('selleraddress')? 'is-invalid' : ''}}">{{$editprofile->selleraddress}}</textarea>
								@if($errors->has('selleraddress'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('selleraddress')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-sm-12">
							<div class="form-group">
								<input type="submit" value="Submit" class="registerbtn">
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- form end -->
			<div class="custom-form mrt-30">
				<form action="{{url('auth/seller/password/change')}}" method="POST" enctype="multipart/form-data">
				@csrf 
				<input type="hidden" name="hidden_id" value="{{$SellerId}}">
					<div class="row">
						<div class="col-sm-12">
							<h5>Change Password</h5>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label for="selleroldpassword">Old Password</label>
								<input type="password" class="form-control {{$errors->has('selleroldpassword')? 'is-invalid' : ''}}" name="selleroldpassword"  value="{{$editprofile->selleroldpassword}}">
								@if($errors->has('selleroldpassword'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('selleroldpassword')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label for="sellernewpassword">New Password</label>
								<input type="password" class="form-control {{$errors->has('sellernewpassword')? 'is-invalid' : ''}}" name="sellernewpassword"  value="{{$editprofile->sellernewpassword}}">
								@if($errors->has('sellernewpassword'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('sellernewpassword')}}</strong>
				                    </span>
				                @endif
							</div>
						</div>
						<!-- col end -->
						<div class="col-sm-12">
							<div class="form-group">
								<input type="submit" value="Change Password" class="registerbtn">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection