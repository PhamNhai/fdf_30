<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@lang('admin.Admin')</title>

    <link href="{!! asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('admin/bower_components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('admin/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

    <link href="{!! asset('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}" rel="stylesheet">

    <link href="{!! asset('admin/bower_components/datatables-responsive/css/dataTables.responsive.css') !!}" rel="stylesheet">

    <link href="{!! asset('admin/mycss.css') !!}">
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
                <a class="navbar-brand" href="javascript:void(0);">@lang('admin.Admin-Manager')</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:void(0);"><i class="fa fa-user fa-fw"></i>@lang('admin.User-Profile')
                            </a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-gear fa-fw"></i>@lang('admin.Settings')
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-sign-out fa-fw"></i>@lang('admin.Logout')
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            {!! Form::open() !!}
                                <div class="input-group custom-search-form">
                                    {!! Form::text ('search', null,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'search'

                                                        ]
                                                    )
                                    !!}
                                    <span class="input-group-btn">
                                    {!! Form::button('<i class="fa fa-search"></i>',
                                                        [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-default'
                                                        ]
                                                    )
                                    !!}
                                    </span>
                                </div>
                            {!! Form::close() !!}
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-dashboard fa-fw"></i>
                                @lang('admin.Dashboard')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-gift"></i>
                                @lang('admin.Type')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.List-Type')</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.Add-Type')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-bar-chart-o fa-fw"></i>
                                @lang('admin.Category')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.List-Category')</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.Add-Category')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-cube fa-fw"></i>
                                @lang('admin.Product')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.List-Product')</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.Add-Product')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-users fa-fw"></i>
                                @lang('admin.User')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.List-User')</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">@lang('admin.Add-User')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-list-alt"></i>
                                @lang('admin.Order')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-user"></i>
                                @lang('admin.Customer')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-comment"></i>
                                @lang('admin.Comment')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-star"></i>
                                @lang('admin.Rate')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-question-sign"></i>
                                @lang('admin.Suggest')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{!! asset('admin/bower_components/jquery/dist/jquery.min.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}">
    </script>

    <script type="text/javascript" src="{!! asset('admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}">
    </script>

    <script type="text/javascript" src="{!! asset('admin/dist/js/sb-admin-2.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') !!}">
    </script>

    <script type="text/javascript" src="{!! asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}">
    </script>

    <script type="text/javascript" src="{!! asset('admin/js/myscript.js') !!}"></script>
</body>
</html>
