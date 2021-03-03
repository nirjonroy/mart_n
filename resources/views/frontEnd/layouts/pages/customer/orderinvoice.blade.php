@extends('frontEnd.layouts.master')
@section('title','Order Invoice')
@section('content')
<style>
    @page { size: auto;  margin: 0mm; }
    .invoice-head {
      background: #F57C2C;
      padding: 30px;
      color: #fff;
    }
    .invoice-shortdescription {
      text-align: left;
      padding: 15px 0;
    }
    .title {
      text-align: left;
    }
    .table{
      margin-bottom: 0 !important;
    }
    .order-details {
      margin: 20px 0;
    }
    .order-details .title {
  margin: 8px 0;
}
.order-details td {
  text-align: left;
}
.cprofile-details {
    margin-top: 0px !important;
}
  </style>
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
    <!--common html-->
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
                                        <button onclick="myFunction()" style="
                                         color: #222;border: 0;padding: 6px 12px;margin-bottom: 8px;
                                      }"><i class="fa fa-print"></i></button>
                                          <div class="invoice-box">
                                            <div class="invoice-head">
                                              <h3>Thanks for shopping with us</h3>
                                            </div>
                                            <div class="invoice-shortdescription">
                                               <strong style="color:#000;">Hi ! {{$customerInfo->fullName}}</strong>
                                               <p>we have review processing your order</p>
                                               <p>Thanks for purchaing throught {{$paymentmethod->paymentType}} . We will check and give your update as soon as possible.</p>
                                            </div>
                                            <div class="order-details">
                                              <div class="title">
                                                <h5>[Order #{{$shippingInfo->orderIdPrimary}} ,  {{date('F d, Y', strtotime($shippingInfo->created_at))}}]</h5>
                                              </div>
                                               <table class="table table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Product</th>
                                                      <th scope="col">Quantity</th>
                                                      <th scope="col">Price</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($orderDetails as $key=>$value)
                                                    <tr>
                                                      <td>{{$value->productName}}</td>
                                                      <td>{{$value->productQuantity}}</td>
                                                      <td>{{$value->productPrice*$value->productQuantity}} /-</td>
                                                    </tr>

                                                    @endforeach
                                                    <tr>
                                                      <td colspan="2">Shipping Fee</td>
                                                      <td >{{$orderInfo->cshippingfee}} /-</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2">Subtotal</td>
                                                      <td >{{$orderInfo->orderTotal}} /-</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2">Additional Shipping Fee </td>
                                                      <td >@if($orderInfo->additionalshipping){{$orderInfo->additionalshipping}}@endif</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2">Discount</td>
                                                      <td >@if($orderInfo->cdiscount){{$orderInfo->cdiscount}}@endif</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2">Payment Method</td>
                                                      <td >{{$paymentmethod->paymentType}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2">Total</td>
                                                      <td >{{$orderInfo->orderTotal}}</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                            <!-- order details -->
                                            
                                            @foreach($orderDetails as $key=>$value)
                                            <div class="pincode-details">
                                              

                                                
                                            </div>
                                          @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection