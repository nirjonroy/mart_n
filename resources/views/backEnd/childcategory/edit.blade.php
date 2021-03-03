@extends('backEnd.layouts.master')
@section('title','Child Catgory Edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Edit Child Category information</h3>
          <div class="short_button">
            <a href="{{url('/editor/childcategory/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('editor/childcategory/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" name="hidden_id" value="{{$edit_data->id}}">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Child Category Name</label>
                              <input type="text" name="childcategoryName" class="form-control{{ $errors->has('childcategoryName') ? ' is-invalid' : '' }}" value="{{$edit_data->childcategoryName}}">

                              @if ($errors->has('childcategoryName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('childcategoryName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Sub Category</label>
                              <select name="subcategory_id" class="form-control{{ $errors->has('subcategory_id') ? ' is-invalid' : '' }} select2" value="{{ old('subcategory_id') }}">
                                <option value="">--select subcategory--</option>
                                @foreach($subcategory as $key=>$value)
                                <option value="{{$value->id}}">{{$value->subcategoryName}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('subcategory_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subcategory_id') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                      <!-- /.form-group -->
                      <div class="col-sm-12">
                          <div class="form-group">
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
        document.forms['editForm'].elements['subcategory_id'].value={{$edit_data->subcategory_id}}
        document.forms['editForm'].elements['status'].value={{$edit_data->status}}
    </script>
  </section>
  <!-- /.content -->
@endsection