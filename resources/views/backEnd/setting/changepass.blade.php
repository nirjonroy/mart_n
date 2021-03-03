
@extends('backEnd.layouts.master')
@section('title','User Add')

@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Change Password</h3>
          <div class="short_button">
            <a href="{{url('/superadmin/user/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/password/updated')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="old_password" class="col-form-label text-md-right">Old Password</label>
                                    <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password">
                                    @if ($errors->has('old_password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                              </div>
                        </div>
                        <!-- form group end -->
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label for="new_password" class="col-form-label text-md-right">New Password</label>
                                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                                @if ($errors->has('new_password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                         <!-- form group end -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                  <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">
                                  @if ($errors->has('password_confirmation'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                                  @endif
                            </div>
                        </div>
                        <!-- form group end -->
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
                            <strong class="text-danger">Warning !!</strong>
                          </div>
                           <div class="box-body">
                              <div class="warning-text">
                                <p>Please keep remember your new password</p>
                                <img src="{{asset('public/backEnd/images/password-bg.png')}}" alt="">
                              </div>
                           </div>
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
@endsection