<!-- head section -->
  @include('backEnd.layouts.includes.head')
<!-- head section end-->

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    @include('backEnd.layouts.includes.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backEnd.layouts.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('backEnd.layouts.includes.breadcrumb')
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('main_content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('backEnd.layouts.includes.footer')
