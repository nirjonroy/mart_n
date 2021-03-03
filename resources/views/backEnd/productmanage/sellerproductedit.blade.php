@extends('backEnd.layouts.master')
@section('title','Seller Product Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Seller Product Edit</h3>
          <div class="short_button">
            <a href="{{url('/editor/brand/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <form action="{{url('editor/seller/update/product')}}" method="POST" enctype="multipart/form-data" name="editForm">
                    @csrf 
                      @php
                           $SellerId = Session::get('SellerId');
                      @endphp
                      <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="row">
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productcat">Product Category <span>*</span></label>
                            <select type="text" id="productcat" class="select2 form-control {{$errors->has('productcat')? 'is-invalid' : ''}}" name="productcat"  value="{{old('productcat')}}" required>
                              <option value="">====Select Category=====</option>
                              @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->catname}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('productcat'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productcat')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productsubcat">Product Subcategory <span>*</span></label>
                            <select  name="productsubcat" id="productsubcat" class="form-control{{ $errors->has('productsubcat') ? ' is-invalid' : '' }}"  id="productsubcat"  value="{{ old('productsubcat') }}" required>
                             @foreach($subcategory as $value)
                                 <option value="{{$value->id}}">{{$value->subcategoryName}}</option>
                              @endforeach 
                           </select>
                            @if($errors->has('productsubcat'))
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('productsubcat')}}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productchildcat">Product Child Category</label>
                            <select  name="productchildcat" id="productchildcat" class=" form-control{{ $errors->has('productchildcat') ? ' is-invalid' : '' }}"  id="productchildcat" value="{{ old('productchildcat') }}">
                              
                            @foreach($childcategory as $value)
                               <option value="{{$value->id}}">{{$value->childcategoryName}}</option>
                              @endforeach 
                             </select>
                            @if($errors->has('productchildcat'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productchildcat')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productbrand">Product Brand</label>
                            <select  name="productbrand" id="productbrand" class="form-control{{ $errors->has('productbrand') ? ' is-invalid' : '' }}"  id="productbrand" value="{{ old('productbrand') }}">
                            @foreach($brands as $key=>$value)
                               <option value="{{$value->id}}">{{$value->brandName}}</option>
                            @endforeach 
                           </select>
                            @if($errors->has('productbrand'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productbrand')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <!-- col end -->
                        <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                            <label for="productname">Product Name <span>*</span></label>
                            <input type="text" name="productname" class=" form-control{{ $errors->has('productname') ? ' is-invalid' : '' }}"  id="productname" value="{{ $edit_data->productname }}" required>
                            @if($errors->has('productname'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productname')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="sellerid">Seller Name</label>
                              <select  name="sellerid" id="sellerid" class="form-control{{ $errors->has('sellerid') ? ' is-invalid' : '' }}"  id="sellerid">
                                <option value="">=== Select Seller Name ===</option>
                                @foreach($sellers as $key=>$value)
                                   <option value="{{$value->id}}">{{$value->shopname}}</option>
                                @endforeach 
                                  </select>
                                @if($errors->has('sellerid'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{$errors->first('sellerid')}}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                        <!-- col end -->

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productnewprice">New Price <span>*</span></label>
                            <input type="text" name="productnewprice" class=" form-control{{ $errors->has('productnewprice') ? ' is-invalid' : '' }}"  id="productnewprice" value="{{ $edit_data->productnewprice }}" required>
                            @if($errors->has('productnewprice'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productnewprice')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        
                      <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                          <label for="productoldprice">Old Price </label>
                          <input type="text" name="productoldprice" class=" form-control{{ $errors->has('productoldprice') ? ' is-invalid' : '' }}"  id="productoldprice" value="{{ $edit_data->productoldprice }}">
                          @if($errors->has('productoldprice'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('productoldprice')}}</strong>
                                      </span>
                                  @endif
                        </div>
                      </div>
                      <!-- col end -->
                       <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                          <label for="title">Product Size</label>
                              <select name="proSize[]" class="form-control select2{{ $errors->has('proSize') ? ' is-invalid' : '' }} custom-select" multiple="multiple">
                                @foreach($totalsizes as $totalsize)
                                  <option value="{{$totalsize->id}}" @foreach($productSize as $selectsize) @if($totalsize->id == $selectsize->size_id)selected="selected"@endif @endforeach>{{$totalsize->sizeName}}</option>
                              @endforeach
                              </select>
                              @if ($errors->has('proSize'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('proSize') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.form-group -->
                       <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                          <label for="title">Product Color</label>
                              <select name="productcolor[]" class="form-control select2{{ $errors->has('productcolor') ? ' is-invalid' : '' }} custom-select" multiple="multiple">
                                 @foreach($totalcolors as $totalcolor)
                                  <option value="{{$totalcolor->id}}" @foreach($productColors as $selectcolor) @if($totalcolor->id == $selectcolor->color_id)selected="selected"@endif @endforeach>{{$totalcolor->colorName}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('proColor'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('proColor') }}</strong>
                                </span>
                                @endif
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productquantity">Product Quantity (Stock) <span>*</span></label>
                            <input type="number" min="1" name="productquantity" class=" form-control{{ $errors->has('productquantity') ? ' is-invalid' : '' }}"  id="productquantity" value="{{ $edit_data->productquantity }}" required>
                            @if($errors->has('productquantity'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productquantity')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="additionalshipping">Additional Shipping Charge</label>
                            <input type="number" min="1" name="additionalshipping" class=" form-control{{ $errors->has('additionalshipping') ? ' is-invalid' : '' }}"  id="additionalshipping" value="{{$edit_data->additionalshipping}}">
                            @if($errors->has('additionalshipping'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('additionalshipping')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->

                        <div class="col-md-8 col-sm-8">
                        <div class="form-group">
                          <label for="image">Product Image<span>*</span> (Size: max:6MB, Type:jpg,jpeg,png)</label>

                            <div class="clone hide" style="display: none;">
                              <div class="control-group input-group{{ $errors->has('image') ? ' is-invalid' : '' }}" style="margin-top:10px">
                                <input type="file" name="image[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                </div>
                              </div>
                            </div>
                            <div class="input-group control-group increment" >
                            <input type="file" name="image[]" class="form-control">
                            <div class="input-group-btn"> 
                              <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                          @foreach($productimage as $image)
                             @if($edit_data->id==$image->product_id) 
                              <div class="edit-img">
                                <input type="hidden" class="form-control" value="{{$image->id}}" name="hidden_img">
                               <img src="{{asset($image->image)}}" class="editimage" alt="">
                                <a href="{{url('editor/product/image/delete/'.$image->id)}}" class="btn btn-danger">Delete</a>
                              </div>
                             @endif
                          @endforeach
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                        </div>
                      </div>
                        <!-- col end -->
                      <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                          <label for="productstyle">Product Style </label>
                          <select type="text" id="productstyle" class="select2 form-control {{$errors->has('productstyle')? 'is-invalid' : ''}}" name="productstyle"  value="{{old('productstyle')}}">
                            <option value="">====Select Style=====</option>
                            <option value="1">Single Style</option>
                            <option value="2">Double Style</option>
                          </select>
                          @if($errors->has('productstyle'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('productstyle')}}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <!-- col end -->
                        <!-- col end -->
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="productdetails">Short Description <span>*</span></label>
                            <textarea type="text" name="productdetails" class="textarea form-control{{ $errors->has('productdetails') ? ' is-invalid' : '' }}"  id="productdetails" value="{{ old('productdetails') }}" required>{{$edit_data->productdetails}}</textarea>
                            @if($errors->has('productdetails'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('productdetails')}}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <!-- col end -->
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                              <label for="productdetails2">Full Description <span>*</span></label>
                              <textarea type="text" name="productdetails2" class="textarea form-control{{ $errors->has('productdetails2') ? ' is-invalid' : '' }}"  id="productdetails2" >{{$edit_data->productdetails2}}</textarea>
                              @if($errors->has('productdetails2'))
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('productdetails2')}}</strong>
                                  </span>
                              @endif
                            </div>
                          </div>
                          <!-- col end -->
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label for="status">Select Status</label>
                                 <ul>
                                    <li><input type="radio" id="active" class="{{ $errors->has('status') ? ' is-invalid' : '' }}" value="1" name="status">
                                      <label for="active">Active</label>
                                    </li>

                                    <li><input type="radio" id="inactive" class="{{ $errors->has('status') ? ' is-invalid' : '' }}" value="2" name="status">
                                      <label for="inactive">Inactive</label>
                                    </li>
                                </ul>
                                  @if ($errors->has('status'))
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn submit-button">submit</button>
                                <button type="reset" class="btn btn-default">clear</button>
                            </div>
                        </div>
                        <!-- /.form-group -->
                      </div>
                    </form>
              </div>
            <!-- /.col -->
          </div>
        <!--card-body-->
      </div>
      <!--card-->
    </div>
  <!--container-fluid-->
     <script type="text/javascript">
  document.forms['editForm'].elements['productcat'].value="{{$edit_data->productcat}}"
  document.forms['editForm'].elements['productsubcat'].value="{{$edit_data->productsubcat}}"
  document.forms['editForm'].elements['productchildcat'].value="{{$edit_data->productchildcat}}"
  document.forms['editForm'].elements['productbrand'].value="{{$edit_data->productbrand}}"
  document.forms['editForm'].elements['productstyle'].value="{{$edit_data->productstyle}}"
  document.forms['editForm'].elements['sellerid'].value="{{$value->id}}"
  document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
</script>
  </section>
  <!-- /.content -->
@endsection