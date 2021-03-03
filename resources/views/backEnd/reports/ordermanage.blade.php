@extends('backEnd.layouts.master')
@section('title','Order Information Report')
@section('main_content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="card-title">Order Information Report</h3>
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
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Customer Name</th>
                  <th>Customer Phone</th>
                  <th>Total Price</th>
                  <th>Order Time</th>
                  <th>Order Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $totalsales = 0; @endphp
                  @foreach($orderinfo as $key=>$value)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->fullName}}</td>
                  <td>{{$value->phoneNumber}}</td>
                  <td>BDT {{$value->orderTotal}}</td>
                  <td><p><strong>Date: </strong> {{date('F d, Y', strtotime($value->updated_at))}}</p>
                    <p><strong>Time: </strong> {{date('h:i:s a', strtotime($value->updated_at))}}</p></td>
                  <td>@if($value->orderStatus==1) Delivery @elseif($value->orderStatus==0) Receive @elseif($value->orderStatus==2) Confirmed @endif</td>
                  <td>
                    <ul class="action_buttons dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                        <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a class="edit_icon" href="{{url('editor/order/details/'.$value->shippingId.'/'.$value->customerId.'/'.$value->orderIdPrimary)}}"><i class="fa fa-eye"></i> Details View </a></li>
                          <li>
                            @if($value->orderStatus==1)
                              <button style="background: green"><i class="fa fa-check"> Paid</i></button>
                            </form>
                            @elseif($value->orderStatus==0)
                                <a href="{{url('editor/payment/order/confirm/'.$value->cid.'/'.$value->orderIdPrimary)}}" style="background: #E73549"><i class="fa fa-spinner"></i> Confirm</a>
                              </form>
                            @elseif($value->orderStatus==2)
                                <a href="{{url('editor/payment/order/delivery/'.$value->cid.'/'.$value->orderIdPrimary)}}" style="background: #97BF40"><i class="fa fa-spinner"></i> Delivery</a>
                              </form>
                             @endif
                              
                          </li>
                          <li> 
                          
                            @if($value->orderStatus==3)   
                              <button style="background: green"><i class="fa fa-check"> Cancelled</i></button>
                              @else
                              <a href="{{url('editor/payment/order/cancelled/'.$value->cid.'/'.$value->orderIdPrimary)}}" style="background: #97BF40"><i class="fa fa-tash"></i> Cancelled</a>
                             @endif
                             
                          </li>
                          
                          
                        </ul>
                    </ul>
                    </ul>
                  </td>
                </tr>
                @php $totalsales +=$value->orderTotal @endphp
                @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-primary">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total : BDT {{$totalsales}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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