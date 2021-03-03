@extends('frontEnd.layouts.pages.seller.sellermaster')
@section('sellertitle','Manage Product')
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
					<li><a class="anchor" >Manage Product</a></li>
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
                  <th>Basic Info</th>
                  <th>New Price</th>
                  <th>Image</th>
                  <th>Quantity</th>
                  <th>Process</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($show_datas as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->productname}}</td>
                  <td><strong>Category =</strong> {{$value->catname}} </br>
                    <strong>Subcategory =</strong> {{$value->subcategoryName}} </br></br>
                  </td>
                  <td> {{$value->productnewprice}}</td>

                  <td>
                  @foreach($productimage as $image)
                    @if($value->id==$image->product_id) <img src="{{asset($image->image)}}" alt="" class="small_image">
                    @endif
                  @endforeach
                  </td>
                  <td> {{$value->productquantity}}</td>
                  <td> @if($value->request==0) Pending @elseif($value->request==1) Approved @else Process @endif</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>
                  	<ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                            <a class="edit_icon" href="{{url('auth/me/seller/edit/product/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          </li>
                            <li>
                               <form action="{{url('auth/me/seller/edit/product/delete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                <button type="submit" class="trash_icon" onclick="return confirm('Are you want to delete this?')"  title="delete"><i class="fa fa-trash"></i> Delete</button>
                              </form>
                          </li>
                        </ul>
                    </ul>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
		</div>
	</div>
</div>
@endsection