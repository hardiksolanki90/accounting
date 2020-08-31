<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content=""/>
      <meta name="author" content=""/>
      <title>Hardik - Multipurpose Bootstrap4 Admin Template</title>
      <!--favicon-->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"/>
      <!-- simplebar CSS-->
      <link href="{{ asset('css/simplebar.css') }}" rel="stylesheet"/>
      <!-- Bootstrap core CSS-->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- animate CSS-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" type="text/css"/>
        <!--Data Tables -->
        <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
      <!-- Icons CSS-->
      <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css">
      <link href="{{ asset('css/sidebar-menu.css') }}" rel="stylesheet"/>
      <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('css/sumoselect.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet"/>
      <!-- Custom Style-->
      <link href="{{ asset('css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('css/app-style.css') }}" rel="stylesheet"/>
      <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <script type="text/javascript">
         CSRF = "{{ csrf_token() }}";
         CURRENT_URL = "{{ url()->current() }}";
         const ADMIN_URL = "{{ url('/') }}";
       </script>
   </head>
   <body>
      <!-- Start wrapper-->
      <div id="wrapper">
         <!--Start sidebar-wrapper-->
         <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
               <a href="{{ url('dashboard') }}">
                   <img src="{{asset('images/footer-logo.png')}}" class="logo-icon" alt="logo icon">
                  <h5 class="logo-text">Suposa Invoice</h5>
               </a>
            </div>
            @include('_partials.sidebar')
         </div>
         <!--End sidebar-wrapper-->
         <!--Start topbar header-->
         @include('_partials.header')
         <!--End topbar header-->
         <div class="clearfix"></div>
         <div class="content-wrapper">
            <div class="container-fluid">
               @yield('content')
               <div class="overlay toggle-menu"></div>
               <!--end overlay-->
            </div>
            <!-- End container-fluid-->
         </div>
         <!--End content-wrapper-->
         <!--Start Back To Top Button-->
         <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
         <!--End Back To Top Button-->
      </div>
      <!--End wrapper-->
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/moment.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
      <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <!-- simplebar js -->
      <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
      <script src="{{ asset('js/simplebar.js') }}"></script>
      <!-- sidebar-menu js -->
      <script src="{{ asset('js/sidebar-menu.js') }}"></script> 
      <script src="{{ asset('js/jquery.sumoselect.min.js') }}"></script>
      <script src="{{ asset('js/axios.min.js') }}"></script>
      <script src="{{ asset('js/core.js') }}"></script> 
      <!-- Custom scripts -->
      <script src="{{ asset('js/app-script.js') }}"></script>
      <!-- Chart js -->
      {{-- <script src="assets/plugins/Chart.js/Chart.min.js"></script>
      <!-- Vector map JavaScript -->
      <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- Easy Pie Chart JS -->
      <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
      <!-- Sparkline JS -->
      <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
      <script src="assets/plugins/jquery-knob/excanvas.js"></script>
      <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
      <script>
         $(function() {
             $(".knob").knob();
         });
      </script>
      <!-- Index js -->
      <script src="assets/js/index.js"></script> --}}
   </body>
</html>