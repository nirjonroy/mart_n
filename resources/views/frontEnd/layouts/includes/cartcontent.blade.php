@php $cartInfos = Cart::instance('shopping')->content(); @endphp
 <div class="col-lg-8 col-md-8 col-sm-12">
   <div class="show-cart-body">
      <table class="table table-bordered">
        <thead>
          <tr  class="thead-light">
            <th scope="col">Image</th>
            <th scope="col" class="cfixed-width">Product</th>
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
              $sellerinfo = \App\Seller::find($cartInfo->options->sellerid);
            @endphp
            <tr>
              <td><img src="{{asset($cartInfo->options->image)}}" style="height:90px;width: 50px" alt=""></td>
                <td> <a class="anchor" class="pcart-name">{{$cartInfo->name}} @if($cartInfo->options->size) <br>Size: {{$cartInfo->options->size}} @endif<br>@if($cartInfo->options->color) Color: {{$cartInfo->options->color}} @endif <br> Store : {{$sellerinfo->shopname}} <p class="shoppingfee"> Shipping Fee {{$shippingfee->shippingfee}}</p> @if($cartInfo->options->additionalshipping) <p class="additionalshipping"> Extra Shipping {{$cartInfo->options->additionalshipping}} Tk</p> @endif @if($cartInfo->options->productpoint) <p> Earn Point {{$cartInfo->options->productpoint}}</p> @endif</a></td>
                <td>৳ {{$cartInfo->price}} </td>
                <td>
                  <div class="cart-quantity text-center">
                      <form action="" method="POST">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <button type="button"  @if($cartInfo->qty==1) disabled="disabled" @endif value="{{$cartInfo->qty}}" data-id="{{$cartInfo->rowId}}" id="quantity-left" class="cartdecrementqty" data-type="minus" data-field="">
                                      <i class="fa fa-minus"></i>
                                  </button>
                              </span>
                                  <input type="text" id="quantity" name="quantity" class="form-control input-number cartupdate" disabled="disabled" data-id="{{$cartInfo->rowId}}" value="{{$cartInfo->qty}}" min="1">
                              <span class="input-group-btn">
                                  <button type="button" value="{{$cartInfo->qty}}"  data-id="{{$cartInfo->rowId}}" id="quantity-right" class="cartincrementqty quantity-right-plus" data-type="plus" data-field="" >
                                      <i class="fa fa-plus"></i>
                                  </button>
                              </span>
                          </div>
                      </form>
                  </div>
              </td>
              <td>{{$cartInfo->price}} x {{$cartInfo->qty}} = ৳ @php $subtotal= $cartInfo->qty*$cartInfo->price @endphp {{$subtotal}} @if($cartInfo->options->productpoint) <p> Total Point {{$cartInfo->options->productpoint*$cartInfo->qty}}</p> @endif </td>
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
                        <p class="faddress">@if($shippingfee->fulladdress) {{$shippingfee->fulladdress}} , @endif{{$shippingfee->houseaddress}} ,{{$shippingfee->stateaddress}},{{$shippingfee->areaname}},{{$shippingfee->disname}} @if($shippingfee->zipcode) {{$shippingfee->disname}} @endif <br>{{$shippingfee->phone}}</p>
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
<!-- col end -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    function cartContent(){
         $.ajax({
           type:"GET",
           url:"{{url('/cart/content')}}",
           dataType: "html",
           success: function(cartinfo){
             $('#cartTable').html(cartinfo);
             $('#loader').hide();
           }
        });
    }
    function cartQty(){
         $.ajax({
           type:"GET",
           url:"{{url('/cart/quantity')}}",
           dataType: "html",
           success: function(cartinfo){
             $('#cartQty').html(cartinfo);
             $('#loader').hide();
           }
        });
    }

    // Remove to cart start
    $(".removeToCart").click(function(e){
        var id = $(this).data("id");
        // alert(id);
        $('#loader').show();
        if(id){
              $.ajax({
               cache: false,
               type:"GET",
               url:"{{url('delete-cart')}}/"+id,
               dataType: "json",
            success: function(cartinfo){
                return cartContent() + cartQty();
            }
          });
        }
   });
    // Remove to cart end

    // cart qty increment to cart start
    $(".cartincrementqty").click(function(e){
        var id = $(this).data("id");
        var qty = parseInt($(this).val())+1;
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false,
               type:"GET",
               url:"{{url('increment-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                return cartContent();
            }
          });
        }
   });
    // cart qty increment to cart end

    // cart qty increment to cart start
    $(".cartdecrementqty").click(function(e){
        var id = $(this).data("id");
        var qty = parseInt($(this).val())-1;
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false, 
               type:"GET",
               url:"{{url('decrement-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                $('#loader').hide();
                return cartContent();
            }
          });
        }
   });
    // cart qty increment to cart end

    // cart qty update js start
    $(".cartupdate").on('keyup', function(){
        var id = $(this).data("id");
        var qty = parseInt($(this).val());
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false, 
               type:"GET",
               url:"{{url('decrement-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                return cartContent();
                $('#loader').hide();
            }
          });
        }
   });
    // cart qty update js end
     // cart cartoffer update js start
    $(".cartoffer").on('change', function(){
        var id = $(this).data("id");
        var amount = parseInt($(this).val());
        $('#loader').show();
              $.ajax({
               cache: false, 
               type:"GET",
               url:"{{url('offer-cart')}}/"+id+'/'+amount,
               dataType: "json",
            success: function(cartinfo){
                return cartContent();
                $('#loader').hide();
            }
          });
   });
    // cart cartoffer update js end
  });
</script>
<!-- main add to cart ajax end -->