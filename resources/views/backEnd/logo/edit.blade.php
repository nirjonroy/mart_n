@extends('backEnd.layouts.master')
@section('title','Logo Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Edit logo information</h3>
          <div class="short_button">
            <a href="{{url('/editor/logo/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>  
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/logo/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                    <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="note">
                          <div class="row">
                            <div class="col-sm-2">
                              <div class="note-icon">
                                <i class="fa fa-info"></i>
                              </div>
                            </div>
                            <div class="col-sm-10">
                              <div class="note-text">
                                <p>Please Upload Your Image Follow The Insctruction</p>
                                <p>1.For logo: Width=240px,Height=120px,Size=Max 2MB,Type=png</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- image note -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="from-group">
                                  <label for="logo">Logo Image</label>
                                  <input type="file" name="logo" id="logo" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" value="{{$edit_data->logo}}" accept="logo/png">
                                  <img src="{{asset($edit_data->logo)}}" alt="" class="edit_image">
                                  @if ($errors->has('logo'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('logo') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                          </div>
                        <!-- col end -->
                        <div class="col-sm-12">
                            <div class="from-group">
                              <label for="faveicon">Faveicon Image</label>
                              <input type="file" name="faveicon" id="faveicon" class="form-control{{ $errors->has('faveicon') ? ' is-invalid' : '' }}" value="{{$edit_data->faveicon }}" accept="faveicon/png">
                           <img src="{{asset($edit_data->faveicon)}}" alt="" class=" edit_image">
                              @if ($errors->has('faveicon'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('faveicon') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label for="">Publication Status <span>*</span></label>
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
                      <div class="col-sm-6">
                          <div class="form-group mrt-30">
                              <button type="submit" class="btn submit-button">Update </button>
                              <button type="reset" class="btn btn-default">clear</button>
                          </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                 </div>
                </div>
              </div>
            <!-- /.col -->
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
      document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
@endsection