@extends('frontEnd.layouts.master')
@section('title','More Info')
@section('content')
    <!--common html-->
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
              <li><a class="anchor">{{$moreinfoes->title}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="productarea about-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="content-page">
                   
                    <div class="single-page">
                        <h5 style="margin-bottom: 20px;">{{$moreinfoes->title}}</h5>
                        {!! $moreinfoes->text !!}
                    </div>
                </div>
            </div>
            <!--row end-->
        </div>
    </div>
</section>
<!--productarea end-->
@endsection