 @if($products->isEmpty())
  <p>No Product Found</p>
@else
 @foreach($products as $key=>$value)
    <div class="col-lg-3 col-md-3 col-sm-4 col-6">
      <div class="single-product">
        <a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}">
          <div class="image">
            <div class="single-product-image">
               @foreach($productimage as $image)
                 @if($value->id==$image->product_id)
                    <img src="{{asset($image->image)}}" alt="">
                  @endif
                @endforeach
            </div>
              
              <div class="cart-area">
                  <ul>
                    <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="cart-btn">Add To Cart</a></li>
                    <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="wish-btn">Wishlist</a></li>
                  </ul>
              </div>
              <div class="cart-area">
                <ul>
                  <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="cart-btn">Add To Cart</a></li>
                  <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="wish-btn">Wishlist</a></li>
                </ul>
              </div>
          </div>
          <div class="text">
              <p class="name">{{str_limit($value->productname,20)}} </p>
              <p class="newprice"><span>৳</span> {{$value->productnewprice}}</p>
              @if($value->productoldprice)
                  <p class="oldprice"><del> ৳ {{$value->productoldprice}}</del> <span>
                  @endif- @if($value->productdiscount){{number_format($value->productdiscount,0)}} %</span>
                  @endif
              </p>
          </div>
      </a>
      </div>
    </div>
    <!-- column-ls-5 -->
@endforeach
@endif