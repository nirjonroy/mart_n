@extends('frontEnd.layouts.master')
@section('title','All Offer')
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
              <li><a class="anchor">All Offer</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <section class="common-design2">
    <div class="container">
      <div class="row">
        @foreach($alloffers as $key=>$value)
        <div class="col-lg-4 col-sm-4 col-md-4">
          <div class="single-offer">
            <p>{{$value->description}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection