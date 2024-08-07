<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{$title}}</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src="{{url("")}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url("")}}/assets/style/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Axios --}}
    <script src="{{url("")}}/assets/plugins/axios/index.js"></script>
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Topbar -->
        @include('templates/topbar')

        <!-- Sidebar -->
        @include('templates/sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{$title}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$title}}</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('views')
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('templates/footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{url("")}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url("")}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url("")}}/assets/style/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="{{url("")}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{url("")}}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{url("")}}/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{url("")}}/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- jquery-validation -->
    <script src="{{url("")}}/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url("")}}/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Select2 -->
    <script src="{{url("")}}/assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Summernote -->
    <script src="{{url("")}}/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{url("")}}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{url("")}}/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- InputMask -->
    <script src="{{url("")}}/assets/plugins/moment/moment.min.js"></script>
    <script src="{{url("")}}/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{url("")}}/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url("")}}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
            $('#summernote1').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
            });
        })
    </script> -->
    <script>
        $(function() {
            const apiUrl = "{{config('constant.web_user_api')}}"
            axios.defaults.baseURL = apiUrl
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4',
            })
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
        window.setTimeout(function() {
            $(".alert-success").fadeTo(1000, 0).slideUp(1000, function() {});
            $(".alert-danger").fadeTo(1000, 0).slideUp(1000, function() {});
        }, 2000);

        const alert = (color, text) => {
            $('#flashdata').html('')
            $(`<div class="alert alert-${color} alert-dismissible" id="alert" style="font-weight: bold;">${text}</div>`).show().appendTo('#flashdata')
            $('#alert').delay(2750).slideUp('slow', () => {
                $(this).remove()
            });
        }
    </script>
</body>

</html>