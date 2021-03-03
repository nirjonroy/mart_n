@extends('frontEnd.layouts.pages.seller.sellermaster')
@section('sellertitle','Order Manage')
@section('sellercontent')
<div class="seller-breadcrumb">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-left">
				<h6> <strong>Manage Product</strong></h6>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-right">
				<ul>
					<li><a href="{{url('me/seller')}}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
					<li><a class="anchor" >-</a></li>
					<li><a class="anchor" >Order Manage</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="mcontent-body">
	<div class="row">
		<div class="col-sm-12">
			<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Price</th>
                  <th>Sub Total</th>
                  <th>Quantity</th>
                  <th>Commision</th>
                  <th>Payable</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($ordermanage as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->productName}}</td>
                  <td> {{$value->productSize}}</td>
                  <td> {{$value->productColor}}</td>
                  <td> {{$value->productPrice}}</td>
                  <td> {{$value->productQuantity}}</td>
                  <td> {{$value->productQuantity*$value->productPrice}}</td>
                  <td>{{$value->sellerCommision}}</td>
                  <td>{{($value->productQuantity*$value->productPrice)-$value->sellerCommision}}</td>
                  <td> @if($value->orderStatus==1) Paid @elseif($value->orderStatus==2) Process @else Pending @endif</td>
                  <td>{{$value->created_at}}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
		</div>
	</div>
</div>
@endsection