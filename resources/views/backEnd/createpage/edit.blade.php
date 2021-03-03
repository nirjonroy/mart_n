@extends('backEnd.layouts.master')
@section('title','Footer page category edit')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Footer page category edit</h3>
          <div class="short_button">
            <a href="{{url('/editor/createpage/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('editor/createpage/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <input type="hidden" name="hidden_id" value="{{$edit_data->id}}">
                        <div class="col-sm-12">
                             <div class="form-group">
                              <label>Page Category</label>
                              <select name="page_id" class="form-control select2 {{ $errors->has('page_id') ? ' is-invalid' : '' }}" value="{{ old('page_id') }}">
                                <option value="">===Select Page Category===</option>
                                @foreach($pagecategory as $key=>$value)
                                <option value="{{$value->id}}">{{$value->pagename}}</option>
                               @endforeach
                              </select>
                              @if ($errors->has('page_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('page_id') }}</strong>
                              </span>
                              @endif
                         </div>
                        </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                         <div class="form-group">
                              <label>Page Title</label>
                              <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $edit_data->title }}" placeholder="Ex. how to quick sell, about ect.">

                              @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                              </span>
                              @endif
                          </div>
                        <!-- form group --> 
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="text">Content</label>
                                  <textarea name="text" class="summernote form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="">{{ $edit_data->text }}</textarea>

                                  @if ($errors->has('text'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                 </span>
                                 @endif
                              </div>
                        </div>
                      <!-- /.form-group -->
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
        document.forms['editForm'].elements['page_id'].value="{{$edit_data->page_id}}"
        document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
  </section>
  <!-- /.content -->
@endsection