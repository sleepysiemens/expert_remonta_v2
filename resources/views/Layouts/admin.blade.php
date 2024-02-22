<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

  @stack('dropzone')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if(auth()->user()->role == 'admin')
      <li class="nav-item">
        <a href="{{ route('admin.application.index') }}" class="nav-link">
          <i class="nav-icon far fa-address-book"></i> Заявки
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.counter.index') }}" class="nav-link">
          <i class="nav-icon fas fa-chart-bar"></i> Счетчики
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.formtype.index') }}" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i> Формы
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.settings.index') }}" class="nav-link">
          <i class="nav-icon fas fa-cog"></i> Настройки
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.settings.cache.reset') }}" class="nav-link">
          <i class="nav-icon fas fa-database"></i> Очистить кэш
        </a>
      </li>
      @if(auth()->id() === 1)
      <li class="nav-item">
        <a href="{{ route('admin.settings.login') }}" class="nav-link">
          <i class="nav-icon fas fa-door-open"></i> Страница входа
        </a>
      </li>
      <li class="nav-item">
        <a href="{{$oppositeAdminUrl}}" class="nav-link">
          <i class="nav-icon fas fa-directions"></i> Переключиться
        </a>
      </li>
      @endif
      @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3 | {{auth()->user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user-circle" style="font-size: 34px; color: #17a2b8"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>--}}


      <!-- Sidebar Menu -->
      @include('admin.sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(session('msg'))
              <div class="mt-2">
                @if(session('msg'))
                  <div class="success_msg" style="position: fixed;
                  top: 0;
                  left: 0;
                  font-size: 20px;
                  width: 100%;
                  text-align: center;
                  background: #17a2b8;
                  padding: 5px 0;
                  transition: all .35s;
                  opacity: 1;
                  z-index: 999999;
                  color: #fff;">{{ session('msg') }}</div>
                @endif
              </div>
          @endif
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard "Эксперт Ремонта" v.1.2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/lang/summernote-ru-RU.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

@unless(isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], '/admin/user/create'))
<script>
  document.addEventListener("DOMContentLoaded", e => {
    let success_msg = document.querySelector('.success_msg')
    if(!success_msg) return
    //success_msg.classList.add('active');
    setTimeout(() => {
      //success_msg.style.opacity = 0;
      success_msg.style.display = 'none';
    }, 3000);
  });
</script>
@endUnless

@stack('customScripts')

  <script>
    $(document).ready(function() {
  $('#summernote').summernote(
    {
       toolbar: [
    // [groupName, [list of button]]
    //['style', ['style']],
    ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ],
  lang: 'ru-RU',
  followingToolbar: true
    }
  );
});
  </script>

<script>
    $(document).ready(function() {
        $('#summernote1').summernote(
            {
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                lang: 'ru-RU',
                followingToolbar: true
            }
        );
    });
</script>

<script>
  $(document).ready(function() {
      $('#summernote2').summernote(
          {
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
              ],
              lang: 'ru-RU',
          }
      );
  });
</script>

<script>
  $(document).ready(function() {
      $('#summernote4').summernote(
          {
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
              ],
              lang: 'ru-RU',
          }
      );
  });
</script>

<script>
  $(document).ready(function() {
      $('#summernote5').summernote(
          {
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
              ],
              lang: 'ru-RU',
          }
      );
  });
</script>

<script>
  $(document).ready(function() {
      $('#summernote6').summernote(
          {
              toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
              ],
              lang: 'ru-RU',
          }
      );
  });
</script>

@stack('summernoteCustom')
<script>
  $(document).ready(function() {
      $('#summernote_image').summernote({
    lang: 'ru-RU', // default: 'en-US'
    followingToolbar: true,
    popover: {
            image: [
                ['custom', ['imageAttributes']],
                //['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        },
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty:false, // true = remove attributes | false = leave empty if present
            disableUpload: true // true = don't display Upload Options | Display Upload Options
        },
    callbacks: {
        // editor, welEditable
        onImageUpload: function(files) {
            // editor, welEditable
            sendFile(files[0]);
        }
    }
  });

  // editor, welEditable
  function sendFile(file) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
      data: data,
      type: "POST",
      url: "/admin/blocks/summernote/upload",
      cache: false,
      contentType: false,
      processData: false,
      success: function(url) {
        //editor.insertImage(welEditable, url);
        $('#summernote_image').summernote('insertImage', url);
      }
    });
  }

  });
</script>



</body>
</html>
