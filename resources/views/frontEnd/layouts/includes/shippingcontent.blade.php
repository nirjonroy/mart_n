
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