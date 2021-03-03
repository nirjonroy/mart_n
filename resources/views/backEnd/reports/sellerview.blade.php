@extends('backEnd.layouts.master')
@section('title','All Seller')
@section('main_content')
<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-image img-fluid img-circle" src="{{asset($sellerinfo->shoplogo)}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$sellerinfo->shopname}}</h3>

                <p class="text-muted text-center"><i class="fa fa-phone"></i> {{$sellerinfo->sellerphone}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Products</b> <a class="float-right">{{$allproducts->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Orders</b> <a class="float-right">{{$allorders->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Since</b> <a class="float-right">{{date('F d, Y', strtotime($sellerinfo->created_at))}}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-home mr-1"></i> Shop Name</strong>

                <p class="text-muted">
                  {{$sellerinfo->shopname}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                <p class="text-muted">{{$sellerinfo->selleraddress}}</p>
                <hr>
                <strong><i class="fa fa-phone mr-1"></i> Phone</strong>
                <p>{{$sellerinfo->sellerphone}}</p>
                <p>{{$sellerinfo->sellerphone2}}</p>
                <hr>
                <strong><i class="fa fa-envelope mr-1"></i> Email</strong>
                <p>{{$sellerinfo->selleremail}}</p>
                <hr>
                <strong><i class="fa fa-user  mr-1"></i> Contact Person</strong>
                <p>{{$sellerinfo->contperson}}</p>
                <hr>
                <strong><i class="fa fa-university mr-1"></i> Bank Account</strong>
                <p>{{$sellerinfo->sellerbankaccount}}</p>
                <hr>
                <strong><i class="fa fa-university mr-1"></i> Bank Name</strong>
                <p>{{$sellerinfo->sellerbankname}}</p>
                <hr>
                <strong><i class="fa fa-university mr-1"></i> Bank Branch</strong>
                <p>{{$sellerinfo->sellerbankbranch}}</p>
                <hr>
                <strong><i class="fa fa-university mr-1"></i> Bank Routing</strong>
                <p>{{$sellerinfo->sellerroutingno}}</p>
                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Products</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Order</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profileEdit" data-toggle="tab">Profile Edit</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <table id="example1" class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Sl. No</th>
                    			<th>Name</th>
                    			<th>Stock</th>
                    			<th>Status</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($allproducts as $key=>$value)
                    		<tr>
                    			<td>{{$loop->iteration}}</td>
                    			<td>{{str_limit($value->productname,25)}}</td>
                    			<td>{{$value->productquantity}}</td>
                    			<td>{{$value->status==1?'Active':'Inactive'}}</td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                     <table id="example1" class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Sl</th>
                    			<th>Product</th>
                    			<th>Price</th>
                    			<th>Quantity</th>
                    			<th>Total</th>
                          <th>Commision</th>
                          <th>Payable</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($allorders as $key=>$order)
                    		<tr>
                    			<td>{{$loop->iteration}}</td>
                    			<td>{{$order->productName}}</td>
                    			<td>{{$order->productPrice}}</td>
                    			<td>{{$order->productQuantity}}</td>
                          <td>{{$order->productPrice*$order->productQuantity}} Tk</td>
                          <td>{{$order->sellerCommision}} Tk</td>
                          <td>{{($order->productPrice*$order->productQuantity)-$order->sellerCommision}} Tk</td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                    </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="profileEdit">
                     <form action="{{url('admin/seller/informaion/update')}}" method="POST" name="editForm" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" value="{{$sellerinfo->id}}" name="hidden_id">
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Email Add</label>
                         <input type="email" class="col-sm-6 form-control" value="{{$sellerinfo->selleremail}}" name="selleremail">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Seller Name</label>
                         <input type="text" class="col-sm-6 form-control" value="{{$sellerinfo->contperson}}" name="contperson">
                       </div>
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Seller Banner</label>
                         <input type="file" class="col-sm-6 form-control" name="shopbanner">
                         <img src="{{asset($sellerinfo->shopbanner)}}" class="backend_image"alt="">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Shop Name</label>
                         <input type="text" class="col-sm-6 form-control" value="{{$sellerinfo->shopname}}" name="shopname">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Contact No 1 </label>
                         <input type="text" class="col-sm-6 form-control" value="{{$sellerinfo->sellerphone}}" name="sellerphone">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Contact No 2</label>
                         <input type="text" class="col-sm-6 form-control" value="{{$sellerinfo->sellerphone2}}" name="sellerphone2">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Shop Address</label>
                         <textarea type="text" class="col-sm-6 form-control" value="{{old('selleraddress')}}" name="selleraddress"></textarea>
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Enable Add Product</label>
                         <select name="status" class="col-sm-6 form-control">
                           <option value="">Select Status</option>
                           <option value="1">Yes</option>
                           <option value="0">No</option>
                         </select>
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Publish Product Directly</label>
                         <select name="publishproduct" class="col-sm-6 form-control">
                           <option value="">Select Publishing Type</option>
                           <option value="1">Yes</option>
                           <option value="0">No</option>
                         </select>
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Admin Commision Type</label>
                         <select name="commisiontype" class="col-sm-6 form-control">
                           <option value="">Select Commision Type</option>
                           <option value="1">Percentage</option>
                           <option value="2">Flat</option>
                         </select>
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Admin Commision</label>
                         <input type="text" class="col-sm-6 form-control" value="{{$sellerinfo->commision}}" name="commision">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <label for="" class="col-sm-3">Feature Vandor</label>
                         <select name="featurevandor" class="col-sm-6 form-control">
                           <option value="">Select Feature Vandor</option>
                           <option value="1">Yes</option>
                           <option value="0">No</option>
                         </select>
                       </div>
                       <!-- form group end -->
                        <div class="form-group row">
                        <label for="" class="col-sm-3">Password Change</label>
                         <input type="password" class="col-sm-6 form-control" value="" name="password">
                       </div>
                       <!-- form group end -->
                       <div class="form-group row">
                        <input type="submit"class="col-sm-2 btn btn-primary" value="Update">
                       </div>
                       <!-- form group end -->
                     </form>
                    </div>
                  <!-- /.tab-pane -->
                  </div>
                <!-- /.tab-content -->
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
     <script type="text/javascript">
        document.forms['editForm'].elements['status'].value="{{$sellerinfo->status}}"
        document.forms['editForm'].elements['publishproduct'].value="{{$sellerinfo->publishproduct}}"
        document.forms['editForm'].elements['commisiontype'].value="{{$sellerinfo->commisiontype}}"
        document.forms['editForm'].elements['featurevandor'].value="{{$sellerinfo->featurevandor}}"
      </script>
    </section>
  </section> 
@endsection