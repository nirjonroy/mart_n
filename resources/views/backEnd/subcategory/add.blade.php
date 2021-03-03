
@extends('backEnd.layouts.master')
@section('title','Sub Catgory Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add Sub Category information</h3>
          <div class="short_button">
            <a href="{{url('/editor/subcategory/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/subcategory/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="subcategoryName" class="form-control{{ $errors->has('subcategoryName') ? ' is-invalid' : '' }}" value="{{ old('subcategoryName') }}">

                              @if ($errors->has('subcategoryName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subcategoryName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Category</label>
                              <select name="category_id" class="form-control select2 {{ $errors->has('category_id') ? ' is-invalid' : '' }}" value="{{ old('category_id') }}">
                                <option value="">===select category===</option>
                                @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->catname}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('category_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label for="status">Publication Status</label>
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
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                       <div class="col-sm-12  mrt-10">
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary ">submit</button>
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