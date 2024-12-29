<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Language Hub - Admin Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Ace" name="author" />
    <link href="{{ asset('admin_asset/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_asset/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('admin_asset/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{ asset('admin_asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
        <link class="main-stylesheet" href="{{asset('admin_asset/pages/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="{{ asset('admin_asset/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="fixed-header ">
    <div class="register-container full-height sm-p-t-30">
        <div class="d-flex justify-content-center flex-column full-height ">
            <div class="register-card">
                <h3>ADMIN PANEL</h3>
                <p>
                    Enter email and password to access the admin panel.
                </p>
                @include('admin.layouts.errors')
                <form id="form-login" class="p-t-15 text-left" role="form" action="{{ route('admin.process_login') }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Enter email" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Minimum of 4 Charactors"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button aria-label="" class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{ asset('admin_asset/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_asset/plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
    </script>
    <!-- END VENDOR JS -->
    <script src="{{ asset('pages/js/pages.min.js') }}"></script>
    <script>
        $(function() {
            $('#form-login').validate()
        })
    </script>
</body>

</html>
