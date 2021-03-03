@extends('frontEnd.layouts.master')
@section('title','Forget Password')
@section('content')	
	@include('frontEnd.layouts.includes.flash-message')
	<section class="marchant-login common-design dark-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-2"></div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="customer-register marchantl-pannel">
						<div class="title">
							<h5>Forget Password Verify</h5>
						</div>
						<form action="{{url('auth/seller/password/forget/code/verify')}}" method="POST">
							@csrf
							<div class="form-group">
								<input type="hidden" name="sellerEmail" value="{{Session::get('sellerEmail')}}">
								<input type="text" class="form-control {{$errors->has('verifycode')? 'is-invalid' : ''}}" placeholder="Verify Code" name="verifycode" value="{{old('verifycode')}}">
				                  @if($errors->has('verifycode'))
				                    <span class="invalid-feedback" role="alert">
				                      <strong>{{$errors->first('verifycode')}}</strong>
				                    </span>
				                  @endif
							</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="registerbtn">
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection