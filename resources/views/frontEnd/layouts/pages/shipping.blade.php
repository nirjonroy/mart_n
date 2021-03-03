 @extends('frontEnd.layouts.master')
 @section('title','Checkout')
 @section('content')
 @include('frontEnd.layouts.includes.flash-message')
    <!--common html-->
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
              <li><a class="anchor">Shopping</a> <span>/</span></li>
              <li><a class="{{url('show-cart')}}">Cart</a> <span>/</span></li>
              <li><a class="anchor">Checkout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="common-design dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="white-background">
            <div class="row">
                <div class="col-sm-12">
                  <form action="{{url('/shipping/information')}}" method="POST">
                    @csrf
                      <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                          <div class="show-cart-body">
                             <div class="shipping-info">
                                <div class="title">
                                  <h4>Billing Information <span>(* Marking Field Must Be Fillup)</span></h4>
                                  </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="name">Full Name <span>*</span></label>
                                          <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{old('name')}}" required="required">
                                          @if ($errors->has('name'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="phone">Phone Number <span>*</span></label>
                                          <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{old('phone')}}" required="required">
                                          @if ($errors->has('phone'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="email">Email Address</label>
                                          <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  value="{{old('email')}}">
                                          @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="district">District <span>*</span></label>
                                          <select name="district" id="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}"  value="{{old('district')}}" required="required">
                                            <option value="{{url('laravel')}}">Select Disctict</option>
                                            @foreach($districts as $district)
                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                            @endforeach
                                          </select>

                                            @if ($errors->has('district'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('district') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="area">Area <span>*</span></label>
                                          <select name="area" id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"  value="{{old('area')}}" required="required">
                                          </select>

                                            @if ($errors->has('area'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('area') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>               
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="stateaddress">State Address <span>*</span></label>
                                          <input type="text" name="stateaddress" class="form-control{{ $errors->has('stateaddress') ? ' is-invalid' : '' }}"  value="{{old('stateaddress')}}" required="required">

                                            @if ($errors->has('stateaddress'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stateaddress') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>             
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="houseaddress">House Address</label>
                                          <input type="text" name="houseaddress" class="form-control{{ $errors->has('houseaddress') ? ' is-invalid' : '' }}"  value="{{old('houseaddress')}}">

                                            @if ($errors->has('houseaddress'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('houseaddress') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>             
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                          <label for="zipcode">Zip Code</label>
                                          <input type="text" name="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}"  value="{{old('zipcode')}}">

                                            @if ($errors->has('zipcode'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>           
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                          <label for="note">Note</label>
                                          <textarea name="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"  value="{{old('note')}}" id="" cols="30" rows="6"></textarea>

                                            @if ($errors->has('note'))
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('note') }}</strong>
                                              </span>
                                              @endif
                                        </div>
                                      </div>
                                  </div>
                             </div>
                           </div>
                             <!-- cart body end -->
                          </div>
                          <!-- col end -->
                          <div class="col-lg-4 col-md-4 col-sm-6">
                              <div class="coupon_code right">
                                <h3>Cart Summary</h3>
                                    <div class="coupon_inner" >
                                       <div class="mainshippingpage" id="shippingContent">
                                          <div class="cart_subtotal">
                                               <p>Items</p>
                                               <p class="cart_amount"> {{Cart::instance('shopping')->content()->count()}} - (items)</p>
                                           </div>
                                           <div class="cart_subtotal">
                                               <p>Subtotal</p>
                                               <p class="cart_amount">৳  @php $subtotal=Cart::instance('shopping')->subtotal();
                                                            $subtotal=str_replace(',', '', $subtotal);
                                                            $subtotal=str_replace('.00', '',$subtotal);
                                                            echo $subtotal;
                                                          @endphp</p>
                                           </div>
                                           <div class="cart_subtotal ">
                                               <p>Shipping</p>
                                               @php
                                                  $cshippingfee = Session::get('cshippingfee');
                                               @endphp
                                               <p class="cart_amount">৳ {{$cshippingfee}} </p>
                                           </div>
                                           <div class="cart_subtotal ">
                                               <p>Discount</p>
                                               @php
                                                  Session::put('cdiscount',0);
                                                  $cdiscount = Session::get('cdiscount');
                                               @endphp
                                               <p class="cart_amount">৳ {{$cdiscount}} </p>
                                           </div>

                                           <div class="cart_subtotal">
                                               <p>Total</p>
                                               <p class="cart_amount">৳  {{$cshippingfee+$cdiscount+$subtotal}}</p>
                                           </div>
                                       </div>
                                     <div class="checkout_btn">
                                         <button type="submit">Proceed to Payment</button>
                                     </div>
                                </div>
                            </div>
                          </div>
                       <!-- col end -->
                      </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 @endsection