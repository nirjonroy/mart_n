
@extends('backEnd.layouts.master')
@section('title','User Update')

@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Update user information</h3>
          <div class="short_button">
            <a href="{{url('/superadmin/user/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/superadmin/user/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$edit_data->name}}">

                              @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{$edit_data->username}}">

                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                         <!--form-group -->
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$edit_data->email}}">

                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>
                        </div>
                         <!--form-group -->

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$edit_data->phone}}">

                            @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{$edit_data->designation}}">

                                @if ($errors->has('designation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Picture">Picture</label>
                                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*">
                                <img class="backend_image" src="{{asset($edit_data->image)}}">
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
                        <div class="form-group">
                          <div class="custom-cart-title">
                            <strong>Select User Role</strong>
                          </div>
                           <div class="box-body">
                                <input class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" type="radio" id="superadmin" name="role_id" value="1">
                                <label for="superadmin">Superadmin</label>
                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>
                           <div class="box-body">
                                <input class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" type="radio" id="admin" name="role_id" value="2">
                                <label for="admin">Admin</label>
                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>
                           <div class="box-body">
                                <input class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" type="radio" id="editor" name="role_id" value="3">
                                <label for="editor">Editor</label>
                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>
                           <div class="box-body">
                                <input class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" type="radio" id="author" name="role_id" value="4">
                                <label for="author">Author</label>
                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                      </div>
                      <div class="custom-bg  mrt-30">
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
  </section>
  <!-- /.content -->
  <script type="text/javascript">
        document.forms['editForm'].elements['role_id'].value={{$edit_data->role_id}}
        document.forms['editForm'].elements['status'].value={{$edit_data->status}}
    </script>
@endsection