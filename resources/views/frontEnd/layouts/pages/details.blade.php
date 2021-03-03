@extends('frontEnd.layouts.master')
@section('title','product details')
@section('content')
@include('frontEnd.layouts.includes.flash-message')
  <section class="breadcrumb-area dark-bg">
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
              <li><a href="{{url('/shops')}}"> Shop</a> <span>/</span></li>
              <li><a class="anchor">Product Details</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--custom breadcrumb end-->
        
  <section class="common-design">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="productshort-description">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7">
                 <div class="productdetails-slider">
                    
                     <!-- Swiper -->
                      <div class="swiper-container gallery-top">
                          <div class="swiper-wrapper">
                              @foreach($productimage as $image)
                                  @if($productdetails->id==$image->product_id) <div class="swiper-slide"> <img src="{{asset($image->image)}}" class="block__pic" alt=""></div>
                                  @endif
                                @endforeach
                             <p class="ppoint">Point : {{$productdetails->productpoint}}</p>
                          </div>
                          <!-- Add Arrows -->
                          <div class="swiper-button-next swiper-button-white"></div>
                          <div class="swiper-button-prev swiper-button-white"></div>
                      </div>
                      <div class="swiper-container gallery-thumbs">
                          <div class="swiper-wrapper">
                              @foreach($productimage as $image)
                                  @if($productdetails->id==$image->product_id) <div class="swiper-slide"> <img src="{{asset($image->image)}}"  alt=""></div>
                                  @endif
                                @endforeach
                          </div>
                      </div>

                      <!-- Swiper JS -->
                     
                  </div>
             </div>
             <!--col 4 end-->
             <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="pshort-description-text">
                <p class="name">{{$productdetails->productname}}</p>
                @if($productdetails->productcode)
                <p class="pdiscount">
                  Code : {{$productdetails->productcode}}
                </p>
                @endif
                @php
                  $totalReviewPerson = App\Review::where('product_id',$productdetails->id)->count();
                  $totalReviewAmount = App\Review::where('product_id',$productdetails->id)->sum('ratting');
                  if($totalReviewAmount!=0){
                    $avarageReviewAmount = $totalReviewAmount / $totalReviewPerson;
                  }
                @endphp
                <div class="pratting">
                  <div class="star">
                     <ul>
                      <li><span>

                      @if($totalReviewAmount!=0){{round($avarageReviewAmount,2)}} @else 0 @endif</span></li>
                      @if($totalReviewAmount!=0)
                        @if($avarageReviewAmount == 1)
                         <li><i class="fa fa-star"></i></li>
                        @elseif($avarageReviewAmount >= 1.5 && $avarageReviewAmount < 2 )
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half"></i></li>
                        @elseif($avarageReviewAmount >= 1.6 && $avarageReviewAmount < 2.5)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        @elseif($avarageReviewAmount >= 2.5 && $avarageReviewAmount < 3)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half"></i></li>
                        @elseif($avarageReviewAmount >= 2.6 && $avarageReviewAmount < 3.5)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        @elseif($avarageReviewAmount >= 3.5 && $avarageReviewAmount < 4)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half"></i></li>
                        @elseif($avarageReviewAmount >=3.6 && $avarageReviewAmount < 4.5)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        @elseif($avarageReviewAmount >= 4.5 && $avarageReviewAmount < 5)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half"></i></li>
                        @elseif($avarageReviewAmount >= 4.6)
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        @endif
                      @else
                      <li><i class="far fa-star"></i></li>
                      <li><i class="far fa-star"></i></li>
                      <li><i class="far fa-star"></i></li>
                      <li><i class="far fa-star"></i></li>
                      <li><i class="far fa-star"></i></li>
                      @endif
                    </ul>
                  </div>
                  <div class="count">
                    <span>@if($totalReviewAmount!=0) ({{$totalReviewAmount}}) @else (0) @endif</span> 
                    <p> @if($totalReviewPerson!=0) {{$totalReviewPerson}} @else 0 @endif Reviews</p>
                  </div>
                </div>

                  <div class="brand">
                    <p>
                      Brand : @if($productbrand != NULL)
                      {{$productbrand->brandName}} 
                      @else No Brand @endif
                    </p>
                  </div>

                  <div class="brand">
                    <p>Stock : <span>@if($productdetails->productquantity >= 1) {{$productdetails->productquantity}} Available @else Stock Out @endif</span></p>
                  </div>
                <div class="price">
                  <h5>৳  {{$productdetails->productnewprice}}</h5> 
                        @if($productdetails->productoldprice)
                            <p class="oldprice"><del> ৳ 
                              {{$productdetails->productoldprice}}</del>
                              <span>( {{$productdetails->productdiscount}} % OFF) </span>
                         </p>@endif
                </div>
                <form action="{{url('/add-to-cart/'.$productdetails->id)}}" class="details-form form-row" method="POST">
                   @csrf
                  <div class="col-sm-12">
                    <div class="from-group">
                      <input type="hidden" value="{{$productdetails->sellerid}}" name="sellerid">
                    </div>
                    <div class="from-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" id="quantity-left" class="quantity-left-minus" data-type="minus" data-field="">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </span>
                                
                                <input type="text" id="quantity" name="qty" class="input-number" value="1" min="1">
                            <span class="input-group-btn">
                                <button type="button" id="quantity-right" class="quantity-right-plus" data-type="plus" data-field="">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                  </div>
                    <!-- from-group end  -->
                    @if( ! $selectsizes->isEmpty() )
                      <div class="col-lg-12 col-md-12 col-sm-12 ">
                          <div class="form-group">   
                              <label for=""><strong>Select Size</strong> <span>*</span></label>
                                <ul class="details-size">
                                  @foreach($selectsizes as $size)
                                    <li>
                                      <input type="radio" id="size{{$size->id}}"  class="custom-radio"  name="proSize"  value="{{$size->sizeName}}" required="required">
                                      <label for="size{{$size->id}}">{{$size->sizeName}}</label>
                                    </li>
                                    @endforeach
                                </ul>
                                 @if ($errors->has('proSize'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('proSize') }}</strong>
                                </span>
                                @endif
                          </div>
                      </div>
                      <!-- col end -->
                       @endif

                      @if( ! $selectcolors->isEmpty() ) 
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">  
                              <label for=""><strong>Select Color</strong> <span>*</span></label>
                                <ul class="details-size">
                                  @foreach($selectcolors as $color)
                                    <li>
                                      <input type="radio" id="color{{$color->id}}"  class="custom-radio"  name="proColor"  value="{{$color->colorName}}" required="required">
                                      <label class="boxcolor" for="color{{$color->id}}">{{$color->colorName}}</label>
                                    </li>
                                    @endforeach
                                </ul>
                                 @if ($errors->has('proColor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('proColor') }}</strong>
                                </span>
                                @endif
                          </div>
                      </div>
                      <!-- col end -->
                       @endif
                    <div class="col-sm-12">
                        <div class="from-group">
                        <button class="dcartbtn" type="submit">Add To Cart</button>
                      </div>
                      <div class="from-group">
                        <a href="{{url('/add-to-wish/'.$productdetails->id)}}" class="dwishlistbtn"><i class="fa fa-heart"></i></a>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="reiveiw-title">
                          <h5>Product Details <i class="far fa-id-card"></i></h5>
                         </div>
                       <div class="product-details">
                           {!! $productdetails->productdetails !!}
                         </div>
                    </div>
                </form>
              </div>
             </div>
            </div>
            <!-- details row end -->
            <div class="description-tab">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="dmytab">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#additinal-details" role="tab" aria-controls="nav-profile" aria-selected="false">Additional Description</a><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Review</a>
                        <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Shipping Information</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Shop Information</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane show active fade" id="additinal-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            {!! $productdetails->productdetails2 !!}
                          </div>
                        </div>
                      </div>
                      <!-- tab end -->
                       <div class="tab-pane show fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="reiveiw-title">
                              <h5>Total @if($totalReviewPerson!=0) ({{$totalReviewPerson}}) @else (0) @endif Review</h5>
                            </div>
                            @if($allReview->count()!=NULL)

                              @foreach($allReview as $key=>$value)
                              <div class="person-review">
                                @php
                                  $reviewCustomer = App\Customer::where('id',$value->customer_id)->first();
                                @endphp
                                @if($reviewCustomer!=NULL)
                                <h4>{{$reviewCustomer->fullName}}</h4>
                                <div class="review">
                                  <ul>
                                    @if($value->ratting==1)
                                      <li><i class="fa fa-star"></i></li>
                                      @elseif($value->ratting==2)
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      @elseif($value->ratting==3)
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      @elseif($value->ratting==4)
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      @elseif($value->ratting==5)
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                    @endif
                                  </ul>
                                  <p>{{$value->review}}</p>
                                </div>
                                @endif
                              </div>
                              @endforeach
                              <!-- single review -->
                            @endif
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="get-review">
                              <div class="reiveiw-title">
                                <h5>Give You Review</h5>
                              </div>
                              @php
                                   $customerId = Session::get('customerId');
                                   $customerInfo=App\Customer::where(['id'=>$customerId])->first();
                              @endphp
                             @if($customerId==NULL)
                              <div class="login-btn">
                                <h4 class="details-login-first">Please Login First</h4>
                                <button class="dcartbtn" data-toggle="modal" data-target="#cloginModal">Login</button>
                              </div>
                              @else
                              <form action="{{url('customer/product/review')}}"  method="POST">
                                 @csrf
                                  <input type="hidden" name="product_id" value="{{$productdetails->id}}">
                                  <input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
                                  <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                                <div class="form-group">
                                  <label for="ratting">Select Review</label> 
                                <select name="ratting" id="" class="form-control{{ $errors->has('ratting') ? ' is-invalid' : '' }}" value="{{ old('ratting') }}" required>
                                    <option value=""> Select Your Review</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @if ($errors->has('ratting'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ratting') }}</strong>
                                      </span>
                                    @endif
                                </select>
                                </div>
                                <div class="form-group">
                                  <label for="review">Your Review Message</label>
                                  <textarea class="form-control{{ $errors->has('review') ? ' is-invalid' : '' }}" value="{{ old('review') }}"  name="review" id="" rows="5"></textarea>
                                  @if ($errors->has('review'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('review') }}</strong>
                                      </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <input type="submit" value="submit" class="reviewbtn">
                                </div>
                              </form>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <div class="reiveiw-title">
                          <h5>Shipping Information</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
                      </div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="vandor-shop">
                            <a href="{{url('vandorshop/'.$sellerinfo->slug.'/'.$sellerinfo->id)}}">
                                <div class="vshop-img">
                                  <img src="{{asset($sellerinfo->shoplogo)}}" alt="">
                                </div>
                                <p class="vshop-address">{{$sellerinfo->shopname}}<p>
                                @if($sellerinfo->selleraddress)
                                <p class="vshop-address">{{$sellerinfo->selleraddress}}
                                </p>
                                @endif
                                <a href="{{url('vandorshop/'.$sellerinfo->slug.'/'.$sellerinfo->id)}}" class="vshop-visit text-center">
                                  visit shop
                                </a>
                            </a>
                          </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- col 10 end -->

      </div>
    </div>
  </section>
      
      <div class="container">
        <div class="row">
              <div class="col-sm-12">
                <div class="similer-product">
                  <p>similar products</p>
                </div>
              </div>
              @foreach($relatedproduct as $key=>$value)
              <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="single-product">
                  <a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}">
                    <div class="image">
                      <div class="product-slider owl-carousel">
                         @foreach($productimage as $image)
                           @if($value->id==$image->product_id)
                              <img src="{{asset($image->image)}}" alt="">
                            @endif
                          @endforeach
                      </div>
                        
                        <div class="cart-area">
                            <ul>
                              <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="cart-btn">Add To Cart</a></li>
                              <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="wish-btn">Wishlist</a></li>
                            </ul>
                        </div>
                        <div class="cart-area">
                          <ul>
                            <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="cart-btn">Add To Cart</a></li>
                            <li><a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}" class="wish-btn">Wishlist</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="text">
                        <p class="name">{{str_limit($value->productname,20)}} </p>
                        <p class="newprice"><span>৳</span> {{$value->productnewprice}}</p>
                        @if($value->productoldprice)
                            <p class="oldprice"><del> ৳ {{$value->productoldprice}}</del> <span>
                            @endif- @if($value->productdiscount){{number_format($value->productdiscount,0)}} %</span>
                            @endif
                        </p>
                    </div>
                </a>
                </div>
              </div>
              <!-- column-ls-5 -->
              @endforeach
            </div>
            <!-- row end -->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="sortnav text-left">
                  {{$relatedproduct->links()}}
                </div>
              </div>
            </div>
      </div>
    <div class="review-login-modal">
      <!-- Modal -->
          <div class="modal fade" id="cloginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customer Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="customer-register marchantl-pannel">
                      <form action="{{url('customer/panel/review/login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="fullname">Email Or Phone <span>*</span></label>
                          <input type="text" class="form-control {{$errors->has('phoneOremail')? 'is-invalid' : ''}}" placeholder="Phone Or Email" name="phoneOremail" value="{{old('phoneOremail')}}">
                            @if($errors->has('phoneOremail'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('phoneOremail')}}</strong>
                              </span>
                            @endif
                        </div>
                          <div class="form-group">
                            <label for="email">Password <span>*</span></label>
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Your Password" name="password"  value="{{old('password')}}" >
                               @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="form-group">
                            <input type="submit" value="Login" class="registerbtn">
                          </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  <script>
    // product details zoom end
        $(document).ready(function(){
            var quantitiy=0;
            $('#quantity-right').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });
            $('#quantity-left').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined
                // Increment
                if(quantity>1){
                $('#quantity').val(quantity - 1);
                }
            });

        });
        // quantity increement and decreament
  </script>
@endsection