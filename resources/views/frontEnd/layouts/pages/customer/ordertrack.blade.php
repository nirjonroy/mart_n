 @extends('frontEnd.layouts.master')
 @section('title','Order Track')
 @section('content')
    <section class="breadcrumb-area dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="custom-breadcrumb">
            <ul>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div id="hidemenu" class="hidemenu sidebar-menu">
                    @include('frontEnd.layouts.includes.sidebar')
                  </div>
                </div>
              </div>
              <!-- sidebar-menu end -->
              <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a> <span>/</span></li>
              <li><a class="anchor"> Customer</a> <span>/</span></li>
              <li><a class="anchor"> Order</a> <span>/</span></li>
              <li><a class="anchor">Track</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
        <!--custom breadcrumb end-->
        <section class="section-padding">
           <div class="container">
             <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-2"></div>
               <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="login-content order-track">
                        <h2 class="login-title">Order Track</h2>
                        <p>Please enter here your order Id (Like : 05)</p>
                        <form action="{{url('customer/order/track-search')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <input type="hidden" name="customerid" value="{{Session::get('customerId')}}">
                              <label for="orderid">Order Id</label>
                                <input type="orderid" name="orderid" class="form-control {{ $errors->has('orderid') ? ' is-invalid' : '' }}" value="{{ old('orderid') }}" >
                                @if ($errors->has('orderid'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('orderid') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <input class="login-sub" type="submit" value="Track Order">
                        </form>
                    </div>
                    <!--login content end-->
                </div>
                <!-- col end -->
             </div>
           </div>
        </section>
        
    @endsection