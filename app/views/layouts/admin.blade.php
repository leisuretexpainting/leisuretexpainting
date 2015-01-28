<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Leisuretexpainting Admin Backend</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/timeline.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/AdminLTE.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/typeahead.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/morris.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plugins/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jvectormap/jquery-jvectormap-1.2.2.css"/>        
    <link rel="stylesheet" type="text/css" href="/assets/css/fullcalendar/fullcalendar.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/daterangepicker/daterangepicker-bs3.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>

    <link rel="stylesheet" type="text/css" href="/packages/jqueryfileupload/css/jquery.fileupload.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/jqueryfileupload/css/jquery.fileupload-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/packages/ionicons/css/ionicons.min.css">

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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="/admin"><img src="/assets/img/leisuretexpainting-logo.png" alt="Leisuretexpainting"/></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> New Message
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/admin/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="/admin/settings"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="active" href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:;"><i class="fa fa-users"></i> Users</a>
                            <ul class="nav nav-second-level">
                                <li><a href="/admin/users">Manage User</a></li>
                                <!-- <li><a href="/admin/userroles">Manage User Roles</a></li> -->
                                <li><a href="/admin/users/create">Create New User</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active" href="javascript:;"><i class="icon-building"></i> Contractors</a>
                            <ul class="nav nav-second-level">
                                <li><a href="/admin/contractors">Manage Contractors</a></li>
                                <li><a href="/admin/contractors/create">Create New Contractor</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active" href="javascript:;"><i class="icon-book"></i> Contacts</a>
                            <ul class="nav nav-second-level">
                                <li><a href="/admin/contacts">Manage Contacts</a></li>
                                <li><a href="/admin/contacts/create">Create New Contact</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="active" href="javascript:;"><i class="fa fa-file"></i> Tenders</a>
                            <ul class="nav nav-second-level">
                                <li><a href="/admin/tenders">Manage Tenders</a></li>
                                <li><a href="/admin/tenders/create">Create New Tender</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
        <div id="ltp-confirm-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.ui.widget.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="/assets/js/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/assets/js/plugins/typeahead/typeahead.js"></script>
    <script src="/assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    
    
    <script src="/packages/jqueryfileupload/js/jquery.fileupload.js"></script>
    <script src="/packages/jqueryfileupload/js/jquery.iframe-transport.js"></script>
    <script src="/packages/jqueryfileupload/js/jquery.fileupload-process.js"></script>
    <script src="/packages/jqueryfileupload/js/jquery.fileupload-validate.js"></script>
    <script src="/packages/jqueryfileupload/js/jquery.fileupload-ui.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="/assets/js/plugins/JQueryFileUpload/cors/jquery.xdr-transport.js"></script>
    <![endif]-->

    <script src="/assets/js/fileupload.js"></script>
    <script src="/assets/js/admin.js"></script>
    @section('footer-js')
    @show
    <script type="text/javascript">
        $(document).ready(function(){
           $('#side-menu').metisMenu(); 
        });
    </script>
</body>

</html>
