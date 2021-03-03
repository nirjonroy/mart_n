
@extends('backEnd.layouts.master')
@section('title','Category Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Category Edit information</h3>
          <div class="short_button">
            <a href="{{url('/editor/category/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/editor/category/menu-sort-update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" value="{{$change_level->id}}" name="hidden_id">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="catname" class="form-control{{ $errors->has('catname') ? ' is-invalid' : '' }}" value="{{$change_level->catname}}">

                              @if ($errors->has('catname'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('catname') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Level</label>
                              <input type="text" name="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" value="{{$change_level->level}}">

                              @if ($errors->has('level'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('level') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="status">Publication Status</label>
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
                              @if ($errors->has('status'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('status') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-12 mrt-15">
                          <div class="form-group">
                              <button type="submit" class="btn submit-button">Update</button>
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
        document.forms['editForm'].elements['status'].value="{{$change_level->status}}"
    </script>
  </section>
  <!-- /.content -->
@endsection