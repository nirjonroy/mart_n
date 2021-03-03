<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
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
     .invoice-head h3{
      font-size: 25px;
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
      font-size: 20px;
    }

  .main-bodypay{
    width:800px;
    margin: 0 auto;
  }

.table td, .table th {
  padding: .45rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
  border-left: 1px solid #dee2e6

}
.table{
border-bottom: 1px solid #dee2e6 !important;
  border-right: 1px solid #dee2e6 !important;
}
.table-bordered{
  width:800px;
}

  </style>
</head>
<body>
  <div class="main-bodypay">
    <div class="cprofile-details">
        <button onclick="myFunction()" style="
         color: #fff;border: 0;padding: 6px 12px;margin-bottom: 8px;
      }"><i class="fa fa-print"></i></button>
          <div class="invoice-box">
            <div class="invoice-head">
              <h3>Thanks for shopping with us</h3>
            </div>
            @php
		        $orderInfo  = App\Order::where('orderIdPrimary',$orderid)->first();
		        $paymentmethod = App\Paymentsave::where('orderId',$orderid)->first();
		        $shippingInfo = App\Shipping::where('shippingPrimariId',$orderid)->first();
		        $orderDetails = App\Orderdetails::where('orderId',$orderid)->get();
            @endphp
            <div class="invoice-shortdescription">
               <strong>Hi ! {{$cname}}</strong>
               <p>we have review processing your order</p>
               <p>Thanks for purchaing throught {{$paymentmethod->paymentType}} . We will check and give your update as soon as possible.</p>
            </div>
            <div class="order-details">
              <div class="title">
                <h5>[Order #{{$orderInfo->orderIdPrimary}} ,  {{date('F d, Y', strtotime($orderInfo->created_at))}}]</h5>
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
                      <td>{{$value->productName}} <p>@if(!$value->proNickname=='') Nick Name: {{$value->proNickname}} @endif
                           @if(!$value->proPlayerid=='') Player Id: {{$value->proPlayerid}} @endif</p></td>
                      <td>{{$value->productQuantity}}</td>
                      <td>{{$value->productPrice*$value->productQuantity}} /-</td>
                    </tr>

                    @endforeach
                    <tr>
                      <td colspan="2">Subtotal</td>
                      <td >{{$orderInfo->orderTotal}} /-</td>
                    </tr>
                    <tr>
                      <td colspan="2">{{$paymentmethod->paymentType}} Charge </td>
                      <td >{{$orderInfo->charge}}</td>
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
    </div>
</div>
</body>
</html>
</div>

