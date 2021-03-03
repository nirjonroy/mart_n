@extends('backEnd.layouts.master')
@section('title','social-media add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add social-media information</h3>
          <div class="short_button">
            <a href="{{url('/editor/social-media/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/social-media/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                         <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$edit_data->name }}">

                              @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                            </div>
                       </div>
                      <!-- form-group end -->
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label>Icon</label>
                              <input type="text" name="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" value="{{$edit_data->icon }}">

                              @if ($errors->has('icon'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('icon') }}</strong>
                              </span>
                              @endif
                            </div>
                       </div>
                      <!-- form-group end -->
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label>Link</label>
                              <input type="text" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{ $edit_data->link}}">

                              @if ($errors->has('link'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                              </span>
                              @endif
                            </div>
                       </div>
                      <!-- form-group end -->
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
                <div class="col-md-4">
                      <div class="custom-bg">
                        <div class="custom-cart-title">
                          <strong>Publication Status</strong>
                        </div>

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
              </form>
          </div>
        <!--card-body-->
      </div>
      <!--card-->
    </div>
  <!--container-fluid-->
   <script type="text/javascript">
      document.forms['editForm'].elements['status'].value={{$edit_data->status}}
    </script>
  </section>
  <!-- /.content -->
@endsection