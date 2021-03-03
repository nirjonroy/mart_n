@extends('backEnd.layouts.master')
@section('title','Brand Request')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Brand Request</h3>
            <div class="short_button">
              <a href="{{url('editor/brand/add')}}"><i class="fa fa-plus"></i>Add</a>
            </div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Brand Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($brandrequest as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->brandName}}</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>
                   <ul class="action_buttons">
                      <li>
                        <a href="{{url('editor/brand/request/view/'.$value->id)}}" class="edit_icon"  title="view"><i class="fa fa-edit"></i> View</a>
                      </li>
                    </ul>
                  </td>
                </tr>
                <div class="modal fade" id="mymodal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Brand Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <form action="{{url('/editor/brand/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Brand Name</label>
                              <input type="text" name="brandName" class="form-control{{ $errors->has('brandName') ? ' is-invalid' : '' }}" value="{{ $value->brandName}}">

                              @if ($errors->has('brandName'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('brandName') }}</strong>
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
                     </form>
                      </div>
                     
                    </div>
                  </div>
                </div>
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