@extends('frontEnd.layouts.pages.seller.sellermaster')
@section('sellertitle','Brand Request')
@section('sellercontent')
<div class="seller-breadcrumb">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-left">
				<h6> <strong>Brand Request</strong></h6>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="seller-breadcrumb-right">
				<ul>
					<li><a href="{{url('me/seller')}}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
					<li><a class="anchor" >-</a></li>
					<li><a class="anchor" >Brand Request</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="mcontent-body">
	<div class="row">
		<div class="col-sm-12">
			<div class="custom-form">
				<form action="{{url('auth/me/seller/brand/request')}}" method="POST" enctype="multipart/form-data" name="editForm">
				@csrf 
					@php
		                 $SellerId = Session::get('SellerId');
		            @endphp
					<input type="hidden" name="requestid" value="{{$SellerId}}">
					<div class="row">
						<div class="col-sm-12">
                            <div class="form-group">
                              <label>Brand Name</label>
                              <input type="text" name="brandName" class="form-control{{ $errors->has('brandName') ? ' is-invalid' : '' }}" value="{{ old('brandName') }}">

                              @if ($errors->has('brandName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('brandName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
						<div class="col-sm-12">
	                        <div class="uncommon-area">
	                            <div class="row" >
	                              <div class="col-sm-12">
	                                   <div class="form-group">
	                                    <label for="category">Choose Your Brand Area<span>*</span></label>
	                                     @foreach($categories as $category)
	                                      <p><strong> {{$category->catname}} </strong></p>
	                                      @foreach($category->subcategories as $subcategory)
	                                       <div class="ls-checkbox">
	                                        <label class="cat-chechbox">
	                                          <input type="checkbox" value="{{$subcategory->id}}" name="subcategory[]">
	                                          <span class="checkmark"></span>
	                                          {{$subcategory->subcategoryName}}
	                                        </label>
	                                       </div>
	                                      @endforeach
	                                     @endforeach
	                                      @if ($errors->has('category'))
	                                      <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('category') }}</strong>
	                                      </span>
	                                      @endif
	                                 </div>
	                               </div>
	                            </div>
	                        </div>
	                      </div>
	                      <div class="col-sm-12 mrt-15">
							<div class="form-group">
								<input type="submit" value="Submit" class="registerbtn">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection