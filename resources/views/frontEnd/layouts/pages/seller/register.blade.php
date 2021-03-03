@extends('frontEnd.layouts.master')
@section('title','Register')
@section('content')
	<section class="marchant-login common-design dark-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="customer-register marchantl-pannel">
						<div class="title">
							<h5>Signup With Mart9294</h5>
						</div>
						<form action="{{url('auth/seller/register')}}" method="POST">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control{{ $errors->has('shopname') ? ' is-invalid' : '' }}" value="{{ old('shopname') }}"  name="shopname" id="shopname" placeholder="Your Shop Name">
								 @if ($errors->has('shopname'))
	                              <span class="invalid-feedback">
	                                <strong>{{ $errors->first('shopname') }}</strong>
	                              </span>
	                             @endif
							</div>
							<div class="form-group">
								<input type="text" class="form-control{{ $errors->has('selleremail') ? ' is-invalid' : '' }}" value="{{ old('selleremail') }}"  name="selleremail" placeholder="Your Email" id="selleremail">
								 @if ($errors->has('selleremail'))
	                              <span class="invalid-feedback">
	                                <strong>{{ $errors->first('selleremail') }}</strong>
	                              </span>
	                             @endif
							</div>
							<div class="form-group">
								<input type="text" class="form-control{{ $errors->has('sellerphone') ? ' is-invalid' : '' }}" value="{{ old('sellerphone') }}"  name="sellerphone" placeholder="Your Phone Number" id="sellerphone">
								 @if ($errors->has('sellerphone'))
	                              <span class="invalid-feedback">
	                                <strong>{{ $errors->first('sellerphone') }}</strong>
	                              </span>
	                             @endif
							</div>
							<div class="form-group">
								<input type="submit" value="Register" class="registerbtn">
							</div>
						</form>
						<div class="loginpanel-footer">
							<p>have an account? <a href="{{url('login/seller')}}">Login</a></p>
							<p><a href="{{url('forget/password/seller/')}}">Forgot Password</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection