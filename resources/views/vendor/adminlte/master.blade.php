<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/custom.css') }}">


    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    @endif

    <link rel="stylesheet" href="{{ asset('vendor/holdon/holdon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">
<div class="loader"></div>
@yield('body')



<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    {{-- <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

<script src="{{ asset('vendor/holdon/holdon.min.js') }}"></script>
<script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('adminlte_js')

<script type="text/javascript">
   $(window).on('load', function(){
        $('.loader').fadeOut();
   });


   $(document).ready( function () {
     $('#tables').DataTable();
     $('.select2').select2();

     $(document).on('click','.btn-delete',function () {
         var nama = $(this).data('name');
         var url = $(this).data('url');
         swal({
           title: "Apakah Anda Yakin?",
           text: "Anda akan menghapus data "+nama+"!",
           icon: "error",
           buttons: ["Batal", "Hapus!"],
           dangerMode :true,
         })
         .then((willDelete) => {
           if (willDelete) {
             location.replace(url);
           }
         });
       });

       $(document).on('click','.btn-edit',function () {
           var nama = $(this).data('name');
           var url = $(this).data('url');
           swal({
             title: "Apakah Anda Yakin?",
             text: "Anda akan merubah data "+nama+"!",
             icon: "warning",
             buttons: ["Batal", "Ubah!"],
             dangerMode :true,
           })
           .then((willDelete) => {
             if (willDelete) {
               location.replace(url);
             }
           });
         });

         $(document).on('click','.btn-nonactive',function () {
            var nama = $(this).data('name');
            var url = $(this).data('url');
            swal({
              title: "Apakah Anda Yakin?",
              text: "Anda akan menonaktifkan buku "+nama+"!",
              icon: "warning",
              buttons: ["Batal", "Non Aktifkan!"],
              dangerMode :true,
            })
            .then((willDelete) => {
              if (willDelete) {
                location.replace(url);
              }
            });
          });

          $(document).on('click','.btn-active',function () {
            var nama = $(this).data('name');
            var url = $(this).data('url');
            swal({
              title: "Apakah Anda Yakin?",
              text: "Anda akan mengaktifkan buku "+nama+"!",
              icon: "warning",
              buttons: ["Batal", "Aktifkan!"],
              dangerMode :true,
            })
            .then((willDelete) => {
              if (willDelete) {
                location.replace(url);
              }
            });
          });

          $('#btn-setting').click(function(event) {
            $('#changePassword').modal('show');
          });

   } );
</script>
</body>
</html>
