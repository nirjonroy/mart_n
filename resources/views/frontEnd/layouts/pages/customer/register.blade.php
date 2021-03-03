 @extends('frontEnd.layouts.master')
 @section('title','Register')
 @section('content')
    <section class="common-design dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3"></div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="customer-register">
                        <div class="title">
                            <h5>Signup With Mart9294</h5>
                        </div>
                        <form action="{{url('customer/register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                               <input type="text" class="form-control {{$errors->has('fullName')? 'is-invalid' : ''}}" value="{{ old('fullName') }}" placeholder="Your Name"  name="fullName" id="fullName">

                                 @if ($errors->has('fullName'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('fullName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('email')? 'is-invalid' : ''}}" value="{{ old('email') }}"  name="email" placeholder="Your Email Address" id="email" required>
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('phoneNumber')? 'is-invalid' : ''}}" value="{{old('phoneNumber')}}" placeholder="Mobile Number (For order status update)" name="phoneNumber"  id="phoneNumber" required>
                                 @if ($errors->has('phoneNumber'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control {{$errors->has('password')? 'is-invalid' : ''}}" value="{{ old('password') }}" placeholder="Your Password"  name="password" id="password" required>
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" value="register" class="registerbtn">
                            </div>
                            
                        </form>
                        <div class="allready-caccount">
                            <p>Already have an account? <a href="{{url('customer/login')}}">Login!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection