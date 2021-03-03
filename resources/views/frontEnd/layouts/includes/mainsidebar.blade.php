<div class="sidebar">
    <div class="custom-sidebar">
      <div class="title ">
          <h6>Categories</h6>
        </div>
       <div class="category-checkbox">
         @foreach($sidebarmenu as $category)
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>{{$category->catname}}</p>
                      <input type="checkbox" value="{{$category->id}}" name="category[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    @php
                      $totalproduct = App\Product::where(['status'=>1,'productcat'=>$category->id])->get();
                    @endphp
                    <p>({{$totalproduct->count()}})</p>
                   </div>
               </div> 
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
       <div class="category-checkbox">
         @foreach($colors as $color)
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>{{$color->colorName}}</p>
                      <input type="checkbox" value="{{$color->id}}" name="color[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    @php
                      $totalproduct = App\Product::where(['status'=>1,'productcat'=>$category->id])->get();
                    @endphp
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
          <h6>Brands</h6>
        </div>
       <div class="category-checkbox">
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>Brand One</p>
                      <input type="checkbox" value="1" name="brand[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
        </div>
    </div>
     <!-- single custom sidebar -->
    <div class="custom-sidebar">
      <div class="title ">
          <h6>Discount Range</h6>
        </div>
        <div class="category-checkbox">
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>500 - 1500</p>
                      <input type="checkbox" value="1" name="price[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>500 - 1499 Tk</p>
                      <input type="checkbox" value="1" name="price[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>1500 - 2499 Tk</p>
                      <input type="checkbox" value="1" name="price[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>2500 - 3499 Tk</p>
                      <input type="checkbox" value="1" name="price[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
            <div class="sidebar-item row">
               <div class="col-lg-9 col-md-9 col-sm-9">
                   <div class="ls-checkbox">
                    <label class="cat-chechbox"><p>3500 - 4999 Tk</p>
                      <input type="checkbox" value="1" name="price[]">
                      <span class="checkmark"></span>
                    </label>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                   <div class="ls-cat-count">
                    <p>(0)</p>
                   </div>
               </div> 
            </div>
    </div>
     <!-- single custom sidebar -->
  </div>
  </div>