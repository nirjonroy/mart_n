@extends('backEnd.layouts.master')
@section('title','advertisment Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Edit advertisment information</h3>
          <div class="short_button">
            <a href="{{url('/admin/advertisment/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/admin/advertisment/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">

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
                                      <p>1.For  advertisment: Width=295x,Height=190px,Size=Max 2MB,Type=jpg,png. </p>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <!-- image note -->
                            <div class="form-group">
                                <label for="Picture">advertisment</label>
                                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*">
                                <img src="{{asset($edit_data->image)}}" alt="" class="responsive_image">
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
                              <label>advertisment Area</label>
                              <select name="area" class="form-control select2 {{ $errors->has('area') ? ' is-invalid' : '' }}" value="{{ old('area') }}">
                                <option value="">=====select advertisment area======</option>
                                <option value="127">Reguler Ads</option>
                                <option value="126">Footer Ads</option>
                              </select>

                              @if ($errors->has('area'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('area') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <!-- form-group end -->
                         <div class="col-sm-12">
                            <div class="form-group">
                              <label>Product Link <span>*</span></label>
                              <input type="url" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{$edit_data->link}}">

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
                      <!-- /.form-group -->
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
  <script type="text/javascript">
      document.forms['editForm'].elements['area'].value="{{$edit_data->area}}"
      document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
@endsection