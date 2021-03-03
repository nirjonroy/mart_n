@extends('backEnd.layouts.master')
@section('title','Slider Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Slider Add</h3>
          <div class="short_button">
            <a href="{{url('/editor/slider/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/slider/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <div class="note">
                                <div class="row">
                                  <div class="col-sm-2">
                                    <div class="note-icon">
                                      <i class="fa fa-info"></i>
                                    </div>
                                  </div>
                                  <div class="col-sm-10">
                                    <div class="note-text">
                                      <p>Image Instruction</p>
                                      <p>Width=1400px,Height=455px,Size=Max 2MB,Type=jpg,png. </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- image note -->
                                <label for="Picture">Image  <span>*</span></label>
                                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*">
                            
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- form-group end -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Product Link  <span>*</span></label>
                              <input type="text" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{ old('link') }}">

                              @if ($errors->has('link'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                       <!-- /.form-group -->
                        <div class="col-sm-12">
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