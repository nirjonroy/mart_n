@extends('backEnd.layouts.master')
@section('title','news Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add news information</h3>
          <div class="short_button">
            <a href="{{url('/admin/news/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/admin/news/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group custom-textarea">
                              <label>Title</label>
                              <textarea type="text" name="title" class="textarea form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}"></textarea>

                              @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                      <div class="col-sm-12">
                            <div class="from-group">
                              <label for="status">Select Status</label>
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