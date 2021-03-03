@extends('frontEnd.layouts.master')
@section('title','Brands')
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
              <li><a class="anchor">Brands</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <!-- Shop section end -->
<div class="category-section">
    <div class="container-fluid">
        <div class="row">
            @foreach($brands as $key=>$value)
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="category-thumb">
                    <a href="{{url('brands-products/'.$value->slug.'/'.$value->id)}}">
                        <div class="image">
                            <img src="{{asset($value->image)}}" alt="">
                        </div>
                        <div class="text">
                            <p>{{$value->brandName}}</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- col 2 end -->
            @endforeach
        </div>
    </div>
</div>
    <!-- Shop section end -->

@endsection
