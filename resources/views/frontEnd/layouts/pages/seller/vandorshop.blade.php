@extends('frontEnd.layouts.master')
@section('title',$vandorshop->shopname)
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
              <li><a href="{{url('/shops')}}"> Shop</a> <span>/</span></li>
              <li><a class="anchor">{{$vandorshop->shopname}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <section class="common-design">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <div class="sidebar sidebar-vandor-shop">
            <div class="custom-sidebar vandor-shop">
              <div class="title">
                <h5>{{$vandorshop->shopname}}</h5>
              </div>
              <div class="vandor-info">
                <div class="vlogo">
                  <img src="{{asset($vandorshop->shoplogo)}}" alt="">
                </div>
                <div class="vandor-contact">
                  <ul>
                    <li><a href="tel:{{$vandorshop->sellerphone}}"><i class="fas fa-phone"></i> {{$vandorshop->sellerphone}}</a></li>
                    <li><a href="mailto:{{$vandorshop->email}}"><i class="fas fa-envelope"></i> {{$vandorshop->selleremail}}</a></li>
                    @if($vandorshop->selleraddress)
                    <li><a class="anchor"><i class="fas fa-home"></i> {{$vandorshop->selleraddress}}</a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
            <div class="custom-sidebar mrt-20">
               <div class="title ">
                  <h6>product category</h6>
                </div>
                  <ul class="mtree transit">
                    @foreach($categories as $category)
                    <li>
                      <a class="anchor">{{$category->catname}}</a>
                        <ul>
                          @foreach($category->subcategories as $subcategory)
                          <li><a href="{{url('subcategory/'.$subcategory->slug.'/'.$subcategory->id)}}">{{$subcategory->subcategoryName}} <span>@php
                            $sproducs = App\Product::where(['productsubcat'=>$subcategory->id,'sellerid'=>$vandorshop->id])->count();
                          @endphp ({{$sproducs}})</span></a>
                              <ul>
                                @foreach($subcategory->childcategories as $childcate)
                                <li><a href="{{url('products/'.$childcate->slug.'/'.$childcate->id)}}">{{$childcate->childcategoryName}} <span>
                                  @php
                                      $cproducs = App\Product::where(['productchildcat'=>$childcate->id,'sellerid'=>$vandorshop->id])->count();
                                    @endphp ({{$cproducs}})</span></a></li>
                                          @endforeach
                              </ul>
                          </li>
                          @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- category end-->
            <!-- <div class="custom-sidebar mrt-20">
               <div class=" title ">
                    <h6>Brands</h6>
                </div>
                <div class="sidebar-brand">
                  <ul>
                    @foreach($brands as $value)
                      <li><a href="{{url('brands-products/'.$value->slug.'/'.$value->id)}}">{{$value->brandName}}</a></li>
                    @endforeach
                  </ul>
                </div>
            </div> -->
            <!-- brand end -->
            <div class="custom-sidebar mrt-20">
               <div class=" title ">
                    <h6>Price Range</h6>
                </div>
                <div class="sidebar-price">
                  <form action="">
                    <div class="form-group">
                      <input type="text" placeholder="Low Price">
                    </div>
                    <div class="form-group">
                      <input type="text" placeholder="High Price">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="filter" class="sfilter">
                    </div>
                  </form>
                </div>
            </div>
            <!-- price end -->
            
          </div>
        </div>
        <!-- col-lg end -->
        <div class="col-lg-9 col-md-9 col-sm-9">
          <div class="maincontent vandor-shop">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="vandor-banner">
                  <img src="{{asset($vandorshop->shopbanner)}}" alt="">
                </div>
              </div>
            </div>
            <div class="sorting-nav mrt-20">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5">
                  <div class="product-sorting">
                    <p>We Found ({{$totalproducts->count()}}) Products</p> 
                  </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 col-md-7 col-sm-7">
                  <div class="sortnav">
                    {{$products->links()}}
                  </div>
                </div>
              </div>
            </div>
            <!-- sorting row -->
            <div class="row">
              @foreach($products as $key=>$value)
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="single-product">
                  <a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}">
                    <div class="image">
                      <div class="product-slider owl-carousel">
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
                    </div>
                    <div class="text">
                        <p class="name">{{str_limit($value->productname,30)}} id {{$value->id}}</p>
                        <p class="newprice"><span>৳</span> {{$value->productnewprice}}</p>
                         @if($value->productdiscount)
                              <p class="oldprice"><del> ৳ @if($value->productdiscount) 
                                @php $offertaka= (($value->productdiscount*$value->productnewprice)/100);
                                 $oldprice = $value->productnewprice+$offertaka; 
                                @endphp 
                                
                                {{number_format($oldprice,0)}} </del> <span>
                              @endif- {{number_format($value->productdiscount,0)}} %</span>
                          </p>
                          @endif
                    </div>
                </a>
                </div>
              </div>
              <!-- column-ls-5 -->
              @endforeach
            </div>
            <!-- row end -->
            
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
@endsection