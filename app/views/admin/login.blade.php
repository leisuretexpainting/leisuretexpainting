<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Leisuretexpainting Admin Login</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/timeline.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/morris.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/JQueryFileUpload/jquery.fileupload.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/JQueryFileUpload/jquery.fileupload-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/font-awesome/css/font-awesome.min.css">
    @section('header-css')
    @show
    <link rel="stylesheet" type="text/css" href="/assets/css/custom.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <div class="login-panel panel panel-default">
                    <div class="panel-sgdc">
                        <img src="/assets/img/leisuretexpainting-logo.png" alt="Leisuretexpainting" style="margin-left:-15px;"/>
                    </div>
                    <div class="panel-body">
                        <form id="form-admin-login" method="post" action="/login" role="form">
                            <div id="admin-login-alert" class="alert" style="display:none;"><p></p></div>
                            <input type="hidden" name="role_id" value="2"/>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember_me" type="checkbox" value="">Remember Me
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.ui.widget.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    @section('footer-js')
    @show
    <script src="/assets/js/admin.js"></script>
</body>

</html>
