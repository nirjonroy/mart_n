@extends('frontEnd.layouts.master')
@section('title','Order Track')
@section('content')
    <!--common html-->
        <section class="mainbreadcrumb" style="background: url({{asset('public/frontEnd/images/breadcrumb.png')}});background-position: center;background-size: cover;background-repeat: no-repeat;" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumb-text">
                            <h3>Order Track</h3>
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a class="anchor"><i class="fe fe-drop-right"></i></a></li>
                            <li><a class="anchor">Order Track</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="customer-profile ">
            <div class="container-fluid">
                <div class="row">
                    <div class="paddleft-120 col-lg-12 col-md-12 col-sm-4">
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
                                        <p class="account-title">Customer Order Track</p>
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th scope="col">Order ID</th>
                                              <th scope="col">Total Order</th>
                                              <th scope="col">Total Status</th>
                                              <th scope="col">Invioce</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            
                                            <tr>
                                              <td>{{$trackorder->ordertrack}}</td>
                                              <td>{{$trackorder->orderTotal}}</td>
                                              <td>{{$trackorder->orderStatus ==1? "Paid":"Pending"}}</td>
                                              <td><a href="{{url('customer/order/invoice/'.$trackorder->orderIdPrimary)}}" class="login-button">View</a></td>
                                            </tr>
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