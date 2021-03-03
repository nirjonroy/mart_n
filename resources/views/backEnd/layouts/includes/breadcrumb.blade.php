<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 t welcome-dash">Welcome !! {{Auth::user()->name}}</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('superadmin/dashboard')}}">Home</a></li>
              <?php $segments = ''; ?>
              @foreach(Request::segments() as $segment)
                  <?php $segments .= '--'.$segment; ?>
                  <li class="breadcrumb-item active">
                     {{$segment}}
                  </li>
              @endforeach
          
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>