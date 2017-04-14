<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('admin.admin')</title>

    {!! Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('admin/bower_components/metisMenu/dist/metisMenu.min.css') !!}
    {!! Html::style('admin/dist/css/sb-admin-2.css') !!}
    {!! Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}
    {!! Html::style('admin/bower_components/datatables-responsive/css/dataTables.responsive.css') !!}
    {!! Html::style('admin/mycss.css') !!}
    @yield('item')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:void(0);">
                    @lang('admin.admin-manager')
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                {{ HTML::image(auth::user()->avatar ? auth::user()->avatar : config('app.avatar_default_path'), trans('user.this-is-avatar'),
                    [
                        'class' => 'img-avatar',
                    ])
                }}
                </li>
                <li>
                    <p><font class="font">{{ ucwords(Auth::user()->name) }}</font></p>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:void(0);"><i class="fa fa-user fa-fw"></i>
                            {{ trans('admin.user-profile') }}
                            </a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-gear fa-fw"></i>
                            @lang('admin.settings')
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a id="click" href="#">
                                <i class="fa fa-sign-out fa-fw"></i>
                                    @lang('admin.logout')
                            </a>
                            {!! Form::open([
                                'route' => 'logout',
                                'method' => 'POST',
                                'id' => 'logout-form',
                                ]) !!}
                            {!! Form::close() !!}
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
                                    {!! Form::text ('search', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'search',
                                        ]) !!}
                                    <span class="input-group-btn">
                                    {!! Form::button('<i class="fa fa-search"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default',
                                        ]) !!}
                                    </span>
                                </div>
                            {!! Form::close() !!}
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-dashboard fa-fw">
                            </i>
                                @lang('admin.dashboard')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-bar-chart-o fa-fw"></i>
                                @lang('admin.category')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\CategoryController@index') }}">@lang('admin.list-category')</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\CategoryController@create') }}">@lang('admin.add-category')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-cube fa-fw"></i>
                                @lang('admin.product')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\ProductController@index') }}">@lang('admin.list-product')</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\ProductController@create') }}">
                                        @lang('admin.add-product')
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-users fa-fw"></i>
                                @lang('admin.user')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\UserController@index') }}">@lang('admin.list-user')</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\UserController@create') }}">@lang('admin.add-user')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ action('Admin\OrderController@index') }}"><i class="glyphicon glyphicon-list-alt"></i>
                                @lang('admin.order')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-comment"></i>
                                @lang('admin.comment')
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="glyphicon glyphicon-star"></i>
                                @lang('admin.rate')
                            </a>
                        </li>
                        <li>
                            <a href="{{ action('Admin\SuggestController@index') }}"><i class="glyphicon glyphicon-question-sign"></i>
                                @lang('admin.suggest')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if (Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    </div>
                   @yield('content')
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('admin/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}
    {!! Html::script('admin/dist/js/sb-admin-2.js') !!}
    {!! Html::script('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}
    {!! Html::script('admin/js/myscript.js') !!}
    @yield('script');
</body>
</html>
