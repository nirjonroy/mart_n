<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
Route::group(['namespace'=>'frontEnd',], function(){

Route::get('/','frontEndController@index');
Route::get('/category/{slug}/{id}','frontEndController@category');
Route::get('/allcategory/','frontEndController@allcategory');
Route::get('/offer','frontEndController@offer');
Route::get('/brands','frontEndController@brands');
Route::get('/brands-products/{slug}/{catid}','frontEndController@brandsproducts');
Route::get('/new-product','frontEndController@newproduct');
Route::get('/special-offer','frontEndController@specialoffer');
Route::get('/subcategory/{slug}/{id}','frontEndController@subcategory');
Route::get('/products/{slug}/{id}','frontEndController@products');
Route::get('/shops','frontEndController@shops');
Route::get('vandorshop/{slug}/{id}','frontEndController@vandorshop');
Route::get('/product/details/{slug}/{id}','frontEndController@details');
Route::post('/customer/product/review','customerController@customerReview');
Route::get('/customer/register','customerController@registerPage');
Route::get('customer/resend/code/{id}','customerController@resendcode');
Route::get('/checkout','frontEndController@shipping');
Route::get('/proimage/remove', 'editor\ProductController@destroyoldimage');
Route::get('/contact-us','frontEndController@contactus');
Route::post('/visitor/contact', 'visitorcontactController@visitorcontact');
Route::get('more-info/{slug}/{id}', 'frontEndController@moreinfo');
Route::get('/ajax-area','customerController@district');
Route::post('coupon/customer/apply', 'customerController@applyCoupon');
Route::get('/shippingfee/','customerController@shippingfee');
Route::post('/shipping/information','customerController@shippingInfo');
Route::post('/shipping/information/update','customerController@shippingInfoUpdate');
Route::get('/shipping/content/','customerController@shippingajaxcontent');
Route::get('place-to-order','customerController@paymentForm');
Route::post('/payment/method','customerController@payment');
Route::post('/customer/register','customerController@customerRegister');
Route::get('/customer/email/verify/{id}/{token}','customerController@customerVerify');
Route::get('customer/forget-password','customerController@forgetpassword');
Route::post('customer/forget-password','customerController@forgetpassemailcheck');
Route::get('customer/forget-password/reset','customerController@passresetpage');
Route::post('customer/forget-password/reset','customerController@fpassreset');
Route::post('customer/panel/login','customerController@customerLogin');
Route::post('customer/panel/review/login','customerController@customerRlogin');
Route::get('/customer/my-account','customerController@customerAccount');
Route::get('/customer/profile','customerController@customerProfile');
Route::get('/customer/profile-edit','customerController@profileEdit');
Route::post('customer/profile/information/update','customerController@profileUpdate');
Route::get('/customer/order','customerController@customerOrder');
Route::get('/customer/order/track','customerController@customerOrdertrack');
Route::post('/customer/order/track-search','customerController@cordertrackSearch');
Route::get('/customer/order/invoice/{orderIdPrimary}','customerController@corderInvoice');
Route::get('/customer/login','customerController@customerLoginPage');
Route::get('/customer/shipping-address','customerController@shippingAddress');
Route::get('/customer/logout','customerController@customerLogout');
Route::get('error-page','frontEndController@errorpage');


Route::get('login/{provider}/redirect', 'SocialAuthController@redirect');
Route::get('login/{provider}/callback', 'SocialAuthController@callback');
Route::get('onlinecustomer/logout', 'SocialAuthController@socialcustomerLogout');
Route::get('/vacancies/searchcat','frontEndController@catcheck');
// add To Cart
Route::get('/add-to-cart/{id}/{quantity}','ShoppingcartController@addTocartGet');
Route::post('/add-to-cart/{id}','ShoppingcartController@addTocartPost');
Route::get('/ajax-order-now','ShoppingcartController@ajaxorderNow');

// cart content
Route::get('/order-now/{id}','ShoppingcartController@cartorderNow');
Route::get('/show-cart','ShoppingcartController@showCart');
Route::get('/increment-cart/{id}/{qty}','ShoppingcartController@incrementCart');
Route::get('/decrement-cart/{id}/{qty}','ShoppingcartController@decrementCart');
Route::get('/update-cart/{id}/{qty}','ShoppingcartController@updateCart');
Route::get('/delete-cart/{id}','ShoppingcartController@deleteCart');
Route::get('/cart/content','ShoppingcartController@cartContent');
Route::get('/cart/quantity','ShoppingcartController@cartQty');
Route::get('/offer-cart/{id}/{amount}','ShoppingcartController@cartOffer');


// wish list Route
Route::get('/add-to-wish/{id}','ShoppingcartController@addwishlist');
Route::get('/wishlist-product','ShoppingcartController@wishlistProduct');
Route::post('/wishlist-product-add/{id}/','ShoppingcartController@addcartTowishlist');
Route::post('/wishlist-delete-cart','ShoppingcartController@deleteWishlist');
Route::get('/add-to-compare/{id}','ShoppingcartController@addCompare');
Route::get('/compare-product/','ShoppingcartController@compareproduct');
Route::get('/compare-product-add/{id}/{rowId}','ShoppingcartController@compareProductadd');
Route::post('/compare-remove-cart/','ShoppingcartController@removeCompare');


// ==================== Seller Operation =====================

Route::get('login/seller/','SellerController@sellerlogin');
Route::get('register/seller/','SellerController@sellerregister');
Route::get('me/brand/request','SellerController@brandrequest');
Route::post('auth/me/seller/brand/request','SellerController@sellerbrandadd');
Route::post('auth/seller/register/','SellerController@sellersave');
Route::get('seller/email/verify/{slug}/{sellerid}/{verifyToken}','SellerController@sellerverifyPage');
Route::post('auth/seller/login/','SellerController@sellerauthlog');
Route::get('me/seller/','SellerController@sellerdashboard');
Route::get('me/seller/order/manage','SellerController@ordermanage');
Route::get('me/seller/edit/profile','SellerController@sellereditprofile');
Route::post('auth/seller/profile/edit','SellerController@profileupdate');
Route::post('auth/seller/password/change','SellerController@changepassword');
Route::get('forget/password/seller','SellerController@passwordforget');
Route::get('seller/forget/password/verify','SellerController@forgetcode');
Route::post('auth/seller-check/password/forget/','SellerController@forgeaccontcheck');
Route::post('auth/seller/password/forget/code/verify','SellerController@forgetcodeverfy');
Route::get('seller/forget/password/recovery','SellerController@passwordrecovery');
Route::post('auth/seller/password/forget/recovery','SellerController@updateforgetpass');
Route::get('/me/seller/logout','SellerController@sellerlogout');

// ajax route
Route::get('/ajax-product-subcategory','ProductController@subcategory');
Route::get('/ajax-product-childsubcategory','ProductController@childcategory');
Route::get('/ajax-product-brand','ProductController@subcatbrand');

// prodcut controller
Route::get('me/seller/new/product','ProductController@sellernewproduct');
Route::post('auth/me/seller/upload/product','ProductController@productupload');
Route::get('auth/me/seller/edit/product/{id}','ProductController@productedit');
Route::post('auth/me/seller/update/product','ProductController@productupdate');
Route::post('auth/me/seller/edit/product/delete','ProductController@productdelete');
Route::get('me/seller/manage/product','ProductController@sellermanageproduct');
});

