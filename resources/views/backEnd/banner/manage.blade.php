@extends('backEnd.layouts.master')
@section('title','Banner Manage')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage Banner information</h3>
      			<div class="short_button">
              <a href="{{url('editor/banner/add')}}"><i class="fa fa-plus"></i>Add</a>
      			</div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <form action="{{url('editor/banner/bulk-option')}}" method="POST" id="myform">
                @csrf
              <table id="example" class="table table-bordered table-striped">
                <select name="selectptions" class="bulkselect" form="myform">
                  <option value="">Bulk Action</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                <button type="submit" class="bulkbutton">Apply</button>
                <thead>
                <tr>
                  <th><input type="checkbox"  id="My-Button"></th>
                  <th>Sl</th>
                  <th>Image</th>
                  <th>Area</th>
                  <th>Status</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($show_data as $key=>$value)
                <tr>
                  <td><input type="checkbox"  value="{{$value->id}}" name="banners[]" form="myform"></td>
                  <td>{{$loop->iteration}}</td>
                  <td><img src="{{asset($value->image)}}" class="backend_image " alt=""></td>
                  <td> {{$value->area}}</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>  <a href="{{$value->link}}" target="_blank">{{str_limit($value->link,20)}}</a></td>
                  <td>
                  	<ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('editor/banner/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i> Active</button> 
                        </form>
                        @else
                          <form action="{{url('editor/banner/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i> Inactive</button>
                          </form>
                        @endif
                      </li>
                          <li>
                        <a class="edit_icon" href="{{url('editor/banner/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                      </li>
                      <li>
                        <form action="{{url('editor/banner/delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="trash_icon" onclick="return confirm('Are you delete this?')"  title="delete"><i class="fa fa-trash"></i> Delete</button>
                          </form></li>
                        </ul>
                    </ul>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </form>
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