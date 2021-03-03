@extends('frontEnd.layouts.master')
@section('title','Login')
@section('content')
	@include('frontEnd.layouts.includes.flash-message')
	<section class="marchant-login common-design dark-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="customer-register marchantl-pannel">
						<div class="title">
							<h5>Login With Mart9294</h5>
						</div>
						<form action="{{url('auth/seller/login')}}" method="POST">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control {{$errors->has('phoneOremail')? 'is-invalid' : ''}}" placeholder="Phone Or Email" name="phoneOremail" value="{{old('phoneOremail')}}">
				                  @if($errors->has('phoneOremail'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('phoneOremail')}}</strong>
				                    </span>
				                  @endif
							</div>
							<div class="form-group">
								<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Your Password" name="password"  value="{{old('password')}}" >
				                  @if ($errors->has('password'))
				                  <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('password') }}</strong>
				                  </span>
				                  @endif
							</div>
							<div class="form-group">
								<input type="submit" value="Login" class="registerbtn">
							</div>
						</form>
						<div class="loginpanel-footer">
							<p>Don't have an account? <a href="{{url('register/seller')}}">Sign up</a></p>
							<p><a href="{{url('forget/password/seller')}}">Forgot Password</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======script js end======= -->
	<script>
		  $(".alert").delay(4000).fadeOut(2000, function() {
			    $(this).alert('close');
			});
	</script>

@endsection