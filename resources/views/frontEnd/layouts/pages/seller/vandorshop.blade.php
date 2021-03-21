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
  

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>{{$vandorshop->shopname}}</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">vandor</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="top-banner-wrapper">
                            <a href="#"><img src="{{asset($vandorshop->shoplogo)}}" class="img-fluid  w-100" alt="category"></a>
                            <div class="top-banner-content small-section pb-0">
                                <!-- <h4>fashion</h4>
                                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                                <h2>We Found ({{$totalproducts->count()}}) Products</h2>
                            </div>
                        </div>
                        <div class="collection-product-wrapper">
                            <div class="section-big-pt-space portfolio-section portfolio-padding metro-section port-col">
                                <div class="isotopeContainer row metro-block">
                                  @foreach($products as $key=>$value)
                                    <div class="col-xl-3 col-lg-4 col-sm-6  isotopeSelector">
                                      <a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}">
                                        <div class="product">
                                            <div class="product-box">
                                                <div class="product-imgbox">
                                                    <div class="product-front">
                                                      @foreach($productimage as $image)
                                                       @if($value->id==$image->product_id) 
                                                        <img src="{{asset($image->image)}}" class="img-fluid  " alt="product">
                                                       @endif
                                                       @endforeach 
                                                    </div>
                                                    <div class="product-icon">
                                                        <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                            <i class="ti-bag" ></i>
                                                        </button>
                                                        <a href="javascript:void(0)" title="Add to Wishlist">
                                                            <i class="ti-heart" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                            <i class="ti-search" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="compare.html" title="Compare">
                                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <a href="product-page(no-sidebar).html">
                                                            <h6>{{str_limit($value->productname,30)}} id {{$value->id}}</h6>
                                                        </a>
                                                        <h4><span>৳</span> {{$value->productnewprice}}</p></h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </a>
                                    </div>
                                    @endforeach








                                
                                </div>
                            </div>
                            <div class="product-pagination mt-0">
                                <div class="theme-paggination-block">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> {{$products->links()}}<span class="sr-only">Next</span></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="product-search-count-bottom">
                                                <h5>Showing Products Result</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->



@endsection