@extends('frontEnd.layouts.master')
@section('title','Password Recover')
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
						<form action="{{url('auth/seller/password/forget/recovery')}}" method="POST">
							@csrf
							<div class="form-group">
								<input type="hidden" name="sellerEmail" value="{{Session::get('sellerEmail')}}">
								<input type="password" class="form-control {{$errors->has('snewpassword')? 'is-invalid' : ''}}" placeholder="New Password" name="snewpassword" value="{{old('snewpassword')}}">
				                  @if($errors->has('snewpassword'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('snewpassword')}}</strong>
				                    </span>
				                  @endif
							</div>
							<div class="form-group">
			                  <input type="password" name="confirmed" class="form-control  {{$errors->has('confirmed')? 'is-invalid' : ''}}" id="confirmed" placeholder="Confirm Password" >
			                  @if($errors->has('confirmed'))
			                    <span class="invalid-feedback" role="alert">
			                      <strong>{{$errors->first('confirmed')}}</strong>
			                    </span>
			                  @endif
			                </div>
			                <!-- form group -->
							<div class="form-group">
								<input type="submit" value="Submit" class="registerbtn">
							</div>
						</form>
						
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