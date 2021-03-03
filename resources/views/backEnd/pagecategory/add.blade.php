
@extends('backEnd.layouts.master')
@section('title','Footer page category add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Footer page category add</h3>
          <div class="short_button">
            <a href="{{url('/editor/pagecategory/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/pagecategory/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                             <div class="form-group">
                              <label>Page Name</label>
                              <input type="text" name="pagename" class="form-control{{ $errors->has('pagename') ? ' is-invalid' : '' }}" value="{{ old('pagename') }}" placeholder="Ex. FAQ, term fo use ect.">

                              @if ($errors->has('pagename'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pagename') }}</strong>
                              </span>
                              @endif
                          </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Parent Menu</label>
                              <select name="menu_id" class="form-control select2 {{ $errors->has('menu_id') ? ' is-invalid' : '' }}" value="{{ old('menu_id') }}">
                                <option value="">===Select Menu===</option>
                                <option value="1">Usefull Link</option>
                              </select>

                              @if ($errors->has('menu_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('menu_id') }}</strong>
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