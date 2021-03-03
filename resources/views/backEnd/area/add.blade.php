@extends('backEnd.layouts.master')
@section('title','Area Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add Area information</h3>
          <div class="short_button">
            <a href="{{url('/admin/area/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/admin/area/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group custom-textarea">
                              <label>District</label>
                              <select name="district_id" id="district_id" class="select2 form-control{{ $errors->has('district_id') ? ' is-invalid' : '' }}" value="{{ old('district_id') }}">
                                <option value="">=== Select District ===</option>
                                @foreach($districts as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('district_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('district_id') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group custom-textarea">
                              <label>Area</label>
                              <input type="text" name="area" id="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" value="{{ old('area') }}"> 

                              @if ($errors->has('area'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('area') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group custom-textarea">
                              <label>Shipping Fee</label>
                              <input type="text" name="shippingfee" id="shippingfee" class="form-control{{ $errors->has('shippingfee') ? ' is-invalid' : '' }}" value="{{ old('shippingfee') }}"> 

                              @if ($errors->has('shippingfee'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('shippingfee') }}</strong>
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