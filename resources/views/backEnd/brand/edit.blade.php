
@extends('backEnd.layouts.master')
@section('title','Brand Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add Brand information</h3>
          <div class="short_button">
            <a href="{{url('/editor/brand/manage')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-bg">
                    <form action="{{url('/editor/brand/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Image</label>
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
                              <label>Brand Name</label>
                              <input type="text" name="brandName" class="form-control{{ $errors->has('brandName') ? ' is-invalid' : '' }}" value="{{ $edit_data->brandName}}">

                              @if ($errors->has('brandName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('brandName') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="col-sm-12">
                          <div class="uncommon-area">
                              <div class="row" >
                                <div class="col-sm-12">
                                     <div class="form-group">
                                      <label for="category">Choose Your Brand Area<span>*</span></label>
                                       @foreach($categories as $category)
                                        <p><strong> {{$category->catname}} </strong></p>
                                        @foreach($category->subcategories as $subcategory)
                                         @php
                                            $brandrequest = App\Brandinsert::where(['brand_id'=>$edit_data->id,'subcat_id'=>$subcategory->id])->get();
                                        @endphp
                                         <div class="ls-checkbox">
                                          <label class="cat-chechbox">
                                            <input type="checkbox" value="{{$subcategory->id}}" name="subcategory[]"@foreach($brandrequest as $brandcheck) @if($brandcheck->subcat_id==$subcategory->id) checked="checked" @endif @endforeach>
                                            <span class="checkmark"></span>
                                            {{$subcategory->subcategoryName}}
                                          </label>
                                         </div>
                                        @endforeach
                                       @endforeach
                                        @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                   </div>
                                 </div>
                              </div>
                          </div>
                        </div>
                        <!-- col sm- 12 end -->
                       
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
                     </form>
                 </div>
                </div>
              </div>
            <!-- /.col -->
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