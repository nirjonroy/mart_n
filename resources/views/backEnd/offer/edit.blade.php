@extends('backEnd.layouts.master')
@section('title','Offer Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Offer Edit information</h3>
          <div class="short_button">
            <a href="{{url('/admin/offer/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/admin/offer/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="description">Description</label>
                              <input type="text" name="description" class=" form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $edit_data->description}}"/>

                              @if ($errors->has('description'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="amount">Amount</label>
                              <input type="text" name="amount" class=" form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ $edit_data->amount}}"/>

                              @if ($errors->has('amount'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('amount') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="buyammount">Minimum Buy</label>
                              <input type="text" name="buyammount" class=" form-control{{ $errors->has('buyammount') ? ' is-invalid' : '' }}" value="{{$edit_data->buyammount}}"/>

                              @if ($errors->has('buyammount'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('buyammount') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->

                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="location">Location</label>
                              <select type="text" name="location" class="select2  form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" value="{{ old('location') }}"/>
                               <option value="">=== Select Location ===</option>
                                <option value="0">All</option>
                                @foreach($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('location'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
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
  <script type="text/javascript">
        document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
        document.forms['editForm'].elements['location'].value="{{$edit_data->location}}"
    </script>
  </section>
  <!-- /.content -->
@endsection