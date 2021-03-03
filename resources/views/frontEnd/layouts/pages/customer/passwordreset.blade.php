 @extends('frontEnd.layouts.master')
 @section('title','Forget Password Reset')
 @section('content')
    <section class="common-design dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-3"></div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="customer-register">
            <div class="title">
              <h5>Forget Password</h5>
            </div>
            <form action="{{url('customer/forget-password/reset')}}" method="POST">
				@csrf
				  <div class="form-group">
					<label for="verifycode">Verify Code</label>
					<input type="text" name="verifycode" id="verifycode" class="form-control{{$errors->has('verifycode')? 'is-invalid' : ''}}" value="{{old('verifycode')}}">
					@if ($errors->has('verifycode'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('verifycode') }}</strong>
                        </span>
                    @endif
				</div>

				 <div class="form-group">
					<label for="newpassword">New Password</label>
					<input type="password" name="newpassword" id="newpassword" class="form-control{{$errors->has('newpassword')? 'is-invalid' : ''}}" value="{{old('newpassword')}}">
					@if ($errors->has('newpassword'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('newpassword') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group">
					<input type="submit" class="form-control registerbtn" value="send">
				</div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </section>
        
  @endsection