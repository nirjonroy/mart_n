
@extends('backEnd.layouts.master')
@section('title','Size Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add size information</h3>
          <div class="short_button">
            <a href="{{url('/editor/product-size/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/product-size/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Size Name</label>
                              <input type="text" name="sizeName" class="form-control{{ $errors->has('sizeName') ? ' is-invalid' : '' }}" value="{{ old('sizeName') }}">

                              @if ($errors->has('sizeName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sizeName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Publication Status</label>
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