<?php
namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Logo;
use App\Product;
use App\Brand;
use App\Customer;
use App\Color;
use App\Size;
use App\Bundles;
use App\Comment;
use App\Customermessage;
use App\Advertisment;
use App\Productimage;
use App\Shippingfee;
use App\Pagecategory;
use App\Socialmedia;
use App\Seller;
use App\District;
use App\Offer;
use DB;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // main logo here
        $mainlogo=Logo::where('status',1)->orderBy('id','DESC')->limit(1,0)->get(); 
        view()->share(compact('mainlogo'));
        // faveicon
        $faveicon=Logo::where('status',1)->orderBy('id','DESC')->limit(1,0)->get(); 
        view()->share(compact('faveicon'));
        // mainlogo
        $socialmedia=Socialmedia::where('status',1)->orderBy('id','ASC')->get(); 
        view()->share(compact('socialmedia'));
        // mainlogo
        $categories = Category::where('status',1)->get();
        view()->share(compact('categories'));
        // category
        $sidebarmenu = Category::where('status',1)->orderBy('level','ASC')->limit(12)->get();
        view()->share(compact('sidebarmenu'));
        // Brand
        $brands = Brand::where('status',1)->get();
        view()->share(compact('brands'));

        $colors = Color::where('status',1)->get();
        view()->share(compact('colors'));

        $sizes = Size::where('status',1)->get();
        view()->share(compact('sizes'));

        $bundles = Bundles::where('status',1)->get();
        view()->share(compact('bundles'));

        $shops = Seller::where('status',1)->get();
        view()->share(compact('shops'));

        $productimage =Productimage::orderBy('id','ASC')
        ->get();
         view()->share(compact('productimage'));

       $companyinfo = Pagecategory::where(['status'=>1,'menu_id'=>1])->get();
        view()->share(compact('companyinfo'));

       $needhelp = Pagecategory::where(['status'=>1,'menu_id'=>2])->get();
       view()->share(compact('needhelp'));

       $districts = District::orderBy('status','1')->get();;
       view()->share(compact('districts'));

       $offers = Offer::orderBy('status','1')->get();;
       view()->share(compact('offers'));
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
