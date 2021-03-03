@extends('frontEnd.layouts.master')
@section('title',$bredcrumb->catname)
@section('content')
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
              <li><a class="anchor">{{$bredcrumb->catname}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <!-- Shop section end -->
    <section class="section-margin common-design">
        <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="sidebar">
                    <div class="custom-sidebar ">
                      <div class="title ">
                          <h6>{{$bredcrumb->catname}}</h6>
                        </div>
                       <div class="category-checkbox @if($subcategories->count() > 10) scrollClass  @endif">
                         @foreach($subcategories as $key=>$value)
                            <div class="sidebar-item row">
                              @php
                                  $totalproduct = App\Product::where(['status'=>1,'productsubcat'=>$value->id])->count();
                              @endphp
                              @if($totalproduct)
                               <div class="col-lg-9 col-md-9 col-sm-9">
                                   <div class="ls-checkbox">
                                    <label class="cat-chechbox"><p>{{$value->subcategoryName}}</p>
                                      <input type="checkbox" name="subcategory[]" value="{{$value->id}}" class="subcategory">
                                      <span class="checkmark"></span>
                                    </label>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-3 col-sm-3">
                                   <div class="ls-cat-count">
                                    <p>({{$totalproduct}})</p>
                                   </div>
                               </div> 
                               @endif
                            </div>
                            @endforeach
                            <!-- .sidebar-item end-->
                        </div>
                    </div>
                    <!-- single custom sidebar -->
                    <div class="custom-sidebar">
                      <div class="title ">
                          <h6>Color</h6>
                        </div>
                       <div class="category-checkbox @if($colors->count() > 10) scrollClass  @endif">
                         @foreach($colors as $color)
                            <div class="sidebar-item row">
                                @php
                                  $allcolor =\App\Productcolor::join('colors','productcolors.color_id','=', 'colors.id')
                                  ->join('products','productcolors.product_id','=', 'products.id')
                                 ->select('productcolors.*')
                                 ->where(['products.status'=>1,'products.productcat'=>$bredcrumb->id,'color_id'=>$color->id])
                                 ->count();
                                @endphp
                                @if($allcolor)
                               <div class="col-lg-9 col-md-9 col-sm-9">
                                   <div class="ls-checkbox">
                                  
                                  <label class="cat-chechbox"><p> <span style="height: 12px;width: 12px;background:{{$color->color}};display: inline-block;border-radius: 50px;margin-right: 5px;overflow: hidden;"></span> {{$color->colorName}}</p>
                                      <input type="checkbox" value="{{$color->id}}" name="color[]" class="color">
                                      <span class="checkmark"></span>
                                      </a>
                                    </label>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-3 col-sm-3">
                                   <div class="ls-cat-count">
                                    <p>({{$allcolor}})</p>
                                   </div>
                               </div> 
                               @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                     <!-- single custom sidebar -->
                    <div class="custom-sidebar">
                      <div class="title ">
                          <h6>Brands</h6>
                        </div>
                         <div class="category-checkbox @if($brands->count() > 10) scrollClass  @endif">
                          @foreach($brands as $brand)
                              @php
                                $totalproduct = App\Product::where(['status'=>1,'request'=>1,'productbrand'=>$brand->id])->count();
                              @endphp
                              <div class="sidebar-item row"> 
                                @if($totalproduct)
                                 <div class="col-lg-9 col-md-9 col-sm-9">
                                     <div class="ls-checkbox">
                                      <label class="cat-chechbox"><p>{{$brand->brandName}}</p>
                                          <input type="checkbox" value="{{$brand->id}}" name="brand[]" class="brand">
                                          <span class="checkmark"></span>
                                        </label>
                                     </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-3">
                                     <div class="ls-cat-count">
                                      <p>({{$totalproduct}})</p>
                                     </div>
                                 </div> 
                                  @endif
                              </div>
                            @endforeach
                        </div>
                    </div>
                     <!-- single custom sidebar -->
                    <div class="custom-sidebar">
                      <div class="title ">
                          <h6>Price Range</h6>
                        </div>
                        <div class="category-checkbox">
                          @php
                              $subcatid = Request::segment(3);
                          @endphp
                          @for($var1=$minprice; $var1 < $maxprice; $var1=$var1+$var1)
                          <div class="sidebar-item row">
                              @php
                                  $var2=$var1+$var1;
                                  $priceproduct = App\Product::where(['productcat'=>$bredcrumb->id,'request'=>1,'status'=>1])->whereBetween('productnewprice',[$var1,$var2])->get();
                              @endphp
                              @if($priceproduct)
                             <div class="col-lg-9 col-md-9 col-sm-9">
                                 <div class="ls-checkbox ">
                                  <label class="priceranged cat-chechbox"><p>{{$var1}} -  {{$var2}}</p>
                                    <input type="radio" value="[{{$var1}},{{$var2}}]" name="price[]" class="minprice">
                                    <span class="checkmark"></span>
                                  </label>   
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-3 col-sm-3">
                                 <div class="ls-cat-count">
                                  
                                  <p>({{$priceproduct->count()}})</p>
                                 </div>
                             </div> 
                             @endif
                          </div>
                          @endfor
                    </div>
                  </div>
                  <!-- single custom sidebar -->
                    <div class="custom-sidebar">
                      <div class="title ">
                          <h6>Discount Range</h6>
                        </div>
                        
                         <div class="category-checkbox">
                          @for($dis=10; $dis <= 80; $dis=$dis+10)
                          @php
                              $subcat_id = Request::segment(3);
                          @endphp
                              <div class="sidebar-item row">
                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                     <div class="ls-checkbox">
                                        <label class="cat-chechbox"><p>{{$dis}}% and Above</p>
                                          <input type="radio" value="{{$dis}}" name="discount" class="discount"/>
                                          <span class="checkmark"></span>
                                        </label>
                                     </div>
                                 </div>
                              </div>
                              <!-- item row end -->
                            @endfor
                        </div>
                  </div>
                  <!-- single custom sidebar -->
                </div>
              </div>
              <!-- col-lg end -->
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <div class="maincontent">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="sorting-nav">
                          <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-6">
                              <div class="cat-name">
                                <strong>{{$bredcrumb->catname}}</strong>
                              </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-6">
                              <div class="product-sorting">
                                <p>Sort By :</p> <form >
                                  <select name="productfilter" class="subcatsort dynamic_select">
                                     <option value="">Select Sort</option>
                                     <option value="1">Newest</option>
                                     <option value="2">Oldest</option>
                                     <option value="3">Low Price</option>
                                     <option value="4">High Price</option>
                                     <option value="5">A-Z</option>
                                 </select>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- sorting row -->
                    <div class="updateDiv row">
                      @foreach($products as $key=>$value)
                      <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                        <div class="single-product">
                          <a href="{{url('product/details/'.$value->slug.'/'.$value->id)}}">
                            <div class="image">
                              <div class="single-product-image">
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
                          {{$products->links()}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop section end -->

@endsection

