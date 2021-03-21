@extends('frontEnd.layouts.master')
@section('title','All Shop')
@section('content')
  <section class="breadcrumb-area dark-bg section-margin">
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
              <li><a class="anchor">All Shop</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Shop</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">All Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- main section start -->
<section class="section-big-pt-space bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-t-space portfolio-section portfolio-padding metro-section port-col">
                    <div class="isotopeContainer row metro-block">
                      @foreach($shops as $key=>$value)
                        <div class="col-xl-3 col-lg-4 col-sm-6 isotopeSelector">
                            <div class="product">
                                <div class="product-box">
                                   <a href="{{url('vandorshop/'.$value->slug.'/'.$value->id)}}">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="{{asset($value->shoplogo)}}" class="img-fluid  " alt="product">
                                        </div>
                                        
                                        <div class="product-detail">
                                            <a href="product-page(no-sidebar).html">
                                                <h6>{{$value->shopname}}</h6>
                                            </a>
                                            
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>



                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main section end -->

@endsection