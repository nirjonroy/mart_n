@extends('frontEnd.layouts.master')
@section('title','Forget Password')
@section('content')	
	@include('frontEnd.layouts.includes.flash-message')
	<section class="marchant-login common-design dark-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="customer-register marchantl-pannel">
						<div class="title">
							<h5>Forget Password</h5>
						</div>
						<form action="{{url('auth/seller-check/password/forget')}}" method="POST">
							@csrf
							<div class="form-group">
								<label for="fullname">Email<span>*</span></label>
								<input type="text" class="form-control {{$errors->has('selleremail')? 'is-invalid' : ''}}" placeholder="Email" name="selleremail" value="{{old('selleremail')}}">
				                  @if($errors->has('selleremail'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('selleremail')}}</strong>
				                    </span>
				                  @endif
							</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="registerbtn">
							</div>
						</form>
						<div class="loginpanel-footer">
							<p>Don't have an account? <a href="{{url('register/seller')}}">Sign up</a></p>
							<p><a href="{{url('login/seller')}}">Sign In</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		  $(".alert").delay(4000).fadeOut(2000, function() {
			    $(this).alert('close');
			});
	</script>
	
@endsection