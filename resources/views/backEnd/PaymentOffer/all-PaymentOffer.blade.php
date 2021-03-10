@extends('backEnd.layouts.master')
@section('title','New Product Upload')
@section('main_content')

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Manage Payment offer information</h3>
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
                  <th>payment offer</th>
                  <th>payment_offer_short_description</th>
                  <th>logo</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($all_PaymentOffer_info as $v_PaymentOffer)
                <tr>
                  <td>{{$v_PaymentOffer->payment_offer_id}}</td>
                  <td>{{$v_PaymentOffer->payment_offer}}</td>
                  <td>{{$v_PaymentOffer->payment_offer_short_description}}</td>
                  <td><img src="{{asset($v_PaymentOffer->payment_offer_logo)}}" class="backend_image " alt=""></td>
                  <td> {{$v_PaymentOffer->publicatio_status==1?'Active':'Inactive'}}</td>
                  
                  	<td>@if($v_PaymentOffer->publicatio_status==1)
                  <a class="btn btn-success" href="{{URL::to('/unactive_paymentoffer/'.$v_PaymentOffer->payment_offer_id)}}">
                    <i class="halflings-icon white thumbs-down">Deactive</i>  
                  </a>
                  @else
                 <a class="btn btn-success" href="{{URL::to('/active_paymentoffer/'.$v_PaymentOffer->payment_offer_id)}}">
                    <i class="halflings-icon white thumbs-down">Deactive</i>  
                  </a>
                  @endif
                  <a class="btn btn-danger" href="{{URL::to('/delete_paymentoffer/'.$v_PaymentOffer->payment_offer_id)}}" id="delete">
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