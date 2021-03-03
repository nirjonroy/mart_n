@extends('backEnd.layouts.master')
@section('title','color edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Edit color information</h3>
          <div class="short_button">
            <a href="{{url('/editor/product-color/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/product-color/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                            <div class="form-group">
                              <label>Color Name</label>
                              <input type="text" name="colorName" class="form-control{{ $errors->has('colorName') ? ' is-invalid' : '' }}" value="{{$edit_data->colorName}}">

                              @if ($errors->has('colorName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('colorName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                      <div class="col-sm-12">
                            <div class="form-group">
                              <label for="hue-demo">Color Picker</label>
                              <input type="text" name="color" id="hue-demo" class="form-control demo" data-control="hue" value="{{$edit_data->color}}">
                            </div>
                      </div>
                      <!-- /.form-group -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="status">Select Status</label>
                            <div class="box-body pub-stat display-inline">
                              <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" id="active" name="status" value="1" title="published">
                              <label for="active">Active</label>
                              @if ($errors->has('status'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                              </span>
                              @endif
                           </div>
                          <div class="box-body pub-stat display-inline">
                              <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" name="status" value="0" id="inactive" title="unpublished">
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
  <script>
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
  </script>
  </section>
  <!-- /.content -->
@endsection