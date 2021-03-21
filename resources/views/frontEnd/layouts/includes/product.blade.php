 @if($products->isEmpty())
  <p>No Product Found</p>
@else
 
<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>category</h2>
                        <ul>
                            <li><a href="#">home &nbsp;/ </a></li>
                            <li><a href="#">category &nbsp;/ </a></li>
                            <li><a href="#">product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--no slider start-->
<section class="section-big-py-space ratio_asos bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col">
                <div class="no-slider row product">
                    <div class="product-box">
                        <div class="product-imgbox">
                            <div class="product-front">
                                <img src="../assets/images/layout-1/product/1.jpg" class="img-fluid" alt="product">
                            </div>
                            <div class="product-back">
                                <img src="../assets/images/layout-1/product/a1.jpg" class="img-fluid" alt="product">
                            </div>
                            <div class="product-icon">
                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                    <i class="ti-bag" ></i>
                                </button>
                                <a href="javascript:void(0)" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                    <i class="ti-search" aria-hidden="true"></i>
                                </a>
                                <a href="compare.html" title="Compare">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="new-label">
                                <div>new</div>
                            </div>
                            <div class="on-sale">
                                on sale
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="detail-title">
                                <div class="detail-left">
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="">
                                        <h6 class="price-title">
                                            reader will be distracted.
                                        </h6>
                                    </a>
                                </div>
                                <div class="detail-right">
                                    <div class="check-price">
                                        $ 56.21
                                    </div>
                                    <div class="price">
                                        <div class="price">
                                            $ 24.05
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
</section>
<!--no slider end-->




@endif