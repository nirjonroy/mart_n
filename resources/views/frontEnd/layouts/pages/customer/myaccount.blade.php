@extends('frontEnd.layouts.master')
@section('title','Customer Profile')
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
              <li><a class="anchor">Account</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!--common html-->
        <section class="customer-profile ">
            <div class="container">
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
                                    <div class="mcontent-body">
                                        <div class="row">
                                          <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="seller-dbox sbg-info">
                                              <a href="{{url('customer/order')}}">
                                                <span class="row">
                                                  <span class="col-md-4 col-sm-12">
                                                    <span class="icon">
                                                      <i class="fas fa-shopping-bag"></i>
                                                    </span>
                                                  </span>
                                                  <span class="col-md-8 col-sm-12">
                                                    <p>Order</p>
                                                    <h5>{{$myorder->count()}}</h5>
                                                  </span>
                                                </span>
                                              </a>
                                            </div>
                                          </div>
                                          <!-- col-3  end -->
                                          <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="seller-dbox sbg-warning">
                                              <a href="{{url('customer/profile-edit')}}">
                                                <span class="row">
                                                  <span class="col-md-4 col-sm-12">
                                                    <span class="icon">
                                                      <i class="fas fa-user-friends"></i>
                                                    </span>
                                                  </span>
                                                  <span class="col-md-8 col-sm-12">
                                                    <p>Edit Profile</p>
                                                  </span>
                                                </span>
                                              </a>
                                            </div>
                                          </div>
                                          <!-- col-3  end -->
                                          <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="seller-dbox sbg-warning">
                                              <a href="#">
                                                <span class="row">
                                                  <span class="col-md-4 col-sm-12">
                                                    <span class="icon">
                                                      <i class="fas fa-user"></i>
                                                    </span>
                                                  </span>
                                                  @php
                                                    $customerInfo = App\Customer::find(Session::get('customerId'));
                                                  @endphp
                                                  <span class="col-md-8 col-sm-12">
                                                    <p>{{$customerInfo->mypoint}}</p>
                                                    <p>My Points</p>
                                                  </span>
                                                </span>
                                              </a>
                                            </div>
                                          </div>
                                          <!-- col-3  end -->
                                          <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="seller-dbox sbg-primary">
                                              <a href="{{url('customer/shipping-address')}}">
                                                <span class="row">
                                                  <span class="col-md-4 col-sm-12">
                                                    <span class="icon">
                                                      <i class="fas fa-shipping-fast"></i>
                                                    </span>
                                                  </span>
                                                  <span class="col-md-8 col-sm-12">
                                                    <p>Shipping Address</p>
                                                  </span>
                                                </span>
                                              </a>
                                            </div>
                                          </div>
                                          <!-- col-3  end -->
                                          <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="seller-dbox sbg-error">
                                              <a href="{{url('customer/order/track')}}">
                                                <span class="row">
                                                  <span class="col-md-4 col-sm-12">
                                                    <span class="icon">
                                                      <i class="fas fa-search"></i>
                                                    </span>
                                                  </span>
                                                  <span class="col-md-8 col-sm-12">
                                                    <p>Track Order</p>
                                                  </span>
                                                </span>
                                              </a>
                                            </div>
                                          </div>
                                          <!-- col-3  end -->
                                        </div>
                                        <!-- single-box inner -->
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection