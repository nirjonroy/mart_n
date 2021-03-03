
@extends('backEnd.layouts.master')
@section('title','Product Bulk Update')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Product Bulk Update</h3>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('editor/product-bulk-update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="status">Status</label>
                              <select name="status" class="form-control select2{{ $errors->has('status') ? ' is-invalid' : '' }}" id="status">
                                <option value="">--- No Change ---</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                              @if ($errors->has('status'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('status') }}</strong>
                              </span>
                              @endif
                            </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                            <label for="additionalshipping">Aditional Shipping Charge</label>
                            <input type="text" name="additionalshipping" class="form-control{{ $errors->has('additionalshipping') ? ' is-invalid' : '' }}" id="additionalshipping">
                            @if ($errors->has('additionalshipping'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('additionalshipping') }}</strong>
                            </span>
                            @endif
                          </div>
                      </div>
                      <!-- /.form-group -->
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="quantitytype">Quantity</label>
                              <select name="quantitytype" class="bulkeditqty form-control{{ $errors->has('quantitytype') ? ' is-invalid' : '' }}" id="quantitytype">
                                <option value="0">--- No Change ---</option>
                                <option value="1">Change To</option>
                                <option value="2">Increase Existing Quantity By</option>
                                <option value="3">Decrease Existing Quantity By</option>
                              </select>
                              @if ($errors->has('quantitytype'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('quantitytype') }}</strong>
                              </span>
                              @endif
                            </div>
                      </div>
                      <div class="col-sm-12" style="display: none;" id="ifYesQty">
                        <div class="form-group">
                               <input type="text" name="productquantity" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" placeholder="Enter Quantity">
                            </div>
                      </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="pricetype">Price (if price type % then clieck here <input type="checkbox" name="pricitypeper"> )</label>
                              <select name="pricetype" class="bulkeditprice form-control{{ $errors->has('pricetype') ? ' is-invalid' : '' }}" id="pricetype">
                                <option value="0">--- No Change ---</option>
                                <option value="1">Change To</option>
                                <option value="2">Increase Existing Price By(Fixed Amount Or %)</option>
                                <option value="3">Decrease Existing Price By(Fixed Amount Or %)</option>
                              </select>
                              @if ($errors->has('pricetype'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pricetype') }}</strong>
                              </span>
                              @endif
                            </div>
                      </div>
                      <div class="col-sm-12" style="display: none;" id="ifYesPrice">
                        <div class="form-group">
                               <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" placeholder="Enter Price">
                            </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <button type="submit" class="btn submit-button">submit</button>
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
       
    </script>
  </section>
  <!-- /.content -->
@endsection