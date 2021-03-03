@extends('frontEnd.layouts.master')
@section('title',$bredcrumb->childcategoryName)
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
               <li><a class="anchor"><p>{{$bredcrumb->childcategoryName}}</a> - Total Found {{$products->count()}} Products</p></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- bredcrumb end -->
  <section class="common-design">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <div class="sidebar">
              <div class="custom-sidebar">
                <div class="title ">
                  <h6>Color</h6>
                 </div>
                 <div class="category-checkbox @if($colors->count() > 10) scrollClass  @endif">
                   @foreach($colors as $color)
                      <div class="sidebar-item row">
                         <div class="col-lg-9 col-md-9 col-sm-9">
                             <div class="ls-checkbox">
                            <label class="cat-chechbox"><a href="{{url('/products/color/'.$color->slug.'/'.$bredcrumb->id.'/'.$color->id)}}"><p> <span style="height: 12px;width: 12px;background:{{$color->color}};display: inline-block;border-radius: 50px;margin-right: 5px;overflow: hidden;"></span> {{$color->colorName}}</p>
                                <input type="checkbox" value="{{$color->id}}" name="color[]" class="filters">
                                <span class="checkmark"></span>
                                </a>
                              </label>
                             </div>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3">
                             <div class="ls-cat-count">
                              @php
                                $allcolor =\App\Productcolor::join('colors','productcolors.color_id','=', 'colors.id')
                                ->join('products','productcolors.product_id','=', 'products.id')
                               ->select('productcolors.*')
                               ->where(['products.status'=>1,'products.productchildcat'=>$bredcrumb->id,'color_id'=>$color->id])
                               ->get();
                              @endphp
                              <p>({{$allcolor->count()}})</p>
                             </div>
                         </div> 
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
                          $brandname=App\Brand::where('id',$brand->brand_id)->first();
                          $totalproduct = App\Product::where(['status'=>1,'request'=>1,'productbrand'=>$brandname->id,'productchildcat'=>$bredcrumb->id])->get();
                        @endphp
                        <div class="sidebar-item row">
                           <div class="col-lg-9 col-md-9 col-sm-9">
                               <div class="ls-checkbox">
                                <label class="cat-chechbox"><p><a href="{{url('products/brand/'.$brandname->slug.'/'.$bredcrumb->id.'/'.$brand->brand_id)}}">{{$brandname->brandName}}</p>
                                    <input type="checkbox" value="1" name="brand[]" class="filters">
                                    <span class="checkmark"></span>
                                 </a>
                                  </label>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-3 col-sm-3">
                               <div class="ls-cat-count">
                                <p>({{$totalproduct->count()}})</p>
                               </div>
                           </div> 
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
                    @for($var1=$minprice; $var1 < $maxprice; $var1=$var1+$var1)
                    <div class="sidebar-item row">
                       <div class="col-lg-9 col-md-9 col-sm-9">
                           <div class="ls-checkbox">
                            @php
                              $var2=$var1+$var1;
                            @endphp
                            <label class="cat-chechbox"><p><a href="{{url('/products/price/'.$bredcrumb->id.'/'.$var1.'/'.$var2)}}"> {{$var1}} -  {{$var2}}</p>
                              <input type="checkbox" value="1" name="price[]" class="filters">
                              <span class="checkmark"></span>
                            </a>
                            </label>   
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3">
                           <div class="ls-cat-count">
                            @php
                                $priceproduct = App\Product::where(['productchildcat'=>$bredcrumb->id,'request'=>1,'status'=>1])->whereBetween('productnewprice',[$var1,$var2])->get();
                            @endphp
                            <p>({{$priceproduct->count()}})</p>
                           </div>
                       </div> 
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
                        <div class="sidebar-item row">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                               <div class="ls-checkbox">
                                  <label class="cat-chechbox"><p><a href="{{url('products/discount/'.$bredcrumb->id.'/'.$dis)}}"> {{$dis}}% and Above</p>
                                    <input type="checkbox" value="1" name="discount" class="filters"/>
                                    <span class="checkmark"></span>
                                 </a>
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
                      <div class="sortdiv-menu">
                          <ul>
                            <li><a class="anchor bundle">Bundles <i class="fa fa-angle-down"></i></a></li>
                            <li><a class="anchor size">Size <i class="fa fa-angle-down"></i></a></li>
                          </ul>
                      </div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7 col-md-7 col-sm-7 col-6">
                      <div class="product-sorting">
                        <p>Sort By :</p><form >
                          <select name="productfilter" class="dynamic_select">
                             <option value="">Select Sort</option>
                             <option value="newest" @if(Request::segment(6)=="newest") selected="selected" @endif>Newest</option>
                             <option value="oldest" @if(Request::segment(6)=="oldest") selected="selected" @endif>Oldest</option>
                             <option value="name"  @if(Request::segment(6)=="name") selected="selected" @endif>Name</option>
                             <option value="lowprice"  @if(Request::segment(6)=="lowprice") selected="selected" @endif>Low Price</option>
                             <option value="highprice"  @if(Request::segment(6)=="highprice") selected="selected" @endif>High Price</option>
                         </select>
                        <input type="hidden" value="{{$bredcrumb->slug}}" class="slug">
                        <input type="hidden" value="{{$bredcrumb->id}}" class="childcatid">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- sorting row -->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="single-sortdiv bundle-div">
                    <ul>
                      @foreach($bundles as $bundle)
                       <li><div class="ls-checkbox">
                              <label class="cat-chechbox"><a href="{{url('/products/bundles/'.$bundle->slug.'/'.$bredcrumb->id.'/'.$bundle->id)}}"><p>{{$bundle->bundleName}}</p>
                                  <input type="checkbox" value="1" name="bundles[]" class="filters">
                                  <span class="checkmark"></span>
                                  </a>
                                </label>
                           </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="single-sortdiv size-div">
                    <ul>
                      @foreach($sizes as $size)
                       <li><div class="ls-checkbox">
                              <label class="cat-chechbox"><a href="{{url('/products/sizes/'.$size->slug.'/'.$bredcrumb->id.'/'.$size->id)}}"><p>{{$size->sizeName}}</p>
                                  <input type="checkbox" value="{{$size->id}}" name="sizes[]" class="filters">
                                  <span class="checkmark"></span>
                                  </a>
                                </label>
                           </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
            </div>
            <div class="row">
              @foreach($products as $key=>$value)
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
                  <ul>
                    {{$products->links()}}
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
   <div class="footer-bar">
      <ul>
        <li class="fsort"><a class="anchor">
          <i class="fas fa-sort-amount-up"></i>
          <span>Sort</span>
        </a></li>
        <li class="ffilter"><a class="anchor"><i class="fas fa-filter"></i> <span>Filter</span></a></li>
      </ul>
  </div>
  <div class="ffilter-body">
    <div class="ffilter-head">
      <p><strong>Filter</strong></p>
    </div>
    <div class="v-tab">
      <ul class="v-tab_tab-head">
        <li class="active" rel="category">Category</li>
        <li rel="color">Color</li>
        <li rel="brand">Brands</li>
        <li rel="pricerange">Price Range</li>
        <li rel="discount">Discount</li>
      </ul>
      <div class="v-tab_container">
        <div id="category" class="v-tab_content">
          <ul>
            <a href="{{url('/products/'.$bredcrumb->slug.'/'.$bredcrumb->id)}}">{{$bredcrumb->childcategoryName}} 

               @php
                $totalproduct = App\Product::where(['status'=>1,'productchildcat'=>$bredcrumb->id])->count();
              @endphp<span>{{$totalproduct}}</span>
          </a>
          </ul>
        </div>
        <!-- #category -->
        <div id="color" class="v-tab_content">
          <ul>
            @foreach($colors as $color)
              <li>
                 <a href="{{url('/products/color/'.$color->slug.'/'.$bredcrumb->id.'/'.$color->id)}}">{{$color->colorName}}
                   @php
                      $allcolor =\App\Productcolor::join('colors','productcolors.color_id','=', 'colors.id')
                      ->join('products','productcolors.product_id','=', 'products.id')
                     ->select('productcolors.*')
                     ->where(['products.status'=>1,'products.productchildcat'=>$bredcrumb->id,'color_id'=>$color->id])
                     ->get();
                    @endphp
                    <span>({{$allcolor->count()}})</span>
                  </a>
              </li> 
            @endforeach
          </ul>
        </div>
        <!-- #color -->
        <div id="brand" class="v-tab_content">
          <ul>
            @foreach($brands as $brand)
                @php
                  $brandname=App\Brand::where('id',$brand->brand_id)->first();
                  $totalproduct = App\Product::where(['status'=>1,'request'=>1,'productbrand'=>$brandname->id])->get();
                @endphp
              <li>
                 <a href="{{url('products/brand/'.$brandname->slug.'/'.$bredcrumb->id.'/'.$brand->brand_id)}}">{{$brandname->brandName}}
                  <span>({{$totalproduct->count()}})</span>
                  </a>
              </li> 
            @endforeach
          </ul>
        </div>
        <!-- #brand -->
        <div id="pricerange" class="v-tab_content">
           <ul>
            @for($var1=$minprice; $var1 < $maxprice; $var1=$var1+$var1)

            @php
              $var2=$var1+$var1;
            @endphp
              <li>
                 <a href="{{url('/products/price/'.$bredcrumb->id.'/'.$var1.'/'.$var2)}}">{{$var1}} -  {{$var2}}

                   @php
                      $priceproduct = App\Product::where(['productsubcat'=>$bredcrumb->id,'request'=>1,'status'=>1])->whereBetween('productnewprice',[$var1,$var2])->get();
                  @endphp
                  <span>({{$priceproduct->count()}})</span>
                  </a>
              </li> 
           @endfor
          </ul>
        </div>
        <!-- #pricerange -->
        <div id="discount" class="v-tab_content">
            <ul>
               @for($dis=10; $dis <= 80; $dis=$dis+10)
                  <li>
                     <a href="{{url('products/discount/'.$bredcrumb->id.'/'.$dis)}}">{{$dis}}% and Above
                      </a>
                  </li> 
                 @endfor
            </ul>
        </div>
        <!-- #pricerange --> 
    </div>
  </div>
</div>
<!-- footer filter -->
<div class="fsort-body">
  <div class="fsort-head">
    <p><strong>Sort </strong></p>
  </div>
  <form action="">
   <select name="productfilter" class="dynamic_select">
     <option value="">Select Sort</option>
     <option value="newest" @if(Request::segment(6)=="newest") selected="selected" @endif>Newest</option>
     <option value="oldest" @if(Request::segment(6)=="oldest") selected="selected" @endif>Oldest</option>
     <option value="name"  @if(Request::segment(6)=="name") selected="selected" @endif>Name</option>
     <option value="lowprice"  @if(Request::segment(6)=="lowprice") selected="selected" @endif>Low Price</option>
     <option value="highprice"  @if(Request::segment(6)=="highprice") selected="selected" @endif>High Price</option>
  </select>
</div>
<script>
      $('.dynamic_select').on('change', function () {
          var slug = $('.slug').val(); // get selected value
          var childcatid = $('.childcatid').val(); // get selected value
          var sort = $(this).val(); // get selected value
          if (slug,childcatid,sort) { 
             window.location='https://gatewaygroup.com.bd/ongona/products/sort/'+slug+'/'+childcatid+'/'+sort;
          }
          return false;
      });
</script>
@endsection
