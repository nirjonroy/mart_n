@extends('backEnd.layouts.master')
@section('title','Banner Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Banner Add</h3>
          <div class="short_button">
            <a href="{{url('/editor/banner/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-bg">
                    <form action="{{url('/editor/banner/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}">
                            
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- form-group end -->
                      <div class="col-sm-6">
                            <div class="form-group">
                              <label>Post Area</label>
                              <select name="area" class="form-control select2 {{ $errors->has('area') ? ' is-invalid' : '' }}" value="{{ old('area') }}">
                                <option value="">=== Select Home Page===</option>
                                <option value="topbanner">Top Banner</option>
                                <option value="hotdeal">Hot Deal Banner</option>
                                <option value="explorebrand">Explore More Brand</option>
                                <option value="curateshop">Curate Shop Banner</option>
                                <option value="discovernow">Discover Banner</option>
                                <option value="trendingnow">Trending Banner</option>
                                <option value="stylesbanner">Styles Banner</option>
                                <option value="">=== Select Category Page===</option>
                                @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->catname}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('area'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('area') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                       <div class="col-sm-6">
                            <div class="form-group">
                              <label>Post Type</label>
                              <select name="posttype" class="form-control select2 {{ $errors->has('posttype') ? ' is-invalid' : '' }}" value="{{ old('posttype') }}">
                                <option value="">=== Select One ===</option>
                                <option value="1">Brand</option>
                                <option value="2">Category</option>
                                <option value="3">Other</option>
                              </select>

                              @if ($errors->has('posttype'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('posttype') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Link <span>*</span></label>
                              <input type="text" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{ old('link') }}">

                              @if ($errors->has('link'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="text">Content</label>
                                  <textarea name="text" class="textarea form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="">{{ old('text') }}</textarea>

                                  @if ($errors->has('text'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                 </span>
                                 @endif
                              </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Front Page Show</label><br>
                             <input type="checkbox" name="frontpage" class="{{ $errors->has('frontpage') ? ' is-invalid' : '' }}" value="1">

                              @if ($errors->has('frontpage'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('frontpage') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-6">
                            <label for="">Publication Status <span>*</span></label><br>
                            <div class="box-body pub-stat status-half">
                                <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" id="active" name="status" value="1">
                                <label for="active">Active</label>
                                @if ($errors->has('status'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="box-body pub-stat  status-half">
                                <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" name="status" value="0" id="inactive">
                                <label for="inactive">Inactive</label>
                                @if ($errors->has('status'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>
                        </div>
                      <div class="col-sm-6">
                          <div class="form-group mrt-30">
                              <button type="submit" class="btn submit-button">submit</button>
                              <button type="reset" class="btn btn-default">clear</button>
                          </div>
                      </div>
                      <!-- /.form-group -->
                 </div>
                </div>
              </div>
            <!-- /.col -->
              </form>
          </div>
        <!--card-body-->
      </div>
      <!--card-->
    </div>
  <!--container-fluid-->
  </section>
  <!-- /.content -->
@endsection