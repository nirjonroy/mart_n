@extends('backEnd.layouts.master')
@section('title','coupon code Manage')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage coupon code</h3>
      			<div class="short_button">
              <a href="{{url('admin/couponcode/add')}}"><i class="fa fa-plus"></i>Add</a>
      			</div>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Code</th>
                  <th>Expairdate</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Buy Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($show_data as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->couponcode}}</td>
                  <td>{{$value->expairdate}}</td>
                  <td> {{$value->offertype==1?'Persantance':'Amount'}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{$value->buyammount}}</td>
                  <td> {{$value->status==1?'Active':'Inactive'}}</td>
                  <td>
                    <ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('admin/couponcode/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i> Active</button>
                        </form>
                        @else
                          <form action="{{url('admin/couponcode/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i> Inactive</button>
                          </form>
                        @endif
                      </li>
                          <li>
                        <a class="edit_icon" href="{{url('admin/couponcode/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                      </li>
                      <li>
                        <form action="{{url('admin/couponcode/delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="trash_icon" title="delete"><i class="fa fa-trash"></i> Delete</button>
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