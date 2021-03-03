@extends('frontEnd.layouts.master')
@section('title','Contact Us')
@section('content')
    <!--common html-->
<div class="custom-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li class="hovercategory"><a class="anchor" id="hovercategory"> All Category <i class="fa fa-angle-down"></i></a></li>
                     <div class="row">
                         <div class="col-lg-3 col-md-3 col-sm-3">
                            <div id="hidemenu" class="hidemenu sidebar-menu">
                                @foreach($sidebarmenu as $category)
                                    <ul>
                                       <li><a href="{{url('category/'.$category->id)}}"><span>{{$category->name}}</span> <i class="fa fa-angle-right"></i></a>
                                            <ul class="mega-menu" id="mega-menu">
                                             @foreach($category->subcategories as $subcategory)
                                                <span>
                                                    <ul>
                                                        <li><a href="{{url('subcategory/'.$subcategory->id)}}" class="mega-title">{{$subcategory->subcategoryName}}</a>
                                                            
                                                            @foreach($subcategory->childcategories as $childsubcat)
                                                            <ul>
                                                                <li><a href="{{url('products/'.$childsubcat->id)}}">{{strtolower($childsubcat->childcategoryName)}}</a></li>
                                                            </ul>
                                                             @endforeach
                                                        </li> 
                                                         
                                                    </ul>
                                                </span>
                                                @endforeach
                                            </ul>
                                       </li>
                                   </ul>
                                    @endforeach
                                    
                                     <div class="view-all">
                                        <a href="{{url('view-all-category')}}">view all</a>
                                      </div>
                           </div>
                       </div>
                     </div>
                   <li><a href="{{url('/')}}">Home</a></li>
                <li><a class="anchor"><i class="fa fa-angle-right"></i></a></li>
                <li><a class="anchor">Contact Us </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--custom breadcrumb end-->
<section class="productarea" id="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    @foreach($contactinfo as $key=>$value)
                    <div class="contact-text">
                        <div class="sub-title">
                            <h6>Office Address</h6>
                        </div>
                        <ul class="contact-link">
                            <li class="item">
                                <div class="icon-box">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Location: 
                                </div>
                                <p>{!! $value->address !!}</p>
                            </li>
                            <li class="item">
                                <div class="icon-box">
                                    <i class="fa fa-phone" aria-hidden="true"></i> Phone:
                                </div>
                                <p>{{$value->phone}}</p>
                            </li>
                            <li class="item">
                                <div class="icon-box">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> Email: 
                                </div>
                                <p>{{$value->email}}</p>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <div class="sub-title">
                        <h6>Get In Tuch</h6>
                    </div>
                    <form action="{{url('visitor/contact')}}" method="POST" accept-charset="utf-8" id="form" class="cmn_form" name="contact_form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control{{ $errors->has('contact_subject') ? ' is-invalid' : '' }}" id="contact_subject" name="contact_subject" type="text" placeholder="Your Subject" value="{{ old('contact_subject') }}">
                                   @if ($errors->has('contact_subject'))
                                    <span class="invalid-feedback">
                                     <strong>{{ $errors->first('contact_subject') }}</strong>
                                    </span>
                                   @endif
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control{{ $errors->has('contact_email') ? ' is-invalid' : '' }}" id="contact_email" name="contact_email" type="text" placeholder="Your Email" value="{{ old('contact_email') }}">
                                   @if ($errors->has('contact_email'))
                                    <span class="invalid-feedback">
                                     <strong>{{ $errors->first('contact_email') }}</strong>
                                    </span>
                                   @endif
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"name="name" type="text" placeholder="Your Name" value="{{ old('name') }}">
                                   @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                     <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                   @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                 <div class="form-group">
                                    <input class="form-control{{ $errors->has('contact_phone') ? ' is-invalid' : '' }}" id="contact_phone" name="contact_phone" type="text" placeholder="Your Phone" value="{{ old('contact_phone') }}">
                                   @if ($errors->has('contact_phone'))
                                    <span class="invalid-feedback">
                                     <strong>{{ $errors->first('contact_phone') }}</strong>
                                    </span>
                                   @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                   <textarea class="form-control{{ $errors->has('contact_text') ? ' is-invalid' : '' }}" rows="8" name="contact_text" placeholder="Your Message">{{ old('contact_text') }}</textarea>
                                   @if ($errors->has('contact_text'))
                                    <span class="invalid-feedback">
                                     <strong>{{ $errors->first('contact_text') }}</strong>
                                    </span>
                                   @endif

                                <button type=""> Submit </button>
                                </div>
                        </div>
                        </div>
                    </form>
                </div>
                <!--col end-->
            </div>
            <!--row end-->
        </div>
    </div>
</section>
<!--productarea end-->
@endsection