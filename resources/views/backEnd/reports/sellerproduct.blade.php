@extends('backEnd.layouts.master')
@section('title','Seller Products')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Seller Products</h3> <a href="{{url('/editor/seller/product/add')}}" class="btn btn-primary addsellerp">Add New</a>
          </div>
          @php
            $sellerurl= url()->current();
          @endphp
          {{Session::put('sellerurl',$sellerurl)}}
          <!-- /.card-header -->
            <div class="card-body user-border">
              <form action="{{url('editor/seller/product/bulk-option')}}" method="POST" id="myform">
                @csrf
               <table id="example1" class="table table-bordered table-striped">
                <select name="selectptions" class="bulkselect" form="myform">
                  <option value="">Bulk Action</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                  <option value="2">Edit</option>
                </select>
                <button type="submit" class="bulkbutton">Apply</button>
                <thead>
                  <tr>
                    <th><input type="checkbox"  id="My-Button"></th>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Discount</th>
                    <th>A. Shipping</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $key=>$value)
                  <tr>
                  <td><input type="checkbox"  value="{{$value->id}}" name="products_id[]" form="myform"></td>
                  <td>{{$loop->iteration}}</td>
                    <td>{{$value->productname}}</td>
                    <td> {{$value->productdiscount}}</td>
                    <td> {{$value->additionalshipping}}</td>
                    <td> {{$value->productnewprice}}</td>

                    <td>
                    @foreach($productimage as $image)
                      @if($value->id==$image->product_id) <img src="{{asset($image->image)}}" alt="" class="small_image">
                      @endif
                    @endforeach
                    </td>
                    <td> {{$value->productquantity}}</td>
                    <td> {{$value->status==1?'Active':'Inactive'}}</td>
                    <td>
                      <ul class="action_buttons dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li>
                                <a class="edit_icon" href="{{url('editor/view/product-request/'.$value->id)}}" title="View Details" target="_blank"><i class="fa fa-eye"></i> Details</a>
                            </li>
                            <li>
                                <a class="edit_icon" href="{{url('editor/seller/product/view/edit/'.$value->id)}}" title="View Details" ><i class="fa fa-edit"></i> Edit</a>
                            </li>

                          </ul>
                      </ul>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection