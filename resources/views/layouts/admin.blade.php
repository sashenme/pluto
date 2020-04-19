@include('inc.header')
@include('inc.nav')
@include('inc.sidebar')
<body class="sidebar-collapse">
  
<div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@include('inc.footer')