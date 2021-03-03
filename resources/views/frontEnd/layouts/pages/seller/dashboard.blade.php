@extends('frontEnd.layouts.pages.seller.sellermaster')
@section('sellertitle','Seller Dashboard')
@section('sellercontent')
<div class="seller-breadcrumb">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			@php
                $SellerId = Session::get('SellerId');
                $sellerInfo=App\Seller::where(['id'=>$SellerId])->first();
            @endphp
			<div class="seller-breadcrumb-left">
				<h6> <strong>Hello !</strong> {{$sellerInfo->shopname}}</h6>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-right">
				<ul>
					<li><a href="{{url('me/seller')}}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- seller breadcrumb -->
<div class="mcontent-body">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-4 col-6">
			<div class="seller-dbox sbg-info">
				<a href="">
					<span class="row">
						<span class="col-md-4 col-sm-12">
							<span class="icon">
								<i class="fas fa-gem"></i>
							</span>
						</span>
						<span class="col-md-8 col-sm-12">
							<p>Total Product</p>
							<h5>{{$totalProduct}}</h5>
						</span>
					</span>
				</a>
			</div>
		</div>
		<!-- col-3  end -->
		<div class="col-lg-3 col-md-3 col-sm-4 col-6">
			<div class="seller-dbox sbg-warning">
				<a href="">
					<span class="row">
						<span class="col-md-4 col-sm-12">
							<span class="icon">
								<i class="fas fa-user-friends"></i>
							</span>
						</span>
						<span class="col-md-8 col-sm-12">
							<p>Total order</p>
							<h5>{{$totalOrder}}</h5>
						</span>
					</span>
				</a>
			</div>
		</div>
		<!-- col-3  end -->
		<div class="col-lg-3 col-md-3 col-sm-4 col-6">
			<div class="seller-dbox sbg-error">
				<a href="">
					<span class="row">
						<span class="col-md-4 col-sm-12">
							<span class="icon">
								<i class="fas fa-shopping-bag"></i>
							</span>
						</span>
						<span class="col-md-8 col-sm-12">
							<p>Total Sell</p>
							<h5>{{$totalSell}}</h5>
						</span>
					</span>
				</a>
			</div>
		</div>
		<!-- col-3  end -->
		<div class="col-lg-3 col-md-3 col-sm-4 col-6">
			<div class="seller-dbox sbg-primary">
				<a href="">
					<span class="row">
						<span class="col-md-4 col-sm-12">
							<span class="icon">
								<i class="fas fa-gem"></i>
							</span>
						</span>
						<span class="col-md-8 col-sm-12">
							<p>Total Commision</p>
							<h5>{{$totalCommision}}</h5>
						</span>
					</span>
				</a>
			</div>
		</div>
		<!-- col-3  end -->
	</div>
	<!-- single-box inner -->
</div>
@endsection