@extends('backEnd.layouts.master')
@section('title','New Product Upload')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">New Product Upload</h3>
        </div>
            <div id="form_body" class="card-body">
              <div class="row">
                <form action="{{url('save-masonary')}}" method="POST" enctype="multipart/form-data" name="editForm">
                    @csrf 
                      <div class="row">
                <div class="control-group">
                <label class="control-label" for="date01">Masonary Link</label>
                <div class="controls">
                <input type="text" class="" name="masonary_link" required="" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="date01">Masonary Name</label>
                <div class="controls">
                <input type="text" class="" name="masonary_name" required="" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="fileInput">image</label>
                <div class="controls">
                  <input type="file" id="fileInput" name="masonary_image">
                </div>
                </div>

                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Publication Status</label>
                <div class="controls">

                  <input type="checkbox" name="publication_status"  value="1">

                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add masonary </button>
                <button type="reset" class="btn">Cancel</button>
              </div> 
                      </div>
                    </form>
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
@endsection