<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Management Employees</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/adminLTE/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminLTE/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/adminLTE/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/adminLTE/css/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminLTE/css/_all-skins.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

</head>
<body class = "hold-transition skin-blue sidebar-mini">
    @include('admin.includes.header')
    <div class="d-flex" id="wrapper">
        @include('admin.includes.sidebar')
        <div class="content-wrapper" style="min-height: 926px;">

            <!-- Main content -->
            <section class="content">
                <div id="app">
                    @include('flash-message')
                </div>
                @yield('content')
            </section>
    </div>
    </div>
    @include('admin.includes.footer')

    <!-- jQuery 3 -->
    <script src="/adminLTE/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/adminLTE/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/adminLTE/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminLTE/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="/adminLTE/js/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="/adminLTE/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/adminLTE/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="/adminLTE/js/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="/adminLTE/js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/adminLTE/js/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminLTE/js/demo.js"></script>
</body>
</html>
