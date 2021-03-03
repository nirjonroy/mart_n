@extends('backEnd.layouts.master')
@section('title','Category Manage')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage category information</h3>
      			<div class="short_button">
              <a href="{{url('editor/category/add')}}"><i class="fa fa-plus"></i>Add</a>
      			</div>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category Name</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($show_data as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->catname}}</td>
                  <td><img src="{{asset($value->image)}}" class="backend_image" alt=""></td>
                  <td>{{$value->link}}</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>
                  	<ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('editor/category/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i> Active</button> 
                        </form>
                        @else
                          <form action="{{url('editor/category/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i> Inactive</button>
                          </form>
                        @endif
                      </li>
                        <li>
                         <a class="edit_icon" href="{{url('editor/category/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                      </li>
                      
                       <li>
                         <a class="edit_icon" href="{{url('editor/category/delete/'.$value->id)}}" title="Delete"><i class="fa fa-edit"></i> Delete</a>
                      </li>
                        <li>
                        <a class="edit_icon" href="{{url('editor/category/menu-sort/'.$value->id)}}" title="Edit"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Menu Sort</a>
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