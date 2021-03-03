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
                    @include('frontEnd.layouts.includes.sidebar')
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
  <section class="common-design">
    <div class="container">
      <div class="row">
        @foreach($shops as $key=>$value)
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="shop-thumb">
              <a href="{{url('vandorshop/'.$value->slug.'/'.$value->id)}}">
                <div class="image">
                  <img src="{{asset($value->shoplogo)}}" alt="">
                </div>
                <div class="text">
                  <p>{{$value->shopname}}</p>
                </div>
              </a>
            </div>
          </div>
          <!-- col 2 end -->
          @endforeach
        </div>
     </div>
    </div>
  </section>
@endsection