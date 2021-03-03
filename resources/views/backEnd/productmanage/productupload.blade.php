@extends('backEnd.layouts.master')
@section('title','New Product Upload')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">New Product Upload</h3>
        </div>
            <div id="form_body" class="card-body">
              <div class="row">
                <form action="{{url('editor/seller/new/product/upload')}}" method="POST" enctype="multipart/form-data" name="editForm">
                    @csrf 
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
                        <div class="col-md-4 col-sm-4">
                          <div class="form-group">
                            <label for="productname">Product Name <span>*</span></label>
                            <input type="text" name="productname" class=" form-control{{ $errors->has('productname') ? ' is-invalid' : '' }}"  id="productname" value="{{old('productname')}}" required>
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
                              <select  name="sellerid" id="sellerid" class="form-control{{ $errors->has('sellerid') ? ' is-invalid' : '' }} select2"  id="sellerid" value="{{ old('sellerid') }}">
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
                              <label for="productoldprice">Old Price </label>
                              <input type="text" name="productoldprice" class=" form-control{{ $errors->has('productoldprice') ? ' is-invalid' : '' }}"  id="productoldprice" value="{{ old('productoldprice') }}">
                              @if($errors->has('productoldprice'))
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('productoldprice')}}</strong>
                                  </span>
                              @endif
                            </div>
                          </div>
                          <!-- col end -->
                        <!-- col end -->
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="productnewprice">New Price <span>*</span></label>
                            <input type="text" name="productnewprice" class=" form-control{{ $errors->has('productnewprice') ? ' is-invalid' : '' }}"  id="productnewprice" value="{{old('productnewprice')}}" required>
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
                                <label for="productquantity">Product Quantity (Stock) <span>*</span></label>
                                <input type="number" min="1" name="productquantity" class=" form-control{{ $errors->has('productquantity') ? ' is-invalid' : '' }}"  id="productquantity" value="{{ old('productquantity') }}" required>
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
                          <label for="title">Product Size</label>
                              <select name="productsize[]" class="form-control select2{{ $errors->has('productsize') ? ' is-invalid' : '' }}" multiple="multiple">
                                @foreach($productSize as $key=>$value)
                                <option value="{{$value->id}}">{{$value->sizeName}}</option>
                                @endforeach
                            </select>
                              @if ($errors->has('productsize'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('productsize') }}</strong>
                                </span>
                                @endif
                          </div>
                        </div>
                        <!-- /.form-group -->
                       <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                          <label for="title">Product color</label>
                              <select name="productcolor[]" class="form-control select2{{ $errors->has('productcolor') ? ' is-invalid' : '' }} custom-select" multiple="multiple">
                                @foreach($productColors as $key=>$value)
                                <option value="{{$value->id}}">{{$value->colorName}}</option>
                                @endforeach
                            </select>
                              @if ($errors->has('productcolor'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('productcolor') }}</strong>
                                </span>
                                @endif
                          </div>
                        </div>
                            <div class="col-md-4 col-sm-6">
                              <div class="form-group">
                                <label for="additionalshipping">Additional Shipping Charge</label>
                                <input type="number" min="1" name="additionalshipping" class=" form-control{{ $errors->has('additionalshipping') ? ' is-invalid' : '' }}"  id="additionalshipping" value="{{ old('additionalshipping') }}">
                                @if($errors->has('additionalshipping'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{$errors->first('additionalshipping')}}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>

                       <div class="col-md-8 col-sm-8">
                          <div class="form-group">
                            <label for="image">Product Image<span>*</span></label>
                              <div class="clone hide" style="display: none;">
                                <div class="control-group input-group{{ $errors->has('image') ? ' is-invalid' : '' }}" style="margin-top:10px">
                                  <input type="file" name="image[]" class="form-control">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                  </div>
                                </div>
                              </div>
                              <div class="input-group control-group increment{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                                <input type="file" name="image[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                              </div>
                              @if ($errors->has('image'))
                                 <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('image') }}</strong>
                                 </span>
                                @endif
                          </div>
                        </div>
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
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <label for="productdetails">Short Description <span>*</span></label>
                                <textarea type="text" name="productdetails" class="textarea form-control{{ $errors->has('productdetails') ? ' is-invalid' : '' }}"  id="productdetails" value="{{ old('productdetails') }}" required></textarea>
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
                                <label for="productdetails2">Additional Description <span>*</span></label>
                                <textarea type="text" name="productdetails2" class="textarea form-control{{ $errors->has('productdetails2') ? ' is-invalid' : '' }}"  id="productdetails2" value="{{ old('productdetails2') }}" required></textarea>
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
                                  <button type="submit" class="btn submit-button">Upload</button>
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
  </section>
  <!-- /.content -->
@endsection