// Live Search
Route::get('search_data/{keyword}', 'search\liveSearchController@SearchData');
Route::get('search_data', 'search\liveSearchController@SearchWithoutData');




Route::group(['as'=>'superadmin.', 'prefix'=>'superadmin', 'namespace'=>'superadmin','middleware'=>[ 'auth', 'superadmin']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
 // panel user route==
 	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/user/add', 'userController@add_user');
	Route::post('/user/save', 'userController@save_user');
	Route::get('/user/edit/{id}', 'userController@edit_user');
	Route::post('/user/update', 'userController@update_user');
	Route::get('/user/manage', 'userController@manage_user');
	Route::post('/user/inactive', 'userController@inactive_user');
	Route::post('/user/active', 'userController@active_user');
	Route::post('/user/delete', 'userController@destroy_user');
});

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'admin','middleware'=>['auth', 'admin']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

 // Logo route here
    Route::get('/advertisment/add','advertismentController@add');
    Route::post('/advertisment/save','advertismentController@store');
    Route::get('/advertisment/manage','advertismentController@manage');
    Route::get('/advertisment/edit/{id}','advertismentController@edit');
    Route::post('/advertisment/update','advertismentController@update');
    Route::post('/advertisment/inactive','advertismentController@inactive');
    Route::post('/advertisment/active','advertismentController@active');
    Route::post('/advertisment/delete','advertismentController@destroy');

    // news route
    Route::get('news/add','NewsController@index');
    Route::post('news/save','NewsController@store');
    Route::get('news/manage','NewsController@manage');
    Route::get('/news/edit/{id}','NewsController@edit');
    Route::post('/news/update','NewsController@update');
    Route::post('/news/inactive/','NewsController@inactive');
    Route::post('/news/active','NewsController@active');
    Route::post('/news/delete','NewsController@destroy');

    // couponcode route
    Route::get('couponcode/add','CouponcodeController@index');
    Route::post('couponcode/save','CouponcodeController@store');
    Route::get('couponcode/manage','CouponcodeController@manage');
    Route::get('/couponcode/edit/{id}','CouponcodeController@edit');
    Route::post('/couponcode/update','CouponcodeController@update');
    Route::post('/couponcode/inactive/','CouponcodeController@inactive');
    Route::post('/couponcode/active','CouponcodeController@active');
    Route::post('/couponcode/delete','CouponcodeController@destroy');

    // offer route
    Route::post('offer/save','OfferController@store');
    Route::get('offer/manage','OfferController@manage');
    Route::get('/offer/edit/{id}','OfferController@edit');
    Route::post('/offer/update','OfferController@update');
    Route::post('/offer/inactive/','OfferController@inactive');
    Route::post('/offer/active','OfferController@active');
    Route::post('/offer/delete','OfferController@destroy');

    // District information
     Route::get('/district/add','DistrictController@index');
     Route::post('/district/save','DistrictController@store');
     Route::get('/district/manage','DistrictController@manage');
     Route::get('/district/edit/{id}','DistrictController@edit');
     Route::post('/district/update','DistrictController@update');
     Route::post('/district/inactive','DistrictController@inactive');
     Route::post('/district/active','DistrictController@active');
     Route::post('/district/delete','DistrictController@destroy');

    // District information
     Route::get('/area/add','AreaController@index');
     Route::post('/area/save','AreaController@store');
     Route::get('/area/manage','AreaController@manage');
     Route::get('/area/edit/{id}','AreaController@edit');
     Route::post('/area/update','AreaController@update');
     Route::post('/area/inactive','AreaController@inactive');
     Route::post('/area/active','AreaController@active');
     Route::post('/area/delete','AreaController@destroy');

     Route::get('registared/customer','ReportsController@customers');
     Route::post('/customer/inactive','ReportsController@customerinactive');
     Route::post('/customer/active','ReportsController@customeractive'); 

     Route::post('/seller/informaion/update','ReportsController@sellerinfoupdate');   

});

