@extends('backEnd.layouts.master')
@section('title','All Seller')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">All Seller</h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <form action="{{url('editor/seller/bulk-option')}}" method="POST" id="myform">
                @csrf
               <table id="example1" class="table table-bordered table-striped">
                <select name="selleroptions" class="bulkselect" form="myform">
                  <option value="">Bulk Action</option>
                  <option value="1">Active Vandor</option>
                  <option value="0">Inactive Vandor</option>
                </select>
                <button type="submit" class="bulkbutton">Apply</button>
                <thead>
                  <tr>
                    <th><input type="checkbox"  id="My-Button"></th>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($sellers as $key=>$value)
                  <tr>
                  <td><input type="checkbox"  value="{{$value->id}}" name="sellers[]" form="myform"></td>
                  <td>{{$loop->iteration}}</td>
                  <td> <a href="{{url('editor/seller/view/'.$value->id.'/'.$value->slug)}}">{{$value->shopname}}</a></td>
                  <td> {{$value->sellerphone}}</td>
                  <td>{{$value->selleremail}}</td>
                  <td>{{$value->status==1?"Active":"Inactive"}}</td>
                  <td>
                    <ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                        @if($value->status==1)
                        <form action="{{url('editor/seller/inactive')}}" method="POST">
                          @csrf
                          <input type="hidden" name="hidden_id" value="{{$value->id}}">
                          <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i> Active</button>
                        </form>
                        @else
                          <form action="{{url('editor/seller/active')}}" method="POST">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$value->id}}">
                            <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i> Inactive</button>
                          </form>
                        @endif
                      </li>

                      <li>
                        <a class="edit_icon" href="{{url('editor/seller/product/view/'.$value->id)}}"><i class="fa fa-cart"></i> Products </a>
                      </li>

                      <!--<li>-->
                      <!--  <form action="{{url('editor/customer/delete')}}" method="POST">-->
                      <!--      @csrf-->
                      <!--      <input type="hidden" name="hidden_id" value="{{$value->id}}">-->
                      <!--      <button type="submit" class="trash_icon" title="delete"><i class="fa fa-trash"></i> Delete</button>-->
                      <!--    </form></li>-->
                        <li>
                       <a class="edit_icon" href="{{url('editor/seller/product/delete/'.$value->id)}}"><i class="fa fa-cart"></i> Delete </a>
                      </li>
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