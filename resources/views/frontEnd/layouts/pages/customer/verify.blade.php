 @extends('frontEnd.layouts.master')
 @section('title','Email Verification')
 @section('content')
 @include('frontEnd.layouts.includes.flash-message')
  <section class="common-design dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-3"></div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="customer-register customerrpanel mrt-45">
                        <div class="title">
                            <h5>Account Verification</h5>
                        </div>
                        <form action="{{url('customer/verified')}}" method="POST">
                            @csrf
                           <div class="form-group">
                                <label for="verifyPin">Pin Number <span>*</span></label>
                               <input type="text" class="form-control {{$errors->has('verifyPin')? 'is-invalid' : ''}}" value="{{ old('verifyPin') }}"  name="verifyPin" id="verifyPin">

                                 @if ($errors->has('verifyPin'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('verifyPin') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group display-inline">
                                <input type="submit" value="submit" class="registerbtn">
                            </div>
                            @php
                                $customerId = Session::get('customerId');
                                $ifverified=App\Customer::where(['id'=>$customerId])->first();
                            @endphp
                            <a href="{{url('customer/resend/code/'.$ifverified->id)}}" class="resendcode"><i class="fa fa-repeat"></i> resend code</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @endsection