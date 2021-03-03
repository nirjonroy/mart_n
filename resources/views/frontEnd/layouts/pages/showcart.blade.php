@extends('frontEnd.layouts.master')
@section('title','Show Cart')
@section('content')
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
              <li><a class="anchor">Cart</a></li>
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
                    <table class="table table-bordered table-responsive">
                      <thead>
                        <tr  class="thead-light">
                          <th scope="col">Image</th>
                          <th scope="col" class="cfixed-width">Products</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                        <tbody>
                         {{ $additionalshippingfee = 0 }}
                         {{ $totalproductpoint = 0 }}
                         @foreach($cartInfos as $cartInfo)
                          @php
                            $sellerinfo = App\Seller::where('id',$cartInfo->options->sellerid)->first();
                          @endphp
                          <tr>
                            <td><img src="{{asset($cartInfo->options->image)}}" style="height:90px;width: 50px" alt=""></td>
                              <td> <a class="anchor" class="pcart-name">{{$cartInfo->name}} @if($cartInfo->options->size) <br>Size: {{$cartInfo->options->size}} @endif<br>@if($cartInfo->options->color) Color: {{$cartInfo->options->color}} @endif <br> Store : {{$sellerinfo->shopname}} <p class="shoppingfee"> Shipping Fee @php $productInfo = App\Product::where('id',$cartInfo->id)->first();  @endphp {{$shippingfee->shippingfee}} Tk</p> @if($cartInfo->options->additionalshipping) <p class="additionalshipping"> Extra Shipping {{$cartInfo->options->additionalshipping}} Tk</p> @endif @if($cartInfo->options->productpoint) <p> Earn Point {{$cartInfo->options->productpoint}}</p> @endif</a></td>
                              <td>৳ {{$cartInfo->price}} </td>
                              <td>
                                <div class="cart-quantity text-center">
                                    <form action="" method="POST">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" @if($cartInfo->qty==1) disabled="disabled" @endif value="{{$cartInfo->qty}}" data-id="{{$cartInfo->rowId}}" id="quantity-left" class="cartdecrementqty" data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                                <input type="text" disabled="disabled" id="quantity" name="quantity" class="form-control input-number cartupdate" data-id="{{$cartInfo->rowId}}" value="{{$cartInfo->qty}}" min="1">
                                            <span class="input-group-btn">
                                                <button type="button" value="{{$cartInfo->qty}}"  data-id="{{$cartInfo->rowId}}" id="quantity-right" class="cartincrementqty quantity-right-plus" data-type="plus" data-field="" >
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td>{{$cartInfo->price}} x {{$cartInfo->qty}} = ৳ @php $subtotal= $cartInfo->qty*$cartInfo->price @endphp {{$subtotal}} @if($cartInfo->options->productpoint) <p> Total Point {{$cartInfo->options->productpoint*$cartInfo->qty}}</p> @endif</a></td>
                            <td>
                                <button type="submit" class="btn cart-remove removeToCart" value="{{$cartInfo->qty}}"  data-id="{{$cartInfo->rowId}}"><i class="fa fa-times"></i></button>
                            </td>
                          </tr>
                            {{$additionalshippingfee += $cartInfo->options->additionalshipping}}
                            {{$totalproductpoint +=$cartInfo->options->productpoint*$cartInfo->qty}}
                            @php
                               Session::put('additionalshippingfee',$additionalshippingfee);
                               Session::put('totalproductpoint',$totalproductpoint);
                            @endphp

                          @endforeach
                      
                          <!-- cart item -->
                        </tbody>
                      </table>
                   </div>
                   <!-- cart body end -->
                 <div class="cuppon-apply">
                  <form action="{{url('coupon/customer/apply')}}" method="POST">
                    @csrf
                    <p>Apply Discount Code </p>

                    <div class="form-group">
                      <input type="text" name="couponcode" class="discountfield" placeholder="Enter Discount Code">
                      <input type="submit" value="apply discount" class="discountbtn"  onclick="return confirm('Confirm Changing Offer/Discount')">
                    </div>
                  </form>
                 </div>
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
                              @endphp
                            </p>
                       </div>
                        @php
                           $offercartid=Session::get('offercartid')
                         @endphp
                        @foreach($offers as $offer)
                         @if($offer->location==$shippingfee->disid)
                           @if($subtotal > $offer->buyammount)
                           <div class="cart_subtotal">
                                <div class="cart_offer">
                                 <label for="radio{{$offer->id}}">{{$offer->description}}</label>
                                 <span><input type="radio" class="cartoffer" data-id="{{$offer->id}}" id="radio{{$offer->id}}" name="offer" value="{{$offer->amount}}" autocomplete='off' onclick="return confirm('Confirm Changing Offer/Discount')"></span>
                                </div>
                           </div>
                           @endif

                           @elseif($offer->location==0)
                            @if($subtotal > $offer->buyammount)
                             <div class="cart_subtotal">
                                  <div class="cart_offer">
                                   <label for="radio{{$offer->id}}">{{$offer->description}}</label>
                                   <span><input type="radio" class="cartoffer" data-id="{{$offer->id}}" id="radio{{$offer->id}}" name="offer" value="{{$offer->amount}}" autocomplete='off' onclick="return confirm('Confirm Changing Offer/Discount')"></span>
                                  </div>
                             </div>
                             @endif
                           @endif
                       @endforeach
                       <div class="cart_subtotal ">
                           <p>Shipping</p>
                           @php
                              $freeshipping = Session::get('freeshipping');
                           @endphp
                           @if($freeshipping==1)
                             @php
                              Session::put('cshippingfee','0');
                              $cshippingfee = Session::get('cshippingfee');
                             @endphp
                          @else
                           @php
                              $cshippingfee = Cart::instance('shopping')->content()->count() * $shippingfee->shippingfee;
                              Session::put('cshipping',$cshippingfee);
                           @endphp
                           @endif
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
                             if($subtotal > Session::get('cdiscount')){
                              $cdiscount = Session::get('cdiscount');
                               }else{
                                $cdiscount = Session::put('cdiscount',0);
                             }
                              if($subtotal > Session::get('offeramount')){
                                $offeramount = Session::get('offeramount');
                               }else{
                                $offeramount = Session::put('offeramount',0);
                             }
                            $offeranddiscount =$offeramount;
                           @endphp
                           @php
                              $okeyoffer = App\Offer::where('buyammount','<',$subtotal)->orderBy('buyammount','DESC')->first();
                              if($okeyoffer){
                                $offercatid = $okeyoffer->id;
                              }else{
                                $offercatid = 0;
                             }
                             @endphp
                            @if($offercatid < Session::get('offercartid'))
                             {{Session::forget('offeramount')}}
                             {{Session::forget('offercartid')}}
                             {{Session::forget('freeshipping')}}
                            @endif
                              
                           <p class="cart_amount">৳ {{$offeranddiscount}} </p>
                       </div>

                       <div class="cart_subtotal">
                           <p>Total</p>
                           <p class="cart_amount">৳  {{($cshippingfee+$additionalshippingfee+$subtotal)-$offeranddiscount}}</p>
                       </div>
                       <div class="cart_subtotal">
                           <p>Earning Point</p>
                           <p class="cart_amount"> {{Session::get('totalproductpoint')}}</p>
                       </div>
                       <div class="checkout_btn">
                           <a href="{{url('place-to-order')}}">Place To Order</a>
                       </div>
                    </div>
                </div>
              </div>
              <!-- col end -->
              <div class="col-sm-12">
                  <div class="cuppon-apply mobile-cuppon">
                  <form action="{{url('coupon/customer/apply')}}" method="POST">
                    @csrf
                    <p>Apply Discount Code </p>

                    <div class="form-group">
                      <input type="text" name="couponcode" class="discountfield" placeholder="Enter Discount Code">
                     <input type="submit" value="apply discount" class="discountbtn"  onclick="return confirm('Confirm Changing Offer/Discount')">
                    </div>
                  </form>
                 </div>
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