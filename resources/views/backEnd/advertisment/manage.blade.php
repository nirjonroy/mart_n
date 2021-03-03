@extends('backEnd.layouts.master')
@section('title','advertisment Manage')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage advertisment information</h3>
      			<div class="short_button">
              <a href="{{url('admin/advertisment/add')}}"><i class="fa fa-plus"></i>Add</a>
      			</div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Area</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($show_data as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->area}}</td>
                  <td><img src="{{asset($value->image)}}" class="backend_image " alt=""></td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>  <a href="{{$value->link}}" target="_blank">{{$value->link}}</a></td>
                  <td>
                  	<ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('admin/advertisment/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i></button> <span>Active</span>
                        </form>
                        @else
                          <form action="{{url('admin/advertisment/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i></button><span>Inactive</span>
                          </form>
                        @endif
                      </li>
                          <li>
                        <a class="edit_icon" href="{{url('admin/advertisment/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i></a>
                        <span>Edit</span>
                      </li>
                      <li>
                        <form action="{{url('admin/advertisment/delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="trash_icon" onclick="return confirm('Are you delete this?')"  title="delete"><i class="fa fa-trash"></i></button><span>Inactive</span>
                          </form></li>
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