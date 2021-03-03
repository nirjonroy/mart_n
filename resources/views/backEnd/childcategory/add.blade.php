
@extends('backEnd.layouts.master')
@section('title','child Catgory Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add child Category information</h3>
          <div class="short_button">
            <a href="{{url('/editor/childcategory/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/childcategory/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Child Category Name</label>
                              <input type="text" name="childcategoryName" class="form-control{{ $errors->has('childcategoryName') ? ' is-invalid' : '' }}" value="{{ old('childcategoryName') }}">

                              @if ($errors->has('childcategoryName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('childcategoryName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Sub Category</label>
                              <select name="subcategory_id" class="form-control select2 {{ $errors->has('subcategory_id') ? ' is-invalid' : '' }}" value="{{ old('subcategory_id') }}">
                                <option value="">--select subcategory--</option>
                                @foreach($categories as $category)
                                   <option>====={{$category->catname}}======</option>
                                  @foreach($category->subcategories as $subcate)
                                  <option class="optionleft" value="{{$subcate->id}}">{{$subcate->subcategoryName}}</option>
                                  @endforeach
                                @endforeach
                              </select>

                              @if ($errors->has('subcategory_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subcategory_id') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                       <div class="col-sm-12">
                          <div class="form-group">
                              <div class="box-body pub-stat display-inline">
                                <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" id="active" name="status" value="1">
                                <label for="active">Active</label>
                                @if ($errors->has('status'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                              <div class="box-body pub-stat display-inline">
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
                      </div>
                      <div class="col-sm-12 mrt-15">
                          <div class="form-group">
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