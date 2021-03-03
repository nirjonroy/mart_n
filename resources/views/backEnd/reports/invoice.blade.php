@extends('backEnd.layouts.master')
@section('title','Order Invoice')
@section('main_content')
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
      @page { size: auto;  margin: 0mm; }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
   <button onclick="myFunction()" style="
   color: #fff;border: 0;padding: 6px 12px;margin-bottom: 8px;
}"><i class="fa fa-print"></i></button>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <p>Mart9294</p>
                                @foreach($mainlogo as $logo)
                                <img src="{{asset($logo->logo)}}" style="width:100%; max-width:100px;margin-left: -60px;">
                                @endforeach
                            </td>
                            
                            <td>
                                Invoice #: {{$shippingInfo->orderIdPrimary}}<br>
                                {{date('F d, Y', strtotime($shippingInfo->created_at))}}<br>
                                Time:  {{date('h:i:s a', strtotime($shippingInfo->created_at))}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>Customer:</strong><br>
                                @if($customerInfo->fullName)
                               {{$customerInfo->fullName}}<br>
                                {{$customerInfo->phoneNumber}}<br>
                                {{$customerInfo->address}}<br>
                                @endif
                            </td>
                            
                            <td>
                                <strong>Shipping:</strong><br>
                                {{$shippingInfo->name}}<br>
                                {{$shippingInfo->phone}}<br>
                                {{$shippingInfo->fulladdress}}</br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>    
            <tr class="heading">
                <td>Item</td>
                <td> Price</td>
            </tr>
            @foreach($orderDetails as $key=>$value)
            <tr class="item">
                <td>{{$value->productName}} <div class="smallnote">
                     <p>@if(!$value->productSize=='') Size : {{$value->productSize}} @endif
                     @if(!$value->productColor=='') Color : {{$value->productColor}} @endif</p>
                </div>
                </td>
                <td>Qty = {{$value->productQuantity}} , {{$value->productPrice}} X {{$value->productQuantity}} = BDT {{$value->productPrice*$value->productQuantity}} /-</td>
            </tr>
            @endforeach

             <tr class="heading">
                <td>Sub Total</td>
                 <td>BDT {{($shippingInfo->orderSubtotal)}} /-</td>
            </tr>
            <tr><td></td></tr>
            <tr class="heading">
                <td>Shipping</td>
                 <td>Fee</td>
            </tr>
            <tr>
              
                <td>
                @if($shippingInfo)
                <p>@if($shippingInfo->fulladdress){{$shippingInfo->fulladdress}}<br>@endif{{$shippingInfo->stateaddress}},{{$shippingInfo->houseaddress}},{{$shippingInfo->area}},{{$shippingInfo->name}},{{$shippingInfo->zipcode}}</p>
                @endif
            </td>
                <td>{{$shippingInfo->cshippingfee}}</td>
            </tr>
            @if($shippingInfo->additionalshipping)
            <tr>
                <td>Additional Shipping Fee</td>
                 <td>BDT {{$shippingInfo->additionalshipping}}</td>
            </tr>
            @endif
            <tr class="heading">
                <td>Total</td>
                <td>BDT {{$shippingInfo->orderSubtotal+$shippingInfo->cshippingfee+$shippingInfo->additionalshipping}} /-</td>
            </tr>
            <tr>
                <td>Discount</td>
                 <td>BDT @if($shippingInfo->cdiscount !=NULL){{$shippingInfo->cdiscount}}@endif</td>
            </tr>
            
             <tr class="heading">
                <td>Total</td>
                 <td>BDT {{($shippingInfo->orderTotal)}} /-</td>
            </tr>
            <tr><td></td></tr>
             <tr class="heading">
                <td>Payment Method</td>
                 <td>{{$paymentmethod->paymentType}} #</td>
            </tr>
            <tr class="details">
                @php
                    $ordertotal = $shippingInfo->orderTotal;
                    $ordertotal = str_replace('.00','',$ordertotal);
                    $ordertotal = str_replace(',','',$ordertotal);
                @endphp

                <td>{{$paymentmethod->paymentType}}</td>
                <td>BDT {{$ordertotal}} /-</td>
            </tr>
            @if($paymentmethod->paymentType=='bkash')
            <tr><td>Number : {{$paymentmethod->cPaynumber}}</td>
            <td>TrxId : {{$paymentmethod->cPaytrxid}}</td></tr>
            @endif
            <tr>
                <td class="footer">
                    
                 </td>
            </tr>
        </table>
    </div>
    <script>
        function myFunction() {
            window.print();
        }
    </script>
</body>
</html>
@endsection
