@extends('backEnd.layouts.master')
@section('title','Low Stock Report')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="card-title">Low Stock Report</h3>
                            <div class="short_button">
                            </div>
                        </div>
                        <div class="col-sm-9">
                              <div class="filterform">
                                <form action="" >
                                  @csrf
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <div class="form-group">
                                          <label for="startdate">From</label>
                                          <input type="date" name="startdate" id="datepickr" class=" form-control flatpicker {{ $errors->has('startdate') ? ' is-invalid' : '' }}" value="{{ old('startdate') }}" required="" placeholder="Enter Start Date">

                                           @if ($errors->has('startdate'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('startdate') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                      </div>
                                      <!-- col end -->
                                      <div class="col-sm-3">
                                        <div class="form-group">
                                          <label for="enddate">To</label>
                                          <input type="date" name="enddate" id="datepickr" class=" form-control flatpicker {{ $errors->has('enddate') ? ' is-invalid' : '' }}" value="{{ old('enddate') }}" required="" placeholder="Enter End Date">

                                           @if ($errors->has('enddate'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('enddate') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                      </div>
                                      <!-- col end -->
                                      <div class="col-sm-2">
                                        <div class="form-group filterbutton">
                                          <button class="btn btn-primary">Search</button>
                                        </div>
                                      </div>
                                      <!-- col end -->
                                    </div>
                                </form>
                              </div>
                            </div>
                    </div>
                    
                </div>
               <!-- /.card-header -->
            <div class="card-body user-border">
               <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Subcategory</th>
                  <th>Stock</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($lowstockreport as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td> {{str_limit($value->productname,20)}}</td>
                  <td> {{$value->catname}}</td>
                  <td>{{$value->subcategoryName}}</td>
                  <td>{{$value->productquantity}}</td>
                  <td>{{$value->status==1?"Active":"Inactive"}}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection