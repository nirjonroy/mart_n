@extends('backEnd.layouts.master')
@section('title','contact-us add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add contact-us information</h3>
          <div class="short_button">
            <a href="{{url('/editor/contact-us/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/contact-us/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                         <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$edit_data->phone }}">

                              @if ($errors->has('phone'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!--form-group -->
                        <div class="col-sm-12">
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
                        <div class="col-sm-12">
                          <div class="form-group custom-textarea">
                            <label for="Picture">Address</label>
                                  <textarea name="address" class="textarea form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">{{$edit_data->address}}</textarea>

                              @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
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