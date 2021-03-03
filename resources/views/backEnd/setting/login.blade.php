<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mart9294 :: @yield('title','Admin Login')</title>
    <!--======css start========-->
     @foreach($faveicon as $key=>$value)
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset($value->faveicon)}}">
    @endforeach
    <!-- fabeicon css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/bootstrap.min.css">
     <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/font-awesome.min.css">
     <!-- font awesome 4.7 css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/style.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/responsive.css">
    <!-- responsive css -->
    <script src="{{asset('public/frontEnd/')}}/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    
    <!--======css end========-->
</head>
<body>  
        <section class="admin-login common-design dark-bg"  style="background: url({{asset('public/frontEnd/images/login-banner.jpg')}});background-position: center;background-size: cover;background-repeat: no-repeat;position: relative;height: 100vh">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-3"></div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="customer-register marchantl-pannel adminl-panel">
                    <div class="title">
                      <h5>Admin Login</h5>
                    </div>
                    <form action="{{url('login')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="fullname">Email<span>*</span></label>
                        <input type="text" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                         @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Password <span>*</span></label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Sign In" class="registerbtn">
                      </div>
                    </form>

                    <div class="admin-logo">
                       @foreach($mainlogo as $key=>$value)
                          <img src="{{asset($value->logo)}}" alt="">
                          @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

    <script src="{{asset('public/frontEnd/')}}/js/jquery.ajax.js"></script>
    <!-- scrollUp js -->
    <script src="{{asset('public/frontEnd/')}}/js/bootstrap.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('public/frontEnd/')}}/js/script.js"></script>
    <!-- script js -->
    <!-- ======script js end======= -->
</body>
</html>