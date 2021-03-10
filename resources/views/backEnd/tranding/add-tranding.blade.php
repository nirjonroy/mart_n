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
                <form action="{{url('save-tranding')}}" method="POST" enctype="multipart/form-data" name="editForm">
                    @csrf 
                      <div class="row">
                <div class="control-group">
                <label class="control-label" for="date01">product Name</label>
                <div class="controls">
                <input type="text" class="" name="tranding_product_name" required="" >
                </div>
              </div>

 
                <div class="control-group">
                <label class="control-label" for="date01">product old price</label>
                <div class="controls">
                <input type="text" class="" name="tranding_product_oldprice" required="" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="date01">product new price</label>
                <div class="controls">
                <input type="text" class="" name="tranding_product_name_new_price" required="" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="fileInput">image</label>
                <div class="controls">
                  <input type="file" id="fileInput" name="tranding_product_image">
                </div>
                </div>

                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Publication Status</label>
                <div class="controls">

                  <input type="checkbox" name="publication_status"  value="1">

                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add product </button>
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