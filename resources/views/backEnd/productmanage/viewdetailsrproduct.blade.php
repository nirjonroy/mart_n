@extends('backEnd.layouts.master')
@section('title','Requested Product Details')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Requested Product Details</h3>
      			<div class="short_button">
              <form action="{{url('editor/new/product-request/approved')}}" method="POST">
                @csrf
                <input type="hidden" name="hidden_id" value="{{$productdetails->id}}">
                <button type="submit" class="bcommonbtn" onclick="return confirm('Are you want  approved this?')"  title="Approved"> <i class="fa fa-check"></i>Approved</button>
              </form>
      			</div>
          <div class="short_button">
            <a href="{{url('editor/seller/product-edit/'.$productdetails->id)}}"  class="bcommonbtn "><i class="fa fa-edit"></i> Edit</a>
             
            </div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <div class="row">
                <div class="col-md-4 col-sm-3">
                  <div class="sellerinfo">
                    <h5>Seller Info</h5>
                    <div class="backend-seller-logo">
                      <img src="{{asset($productdetails->shoplogo)}}" alt="">
                    </div>
                    <table class="table table-bordered ">
                       <tbody>
                         <tr>
                           <td>Shop Name</td>
                           <td>{{$productdetails->shopname}}</td>
                         </tr>
                         <tr>
                           <td>Phone</td>
                           <td>{{$productdetails->sellerphone}}</td>
                         </tr>
                         <tr>
                           <td>Email</td>
                           <td>{{$productdetails->selleremail}}</td>
                         </tr>
                         <tr>
                           <td>Address</td>
                           <td>{{$productdetails->selleraddress}}</td>
                         </tr>
                       </tbody>
                    </table>
                  </div>
                </div>
                <!-- col end -->
                <div class="col-sm-1"></div>
                <div class="col-md-7 col-sm-7">
                  <div class="seller-productinfo">
                    <h5>Product Info</h5>
                    <p>{{$productdetails->productname}}</p>
                    <div class="bslider">
                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                             @foreach($productimage as $image)
                             @if($productdetails->id==$image->product_id)
                              <li data-target="#carouselExampleIndicators" data-slide-to="{{$image->product_id}}" class="active"></li>
                            @endif
                            @endforeach
                          </ol>
                          <div class="carousel-inner">
                            @foreach($productimage as $image)
                              @if($productdetails->id==$image->product_id)
                              <div class="carousel-item {{$loop->iteration==1?'active':''}}">
                                <img class="bslider-image" src="{{asset($image->image)}}" alt="First slide">
                              </div>
                              @endif
                            @endforeach
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>
                  </div>
                  <div class="product-otherinfo">
                    <p>Brand : @if($productdetails->productbrand != NULL)
                      {{$productbrand->brandName}} 
                      @else No Brand @endif</p>
                    <p>Stock : {{$productdetails->productquantity}}</p>
                    <p>New Price : {{$productdetails->productnewprice}} Tk</p>
                    <p>Discount: {{$productdetails->productdiscount}} %</p>
                     @if( ! $selectsizes->isEmpty())
                    <p>Size :  @foreach($selectsizes as $size) <strong>{{$size->sizeName}}</strong> , @endforeach </p>
                    @endif
                     @if( ! $selectcolors->isEmpty())
                    <p>Color :  @foreach($selectcolors as $color) <strong>{{$color->colorName}}</strong> , @endforeach </p>
                    @endif
                    <p>Details : </p>
                    <p>{!! $productdetails->productdetails !!}</p>
                  </div>
                </div>
              </div>
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