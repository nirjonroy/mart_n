 @extends('frontEnd.layouts.master')
 @section('title','Forget Password')
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
            <form action="{{url('customer/forget-password')}}" method="POST">
                      @csrf
                       <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control{{$errors->has('email')? 'is-invalid' : ''}}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <input type="submit" class="form-control registerbtn" value="submit">
                      </div>
                    </form>
          </div>
        </div>
      </div>
    </div>
  </section>
        
  @endsection