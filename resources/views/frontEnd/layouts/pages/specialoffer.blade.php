@extends('frontEnd.layouts.master')
@section('title','Special Offer')
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
              <li><a class="anchor">Special Offer</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <!-- Shop section end -->
    <section class="section-margin common-design">
        <div class="container">
            <div class="row">
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <div class="maincontent special-offer">
                    <div class="row">
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
                                  <p class="ppoint">Point : {{$value->productpoint}}</p>
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
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="sortnav text-left">
                          {{$products->links()}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop section end -->

@endsection