Route::group(['as'=>'editor.', 'prefix'=>'editor', 'namespace'=>'editor','middleware'=>['auth', 'editor']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Logo route here
    Route::get('/logo/add','LogoController@add');
    Route::post('/logo/save','LogoController@store');
    Route::get('/logo/manage','LogoController@manage');
    Route::get('/logo/edit/{id}','LogoController@edit');
    Route::post('/logo/update','LogoController@update');
    Route::post('/logo/inactive','LogoController@inactive');
    Route::post('/logo/active','LogoController@active');
    Route::post('/logo/delete','LogoController@destroy');  
    
     //  er route here
    Route::get('/slider/add','SliderController@add');
    Route::post('/slider/save','SliderController@store');
    Route::get('/slider/manage','SliderController@manage');
    Route::get('/slider/edit/{id}','SliderController@edit');
    Route::post('/slider/update','SliderController@update');
    Route::post('/slider/inactive','SliderController@inactive');
    Route::post('/slider/active','SliderController@active');
    Route::post('/slider/delete','SliderController@destroy');    

     // Banner route here
    Route::get('/banner/add','BannerController@add');
    Route::post('/banner/save','BannerController@store');
    Route::get('/banner/manage','BannerController@manage');
    Route::get('/banner/edit/{id}','BannerController@edit');
    Route::post('/banner/update','BannerController@update');
    Route::post('/banner/inactive','BannerController@inactive');
    Route::post('/banner/active','BannerController@active');
    Route::post('banner/bulk-option','BannerController@bulkoption');
    Route::post('/banner/delete','BannerController@destroy');

     // productslider route here
    Route::get('/productslider/add','ProductSliderController@add');
    Route::post('/productslider/save','ProductSliderController@store');
    Route::get('/productslider/manage','ProductSliderController@manage');
    Route::get('/productslider/edit/{id}','ProductSliderController@edit');
    Route::post('/productslider/update','ProductSliderController@update');
    Route::post('/productslider/inactive','ProductSliderController@inactive');
    Route::post('/productslider/active','ProductSliderController@active');
    Route::post('/productslider/delete','ProductSliderController@destroy');
 	
    // category route
 	Route::get('category/add','CategoryController@index');
    Route::get('category/add','CategoryController@index');
	Route::post('category/save','CategoryController@store');
	Route::get('category/manage','CategoryController@manage');
	Route::get('/category/edit/{id}','CategoryController@edit');
	Route::get('/category/delete/{id}','CategoryController@Delete');
    Route::post('/category/update','CategoryController@update');
    Route::get('/category/menu-sort/{id}','CategoryController@menusort');
    Route::post('/category/menu-sort-update/','CategoryController@menusortupdate');
	Route::post('/category/inactive/','CategoryController@inactive');
	Route::post('/category/active','CategoryController@active');
    Route::post('category/licencekey/inactive','CategoryController@linactive');
    Route::post('category/licencekey/active','CategoryController@lactive');

	// childcategory route
	Route::get('subcategory/add','SubCategoryController@index');
	Route::post('subcategory/save','SubCategoryController@store');
	Route::get('subcategory/manage','SubCategoryController@manage');
    Route::get('subcategory/edit/{id}','SubCategoryController@edit');
    Route::post('subcategory/update','SubCategoryController@update');
    Route::post('subcategory/inactive','SubCategoryController@inactive');
    Route::post('/subcategory/active','SubCategoryController@active');
    Route::get('/subcategory/delete/{id}','SubCategoryController@Delete');

	// subcategory route
	Route::get('childcategory/add','ChildCategoryController@index');
	Route::post('childcategory/save','ChildCategoryController@store');
	Route::get('childcategory/manage','ChildCategoryController@manage');
    Route::get('childcategory/edit/{id}','ChildCategoryController@edit');
    Route::post('childcategory/update','ChildCategoryController@update');
    Route::post('childcategory/inactive','ChildCategoryController@inactive');
    Route::post('/childcategory/active','ChildCategoryController@active');
     Route::get('/childcategory/delete/{id}','ChildCategoryController@Delete');

    // Brand route
	Route::get('brand/add','BrandController@index');
	Route::post('brand/save','BrandController@store');
	Route::get('brand/manage','BrandController@manage');
    Route::get('brand/edit/{id}','BrandController@edit');
    Route::post('brand/update','BrandController@update');
    Route::post('brand/inactive','BrandController@inactive');
    Route::post('brand/active','BrandController@active');
    Route::get('brand/request/seller','BrandController@brandrequest');
    Route::get('brand/request/view/{id}','BrandController@viewrequestbrand');
    Route::post('brand/request/save','BrandController@requestbrandsave');
      Route::get('brand/delete/{id}','BrandController@delete');

    // Size insert
    Route::get('product-size/add','sizeController@index');
    Route::post('product-size/save','sizeController@store');
    Route::get('product-size/manage','sizeController@manage');
    Route::get('/product-size/edit/{id}','sizeController@edit');
    Route::post('/product-size/update','sizeController@update');
    Route::post('/product-size/inactive/','sizeController@inactive');
    Route::post('/product-size/active','sizeController@active');

    // Tag insert
    Route::get('product-tag/add','TagController@index');
    Route::post('product-tag/save','TagController@store');
    Route::get('product-tag/manage','TagController@manage');
    Route::get('/product-tag/edit/{id}','TagController@edit');
    Route::post('/product-tag/update','TagController@update');
    Route::post('/product-tag/inactive/','TagController@inactive');
    Route::post('/product-tag/active','TagController@active');

    // Color insert
    Route::get('product-color/add','colorController@index');
    Route::post('product-color/save','colorController@store');
    Route::get('product-color/manage','colorController@manage');
    Route::get('/product-color/edit/{id}','colorController@edit');
    Route::post('/product-color/update','colorController@update');
    Route::post('/product-color/inactive/','colorController@inactive');
    Route::post('/product-color/active','colorController@active');
    Route::post('/product-color/delete','colorController@destroy');

    //========= Product Manage =============== 
    
    Route::get('new/product-request/manage','ProductManageController@newproductrequest');
    Route::get('view/product-request/{id}','ProductManageController@viewdetailsrproduct');
    Route::get('seller/product-edit/{id}','ProductManageController@sellerproductedit');
    Route::post('new/product-request/approved','ProductManageController@productactive');
    Route::post('/seller/update/product','ProductManageController@sellerproductupdate');
    Route::get('seller/product/view/edit/{id}','ProductManageController@productedit');
    Route::post('seller/product/update','ProductManageController@updateproduct');
    Route::get('update/product-request','ProductManageController@updatependingproduct');
    Route::post('product-bulk-update','ProductManageController@bulkproductupdate');
    Route::post('new-product-manage/bulk-option','ProductManageController@newpbulkoption');
    Route::post('published/update-product-manage/bulk-option','ProductManageController@publishedbulkoption');
    
    Route::get('seller/product/view/delete/{id}','ProductManageController@productdelete');
    Route::get('product/image/delete/{id}','ProductManageController@productimagedelete');
    
    
    Route::get('allproduct/manage','ProductManageController@allproductmanage');
    
    

    // order manage
    Route::get('register-order/manage','ReportsController@ordermanage');
     Route::get('order/details/{shippingId}/{customerId}/{orderIdPrimary}','ReportsController@details');
     Route::get('order/details/{shippingId}/{customerId}/{orderIdPrimary}','ReportsController@orderdetails');
     Route::get('/payment/order/confirm/{cid}/{orderIdPrimary}','ReportsController@orderConfirm');
     Route::get('/payment/order/delivery/{cid}/{orderIdPrimary}','ReportsController@orderPaid');
     Route::get('/payment/order/cancelled/{cid}/{orderIdPrimary}','ReportsController@orderCancelled');

     Route::get('/guest-order/manage','ReportsController@guestorder');
    // Admin Reports
    Route::get('/complete/stock/report','ReportsController@completestockreport');
    Route::get('low/stock/report','ReportsController@lowstockreport');
    Route::get('out-of/stock/report','ReportsController@outstockreport');
    Route::get('/sales/report','ReportsController@salesreport');
    Route::post('/sales/report/filter','ReportsController@salesreportfilter');
    
    Route::get('/cancelled/report','ReportsController@cancelledreport');
    Route::get('/delivery/report','ReportsController@deliveryreport');
    
     // other page
    // Contact information
     Route::get('/contact-us/add','ContactController@index');
     Route::post('/contact-us/save','ContactController@store');
     Route::get('/contact-us/manage','ContactController@manage');
     Route::get('/contact-us/edit/{id}','ContactController@edit');
     Route::post('/contact-us/update','ContactController@update');
     Route::post('/contact-us/unpublished','ContactController@unpublished');
     Route::post('/contact-us/published','ContactController@published');
     Route::post('/contact-us/delete','ContactController@destroy');

    
       // Footer Page
    Route::get('/pagecategory/create','PagecategoryController@create');
    Route::post('/pagecategory/save','PagecategoryController@store');
    Route::get('/pagecategory/manage','PagecategoryController@manage');
    Route::get('/pagecategory/edit/{id}','PagecategoryController@edit');
    Route::post('/pagecategory/update','PagecategoryController@update');
    Route::post('/pagecategory/inactive','PagecategoryController@inactive');
    Route::post('//pagecategory/active','PagecategoryController@active');

    // Page Design
    Route::get('/createpage/create','CreatepageController@create');
    Route::post('/createpage/save','CreatepageController@store');
    Route::get('/createpage/manage','CreatepageController@manage');
    Route::get('/createpage/edit/{id}','CreatepageController@edit');
    Route::post('/createpage/update','CreatepageController@update');
    Route::post('/createpage/inactive','CreatepageController@inactive');
    Route::post('/createpage/active','CreatepageController@active');
    
     Route::get('/social-media/add','SocialController@index');
     Route::post('/social-media/save','SocialController@store');
     Route::get('/social-media/manage','SocialController@manage');
     Route::get('/social-media/edit/{id}','SocialController@edit');
     Route::post('/social-media/update','SocialController@update');
     Route::post('/social-media/unpublished','SocialController@unpublished');
     Route::post('/social-media/published','SocialController@published');
     Route::post('/social-media/delete','SocialController@destroy');

    Route::get('shippingfee/add','ShippingfeeController@index');
    Route::post('shippingfee/save','ShippingfeeController@store');
    Route::get('shippingfee/manage','ShippingfeeController@manage');
    Route::get('/shippingfee/edit/{id}','ShippingfeeController@edit');
    Route::post('/shippingfee/update','ShippingfeeController@update');
    Route::get('/shippingfee/menu-sort/{id}','ShippingfeeController@menusort');
    Route::post('/shippingfee/menu-sort-update/','ShippingfeeController@menusortupdate');
    Route::post('/shippingfee/inactive/','ShippingfeeController@inactive');
    Route::post('/shippingfee/active','ShippingfeeController@active');


    // seller reports
     Route::post('/seller/inactive','ReportsController@sellerinactive');
     Route::post('/seller/active','ReportsController@selleractive');
     Route::get('/all/seller','ReportsController@seller');
     // seller option
     Route::get('seller/view/{id}/{slug}','ReportsController@sellerview');
     Route::post('seller/bulk-option','ReportsController@bulkseller');
     Route::get('seller/product/view/{id}','ReportsController@sellerproduct');
     Route::post('seller/product/bulk-option','ReportsController@productbulkoption');
     
     //seler delete
     Route::get('seller/product/delete/{id}','ReportsController@sellerdelete');

    // product uploading
     Route::get('seller/product/add','ProductManageController@productadd');
     Route::post('seller/new/product/upload','ProductManageController@productupload');
     
    
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'author','middleware'=>['auth', 'author']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

// other route

Route::group(['middleware'=>['auth']], function(){
    Route::get('password/change', 'ChangePassController@index');
    Route::post('password/updated', 'ChangePassController@updated');
});