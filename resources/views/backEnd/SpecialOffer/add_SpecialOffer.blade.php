@extends('backEnd.layouts.master')
@section('title','Category Add')
@section('main_content')
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
          <h3 class="card-title">Add Special Offer information</h3>
          <div class="short_button">
            <a href="{{url('')}}"><i class="fa fa-cogs"></i>Manage</a>
          </div>
      </div>
      <!--card-header -->
            <div id="form_body" class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="custom-bg">
                    <form action="{{url('/save-SpecialOffer')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Offer Date</label>
                              <input type="text" name="special_offer_date" class="form-control{{ $errors->has('special_offer_date') ? ' is-invalid' : '' }}" value="{{ old('special_offer_date') }}">

                              @if ($errors->has('special_offer_date'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('special_offer_date') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Offer info</label>
                              <input type="text" name="special_offer" class="form-control{{ $errors->has('special_offer') ? ' is-invalid' : '' }}" value="{{ old('special_offer') }}">

                              @if ($errors->has('special_offer'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('special_offer') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>Offer discount</label>
                              <input type="text" name="special_offer_discount" class="form-control{{ $errors->has('special_offer_discount') ? ' is-invalid' : '' }}" value="{{ old('special_offer_discount') }}">

                              @if ($errors->has('special_offer_discount'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('special_offer_discount') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="note">
                              <div class="row">
                                <div class="col-sm-2">
                                  <div class="note-icon">
                                    <i class="fa fa-info"></i>
                                  </div>
                                </div>
                                <div class="col-sm-10">
                                  <div class="note-text">
                                    <p>Image Instruction</p>
                                    <p>Width=1285,Height=325,Size=Max 2MB,Type=jpg,png. </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- image note -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="special_offer_logot" class="form-control{{ $errors->has('special_offer_logot') ? ' is-invalid' : '' }}" value="{{ old('special_offer_logot') }}" accept="image/*">
                            
                                @if ($errors->has('special_offer_logot'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('special_offer_logot') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- form-group end -->
                        </div>
                        
                        <!-- form-group end -->
                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="status">Publication Status</label>
                            <div class="box-body pub-stat display-inline">
                            <input class="form-control{{ $errors->has('publication_status') ? ' is-invalid' : '' }}" type="radio" id="active" name="publication_status" value="1">
                            <label for="active">Active</label>
                            @if ($errors->has('publication_status'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('publication_status') }}</strong>
                            </span>
                            @endif
                        </div>
                          <div class="box-body pub-stat display-inline">
                              <input class="form-control{{ $errors->has('publication_status') ? ' is-invalid' : '' }}" type="radio" name="publication_status" value="0" id="inactive">
                              <label for="inactive">Inactive</label>
                              @if ($errors->has('publication_status'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('publication_status') }}</strong>
                              </span>
                              @endif
                          </div>
                              @if ($errors->has('publication_status'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('publication_status') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-12 mrt-30">
                          <div class="form-group">
                              <button type="submit" class="btn submit-button">submit</button>
                              <button type="reset" class="btn btn-default">clear</button>
                          </div>
                      </div>
                      <!-- /.form-group -->
                 </div>
                </div>
              </div>
            <!-- /.col -->
              </form>
          </div>
        <!--card-body-->
      </div>
      <!--card-->
    </div>
  <!--container-fluid-->
  </section>
  <!-- /.content -->
@endsection