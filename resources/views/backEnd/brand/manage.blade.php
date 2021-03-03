@extends('backEnd.layouts.master')
@section('title','Brand Manage')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Brand information</h3>
            <div class="short_button">
              <a href="{{url('editor/brand/add')}}"><i class="fa fa-plus"></i>Add</a>
            </div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Brand Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($show_data as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->brandName}}</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>
                   <ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('editor/brand/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_down" title="unpublished"><i class="fa fa-thumbs-down"></i> Inctive</button>
                        </form>
                        @else
                          <form action="{{url('editor/brand/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_up" title="published"><i class="fa fa-thumbs-up"></i> Active</button>
                          </form>
                        @endif
                      </li>
                          <li>
                        <a class="edit_icon" href="{{url('editor/brand/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i>Edit</a>
                      </li>
                       <li>
                        <a class="edit_icon" href="{{url('editor/brand/delete/'.$value->id)}}" title="Delete"><i class="fa fa-edit"></i>Delete</a>
                      </li>
                        </ul>
                    </ul>
                  </td>
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