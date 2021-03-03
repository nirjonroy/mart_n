@extends('frontEnd.layouts.master')
@section('title','Show Wishlist')
@section('content')
<!--common html-->
     <section class="breadcrumb-area">
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
                <li><a class="anchor"> Shopping</a> <span>/</span></li>
                <li><a class="anchor">Wishlist</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
        <section class="common-design dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="show-cart-body wishlist">
                            <table class="table table-bordered">
                                  <thead>
                                    <tr  class="thead-light">
                                      <th scope="col">Delete</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Product</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Cart</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($wishlistproducts as $wishlistproduct)
                                    <tr>
                                    <td>
                                        <form action="{{url('/wishlist-delete-cart')}}" method="POST">
                                           @csrf
                                           <input type="hidden" name="rowId" value="{{$wishlistproduct->rowId}}">
                                          <button type="submit" class="btn cart-remove"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                    <!-- delete icon -->
                                     <form action="{{url('/wishlist-product-add/'.$wishlistproduct->id)}}" method="POST" >
                                      @csrf
                                        <input type="hidden"  name="rowId" value="{{$wishlistproduct->rowId}}">
                                        <input type="hidden"  name="qty" class="input-number" value="1" min="1">
                                        @php
                                              $selectcolors = DB::table('productcolors')
                                                ->join('colors','productcolors.color_id','=','colors.id')
                                                  ->where('productcolors.product_id',$wishlistproduct->id)
                                                  ->orderBy('id','DESC')
                                                  ->select('productcolors.*','colors.colorName')
                                                  ->get();

                                                   $selectsizes = DB::table('productsizes')
                                                    ->join('sizes','productsizes.size_id','=','sizes.id')
                                                      ->where('productsizes.product_id',$wishlistproduct->id)
                                                      ->orderBy('id','DESC')
                                                      ->select('productsizes.*','sizes.sizeName')
                                                      ->get();
                                          @endphp
                                      <td><img src="{{asset($wishlistproduct->options->image)}}" style="width: 50px" alt=""></td>
                                      <td> <a class="anchor" class="pcart-name">{{$wishlistproduct->name}}</a>


                                        @if( ! $selectcolors->isEmpty() ) 
                                        <ul class="details-size">
                                        <strong>Select Color:</strong>
                                          @foreach($selectcolors as $color)
                                          <li>
                                            <input type="radio" id="color{{$color->id}}"  class="custom-radio-small"  name="proColor"  value="{{$color->colorName}}" required="required">
                                            <label class="boxcolor" for="color{{$color->id}}">{{$color->colorName}}</label>
                                          </li>
                                          @endforeach
                                      </ul>
                                         @endif
                                         @if( ! $selectsizes->isEmpty() ) 
                                        <ul class="details-size">
                                        <strong>Select Size:</strong>
                                          @foreach($selectsizes as $size)
                                         <li>
                                            <input type="radio" id="size{{$size->id}}"  class="custom-radio-small"  name="proSize"  value="{{$size->sizeName}}" required="required">
                                            <label for="size{{$size->id}}">{{$size->sizeName}}</label>
                                          </li>
                                          @endforeach
                                      </ul>
                                         @endif
                                      </td>
                                      <td>৳ {{$wishlistproduct->price}}</td>
                                      <td><div class="wish-button">
                                              <button type="submit">Add To Cart</button>
                                          </div>
                                        </td>
                                      </form>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                 <!--row end-->
            </div>
        </section>
        <!--productarea end-->
  


@endsection