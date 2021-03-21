s@extends('backEnd.layouts.master')
@section('title','New Product Upload')
@section('main_content')

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage tranding information</h3>
      			<div class="short_button">
              <a href="{{url('/')}}"><i class="fa fa-plus"></i>Add</a>
      			</div>
          </div>
          <!-- /.card-header -->
            <div class="card-body user-border">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Masonary Name</th>
                  <th>Masonary Link</th>
                  <th>Masonary image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($all_MasonaryBanar_info as $v_MasonaryBanar)
                <tr>
                  <td>{{$v_MasonaryBanar->masonary_id}}</td>
                  <td>{{$v_MasonaryBanar->masonary_name}}</td>
                  <td>{{$v_MasonaryBanar->masonary_link}}</td>
                 <td><img src="{{asset($v_MasonaryBanar->masonary_image)}}" class="backend_image " alt=""></td>
                  <td> {{$v_MasonaryBanar->publication_status==1?'Active':'Inactive'}}</td>
                  
                  	<td>
                  		@if($v_MasonaryBanar->publication_status==1)
                  <a class="btn btn-success" href="{{URL::to('/unactive_MasonaryBanar/'.$v_MasonaryBanar->masonary_id)}}">
                    <i class="halflings-icon white thumbs-down">Deactive</i>  
                  </a>
                  @else
                  <a class="btn btn-success" href="{{URL::to('/active_MasonaryBanar/'.$v_MasonaryBanar->masonary_id)}}">
                    <i class="halflings-icon red thumbs-down">active</i>  
                  </a>
                  @endif
                  <a class="btn btn-danger" href="{{URL::to('/delete_MasonaryBanar/'.$v_MasonaryBanar->masonary_id)}}" id="delete">
                    <i class="halflings-icon white trash">Delete</i> 
                  </a>  
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