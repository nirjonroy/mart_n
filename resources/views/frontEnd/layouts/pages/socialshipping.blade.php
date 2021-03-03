 @extends('frontEnd.layouts.master')
 @section('title','Shipping')
 @section('content')
  <!--common html-->
        <div class="custom-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                          @include('frontEnd.layouts.includes.sidebar') 
                            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                            @if(Cart::content())
                            <li><a class="anchor"><i class="fa fa-long-arrow-right"></i></a></li>
                            <li><a class="anchor">Shopping <i class="fa fa-long-arrow-right"></i></a></li>
                            @endif
                            <li><a class="anchor">Shipping</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--custom breadcrumb end-->
        <section class="section-padding orderpage">
           <div class="container">
             <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="login-content">
                        <h2 class="login-title">Shipping Address</h2>
                          <form action="{{url('/shipping/information')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="name">Full Name</label>
                              <input type="text" name="name" required="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" >
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone Number</label>
                              <input type="text" name="phone" required="" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" >
                               @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                          </div>
                          <div class="form-group selectfont">
                            <label for="location">Area</label>
                                <select name="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" style="border: 1px solid #ddd">
                                  <option value="0">===Select Area===</option>
                                   @foreach($shippingCharg as $scharge)
                                      <option type="text" value="{{$scharge->id}}">{{$scharge->location}}</option>
                                      @endforeach
                                </select>
                                 @if ($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                           <!-- col end -->
                          <div class="form-group">
                            <label for="address">Address</label>
                              <textarea name="address" rows="3" required="" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" ></textarea>
                               @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                          </div>

                          <div class="form-group">
                              <label>Other Note <span>(if any query please write here)</span></label>
                              <textarea name="note"  rows="3" placeholder="Note" class="form-control" value="{{old('note')}}"></textarea>
                          </div>
                          <div class="form-group">
                              <input class="login-sub" type="submit" value="Process to Payement">
                          </div>
                          </form>
                      </div>
                      <!--login content end-->
                </div>
                <!-- col end -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="coupon_code right">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                           <div class="cart_subtotal">
                               <p>Shopping</p>
                               <p class="cart_amount">{{Cart::instance('shopping')->content()->count()}} - (items)</p>
                           </div>
                           <div class="cart_subtotal">
                               <p>Subtotal</p>
                               <p class="cart_amount">৳ {{Cart::subtotal()}}</p>
                           </div>
                           <div class="cart_subtotal ">
                               <p>Shipping</p>
                               @foreach($shippingCharg as $shipping)
                               <p class="cart_amount"><span>{{$shipping->location}}:</span> {{$shipping->price}}</p>
                               @endforeach
                           </div>
                           <div class="cart_subtotal">
                               <p>Total <span style="color: #D94939">(without shipping charge)</span></p>
                               <p class="cart_amount">৳  {{Cart::subtotal()}}</p>
                           </div>
                        </div>
                    </div>
                </div>
             </div>
           </div>
        </section>
 @endsection