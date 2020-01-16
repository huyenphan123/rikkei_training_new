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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <div class="container">
        <div class="row justify-content-center">

{{--            <div class="col-sm-12">--}}
{{--                @if(session()->get('success') != null)--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{ session('success') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}

            <div class="col-sm-12">
                @if(session()->get('error') != null)
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b> <center>Change Password</center>
                        </b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('changepass') }}" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Old Password</label>

                                <div class="col-md-4">
                                    <input id="old_password" type="password" class="form-control" name="old_password" >
                                </div>

                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">New Password</label>

                                <div class="col-md-4">
                                    <input id="new_password" type="password" class="form-control" name="new_password" >
                                </div>

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-4">
                                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" >
                                </div>

                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0" style="margin-left: 25px">
                                <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary pull-right">Save
                                        </button>
                                </div>
                                <div class="col-md-3 offset-md-3">
                                    <center>
                                        <a type="button" class="btn btn-success"
                                           href="/staffs">
                                            Skip
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

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

{{--@endsection--}}

