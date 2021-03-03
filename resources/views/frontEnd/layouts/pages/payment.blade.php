@extends('frontEnd.layouts.master')
@section('title','Payment')
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
              <li><a class="anchor"> Cart</a> <span>/</span></li>
              <li><a class="anchor">Payment</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--custom breadcrumb end-->
  <section class="common-design dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="white-background">
            <div class="row" id="cartTable">
              <div class="col-lg-8 col-md-8 col-sm-12">
                 <div class="show-cart-body">
           		        <div class="row">
				    		@php
  								$cartsubtotal = Cart::instance('shopping')->subtotal();
  								$cartsubtotal = str_replace('.00','',$cartsubtotal);
  								$cartsubtotal = str_replace(',','',$cartsubtotal);
  						    $shippingfees= Session::get('cshipping');
  						    $cdiscount= Session::get('cdiscount');
  						    $totalprice = ($cartsubtotal-$cdiscount)+$shippingfees;
		            @endphp
              <div class="col-lg-12 col-md-12 col-sm-12">
    							<ul class="payment-radio">
                    <li>
                        <input type="radio" data-toggle="modal" data-target="#paywithCash"  id="radio01" class="{{ $errors->has('paymentType') ? ' is-invalid' : '' }}" required="required" /><label for="radio01"> <img src="{{asset('public/frontEnd/images/cashondelivery.png')}}"> <p> Cash On Delivery</p></label>
                         @if ($errors->has('paymentType'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('paymentType') }}</strong>
                          </span>
                          @endif
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade bkashmodal paywithBkash" id="paywithCash" tabindex="-1" role="dialog" aria-labelledby="cbkashNumber" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="cbkashNumber">Pay With Bkash</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      @php 
                                        $cartInfos = Cart::instance('shopping')->content();
                                      @endphp
                                      @foreach($cartInfos as $cartInfo)
                                        @php
                                        $haveearning = App\Product::where('productpoint',$cartInfo->options->productpoint)->first();
                                        @endphp
                                      @endforeach
                                      <div class="modal-body paymodalcontent">
                                        <h4>How To Pay</h4>
                                        <p>01. Receive Product From Delivery Man</p>
                                        <p>02. Pay On Delivery Man</p>
                                        <form action="{{url('payment/method')}}" method="POST">
                                          @csrf
                                          @if($haveearning!=NULL)
                                          <div class="form-group">                    
                                            <input type="checkbox" value="1" name="usemypoint"> <strong> Use My Point</strong>
                                          </div>
                                          @endif
                                          <input type="hidden" name="paymentType" value="cash">
                                        <div class="from-group">
                                          <button type="submit" class="btn btn-primary">Confirm Order</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <!-- bkash -->
                    <li>
                        <input type="radio" data-toggle="modal" data-target="#paywithBkash"  id="radio02" class="{{ $errors->has('paymentType') ? ' is-invalid' : '' }}" required="required" /><label for="radio02"> <img src="{{asset('public/frontEnd/images/bkash.png')}}"> <p> Pay On Bkash</p></label>
                         @if ($errors->has('paymentType'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('paymentType') }}</strong>
                          </span>
                          @endif
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade bkashmodal paywithBkash" id="paywithBkash" tabindex="-1" role="dialog" aria-labelledby="cbkashNumber" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="cbkashNumber">Pay With Bkash</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body paymodalcontent">
                                        <h4>How To Pay</h4>
                                        <p>01. Go to your bKash Mobile Menu by dialing *247#</p>
                                        <p>02. Choose “Payment”</p>
                                        <p>03. Enter Our Merchant bKash Account Number: 017xxxxxxxx</p>
                                        <p>04. Enter the amount ৳ {{$totalprice}}</p>
                                        <p>05. Enter a reference against your payment ( Anything)</p>
                                        <p>6. Enter the Counter Number: 1</p>
                                        <p>07. Now enter your bKash Mobile Menu PIN to confirm</p>
                                        <p>Done! You will receive confirmation message from bKash. Please write down your sender phone number and trx id for verification. Thanks</p>
                                        <form action="{{url('payment/method')}}" method="POST">
                                          @csrf

                                          @if($haveearning!=NULL)
                                          <div class="form-group">                    
                                            <input type="checkbox" value="1" name="usemypoint"> <strong> Use My Point</strong>
                                          </div>
                                          @endif
                                          <input type="hidden" name="paymentType" value="bkash">
                                        <div class="from-group">
                                          <label for="cbkashNumber">Your Bkash Number</label> 
                                        <input type="text" class="form-control{{ $errors->has('cbkashNumber') ? ' is-invalid' : '' }}" value="" name="cbkashNumber" required>
                                         @if ($errors->has('cbkashNumber'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('cbkashNumber') }}</strong>
                                            </span>
                                           @endif
                                        </div>
                                        <div class="from-group">
                                          <label for="cbkashtrxId">Your Trx ID</label>  
                                        <input type="text" class="form-control{{ $errors->has('cbkashtrxId') ? ' is-invalid' : '' }}" value="" name="cbkashtrxId" required>
                                        @if ($errors->has('cbkashtrxId'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cbkashtrxId') }}</strong>
                                          </span>
                                         @endif
                                        </div>
                                        <div class="from-group">
                                          <button type="submit" class="btn btn-primary">Confirm Order</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <!-- bkash -->
              							</ul>
          		    			</div>
	                	</div>
			        </form>
                 </div>
                 <!-- cart body end -->
              </div>
             <!-- col end -->
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="coupon_code right">
                      <h3>Cart Summary</h3>
                      <div class="coupon_inner">
                        <div class="edit-shippinginfo">
                          <p class="sname"><i class="fas fa-map-marker-alt"></i> {{$shippingfee->name}}</p>
                          <a data-toggle="modal" data-target="#editshippingadderess" class="sedit anchor">Edit</a>
                          <p class="faddress">{{$shippingfee->houseaddress}}, @if($shippingfee->stateaddress !=NULL) , {{$shippingfee->stateaddress}}, @endif {{$shippingfee->areaname}},{{$shippingfee->disname}} ,{{$shippingfee->zipcode}}<br>@if($shippingfee->fulladdress !=NULL) {{$shippingfee->fulladdress}} , @endif {{$shippingfee->phone}}</p>
                        </div>
                         <div class="cart_subtotal">
                             <p>Items</p>
                             <p class="cart_amount"> {{Cart::instance('shopping')->content()->count()}} - (items)</p>
                         </div>
                         <div class="cart_subtotal">
                             <p>Subtotal</p>
                             <p class="cart_amount">৳ 
                              @php $subtotal=Cart::instance('shopping')->subtotal();
                                $subtotal=str_replace(',', '', $subtotal);
                                $subtotal=str_replace('.00', '',$subtotal);
                                echo $subtotal;
                              @endphp</p>
                         </div>
                          
                         <div class="cart_subtotal ">
                             <p>Shipping</p>
                             @php
                                $cshippingfee =Session::get('cshippingfee');
                             @endphp
                             <p class="cart_amount">৳ {{$cshippingfee}}</p>
                         </div>
                          <div class="cart_subtotal ">
                             <p>Additional Shipping</p>
                              @php
                                $additionalshippingfee= Session::get('additionalshippingfee');
                             @endphp
                             <p class="cart_amount">৳ {{$additionalshippingfee}}</p>
                         </div>
                         <div class="cart_subtotal ">
                              <p> @if(Session::get('usecouponcode') && Session::get('offeramount')) Discount @elseif(Session::get('offeramount')) Offer @else No Discount @endif</p>
                              @php
                               $offeranddiscount = Session::get('offeramount');
                              @endphp
                             <p class="cart_amount">৳ {{$offeranddiscount}} </p>
                         </div>
                         <div class="cart_subtotal">
                           <p>Earning Point</p>
                           <p class="cart_amount"> {{Session::get('totalproductpoint')}}</p>
                       </div>
                         <div class="cart_subtotal">
                             <p>Total</p>
                             <p class="cart_amount">৳  {{($cshippingfee+$additionalshippingfee+$subtotal)-$offeranddiscount}}</p>
                         </div>
                      </div>
                  </div>
                </div>
                <!-- col end -->
              <!-- col end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
<!-- modal start -->
    <div class="modal fade" id="editshippingadderess">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Set Shipping Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="cprofile-details">
              <p class="account-title">Edit Shipping Address</p>
               <form action="{{url('/shipping/information/update/')}}" method="POST" class="form-row" name="editForm">
              @csrf
                    @php
                        $customerId=Session::get('customerId');
                     @endphp
                      <input type="hidden" value="{{$customerId}}" name="customerid">
                      <input type="hidden" value="{{$shippingfee->id}}" name="hidden_id">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="name">Full Name <span>*</span></label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$shippingfee->name}}" required="required">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="phone">Contact Number <span>*</span></label>
                                <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{$shippingfee->phone}}" required="required">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="district">District <span>*</span></label>
                                <select name="district" id="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}"  value="{{old('district')}}" required="required">
                                  <option value="">Select Disctict</option>
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
                                <label for="area">Area/Thana <span>*</span></label>
                                <select name="area" id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"  value="{{old('area')}}" required="required">
                                  @foreach($areas as $area)
                                  <option value="{{$area->id}}">{{$area->area}}</option>
                                  @endforeach
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
                                <label for="stateaddress">State</label>
                                <input type="text" name="stateaddress" class="form-control{{ $errors->has('stateaddress') ? ' is-invalid' : '' }}"  value="{{$shippingfee->stateaddress}}">

                                  @if ($errors->has('stateaddress'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('stateaddress') }}</strong>
                                    </span>
                                    @endif
                              </div>
                            </div>             
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="houseaddress">House Address <span>*</span></label>
                                <input type="text" name="houseaddress" class="form-control{{ $errors->has('houseaddress') ? ' is-invalid' : '' }}"  value="{{$shippingfee->houseaddress}}" required="required">

                                  @if ($errors->has('houseaddress'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('houseaddress') }}</strong>
                                    </span>
                                    @endif
                              </div>
                            </div>             
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="zipcode">Zip Code <span>*</span></label>
                                <input type="text" name="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}"  value="{{$shippingfee->zipcode}}" required="required">

                                  @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                    @endif
                              </div>
                            </div>             
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                <label for="fulladdress">Additional Address</label>
                                <input type="text" name="fulladdress" class="form-control{{ $errors->has('fulladdress') ? ' is-invalid' : '' }}"  value="{{$shippingfee->fulladdress}}">

                                  @if ($errors->has('fulladdress'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('fulladdress') }}</strong>
                                    </span>
                                    @endif
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 text-left">
                              <input type="submit" class="registerbtn" value="save update">
                            </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal end -->
  </section>
 <script type="text/javascript">
    document.forms['editForm'].elements['district'].value="{{$shippingfee->district}}"
    document.forms['editForm'].elements['area'].value="{{$shippingfee->area}}"
</script>
@endsection