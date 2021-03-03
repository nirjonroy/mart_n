@extends('frontEnd.layouts.master')
@section('title','Customer order')
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
              <li><a class="anchor"> Customer</a> <span>/</span></li>
              <li><a class="anchor"> Account</a> <span>/</span></li>
              <li><a class="anchor">Order</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--custom breadcrumb end-->
        <section class="customer-profile ">
            <div class="container-fluid">
                <div class="row">
                    <div class="paddleft-120 col-lg-12 col-md-12 col-sm-12">
                        <div class="customer-profile">
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-md-3">
                                    <div class="cprofile-sidebar">
                                        @include('frontEnd.layouts.pages.customer.sidebar')
                                    </div>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    <div class="cprofile-details">
                                        <p class="account-title">Customer Order</p>
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th scope="col">Id</th>
                                              <th scope="col">Order ID</th>
                                              <th scope="col">Total Order</th>
                                              <th scope="col">Total Status</th>
                                              <th scope="col">Invioce</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                                $customerId = Session::get('customerId');
                                                $customerorders=App\Order::where('customerId',$customerId)->get();
                                            @endphp
                                            @foreach($customerorders as $customerorder)
                                            <tr>
                                              <td>{{$loop->iteration}}</td>
                                              <td>{{$customerorder->ordertrack}}</td>
                                              <td>{{$customerorder->orderTotal}}</td>
                                              <td>@if($customerorder->orderStatus ==0) Pending @elseif($customerorder->orderStatus ==1) confirm @elseif($customerorder->orderStatus ==2) Delevery @else Cancelled  @endif</td>
                                              <td><a href="{{url('customer/order/invoice/'.$customerorder->orderIdPrimary)}}" class="login-button">View</a></td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection