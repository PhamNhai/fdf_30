<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <title>{{ trans('frontend.foods-drinks') }}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    {!! Html::style('frontend/css/bootstrap.css') !!}
    {!! Html::style('frontend/css/style.css') !!}
    {!! Html::style('frontend/css/dark.css') !!}
    {!! Html::style('frontend/font-awesome-4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('frontend/css/animate.css') !!}
    {!! Html::style('frontend/css/magnific-popup.css') !!}
    {!! Html::style('frontend/css/components/ion.rangeslider.css') !!}
    {!! Html::style('frontend/css/mystyle.css') !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('item')

    <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
</head>
<body class="stretched">
    <div id="wrapper" class="clearfix">
        <header id="header" class="full-header">
            <div id="header-wrap">
                <div class="container clearfix">
                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                    <div id="logo">
                        <a href="#" class="standard-logo">
                            {{ HTML::image(config('app.logo')) }}
                        </a>
                    </div>
                    <nav id="primary-menu">
                        <ul>
                            <li><a href="{{ route('frontend.product') }}">{{ trans('frontend.dashboard') }}</a>
                            </li>
                            <li><a href="#">{{ trans('frontend.category') }}</a>
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('product-category', $category->id) }}">
                                            <div>
                                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                                {{ $category->name }}
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach()
                                </ul>
                            </li>
                            <li><a href="#"><div>{{ trans('frontend.information') }}</div></a>
                                <ul>
                                    <li><a href="#">
                                            <div>
                                                <i class="fa fa-cart-arrow-down"
                                                    aria-hidden="true">
                                                </i>
                                                {{ trans('frontend.help') }}
                                            </div>
                                        </a>
                                    </li>
                                    <li><a href="#">
                                            <div><i class="fa fa-info" aria-hidden="true"></i>
                                                {{ trans('frontend.note') }}
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if (Auth::check())
                            <li class="mega-menu">
                                <a href="{{ route('suggest') }}">
                                    <div>{{ trans('frontend.suggest') }}</div>
                                </a>
                            </li>
                            @endif
                            <li class="mega-menu">
                                <a href="http://m.me/FOODSDRINKS.123345">
                                    <div> {{ trans('frontend.contact') }}
                                        <i class="fa fa-facebook fb" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </li>
                            @if (Auth::check())
                            <li><a href="#"><div class="name-user">{{ ucwords(Auth::user()->name) }}</div></a>
                                <ul>
                                    <li><a href="#">
                                            <div><i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                               {{ trans('admin.user-profile') }}
                                            </div>
                                        </a>
                                    </li>
                                    <li><a href="#">
                                            <div><i class="fa fa-gear fa-fw" aria-hidden="true"></i>
                                                {{ trans('admin.settings') }}
                                            </div>
                                        </a>
                                    </li>
                                    <li id="click-frontend"><a href="#">
                                            <div><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>
                                                {{ trans('admin.logout') }}
                                            </div>
                                        </a>
                                        {!! Form::open([
                                            'class' => 'fix-form-frontend',
                                            'route' => 'logout',
                                            'method' => 'POST',
                                            'id' => 'logout-form',
                                            ]) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ url('login') }}"><div>{{ trans('frontend.login') }}</div></a>
                            @endif
                            <li><a href="{{ url('admin/home') }}"><div>{{ trans('frontend.admin') }}</div></a>
                        </ul>
                        <div id="top-cart">
                            <a href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span> {{ Cart::getTotalQuantity() }} </span>
                            </a>
                        </div>
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="fa fa-search-plus"
                                aria-hidden="true"></i></a>
                            {!! Form::open([
                                'route' => 'login',
                                'method' => 'POST',
                                'role' => 'form',
                                ])
                            !!}
                                {!! Form::text ('q', old('q'), [
                                    'class' => 'form-control',
                                    'placeholder' => @trans('frontend.type-and-enter'),
                                    ])
                                !!}
                            {!! Form::close() !!}
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section id="page-title">
        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="clear"></div>
                    <div id="shop" class="shop grid-container clearfix">
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
        </section>
        <footer id="footer" class="dark">
            <div class="container">
                <div class="footer-widgets-wrap clearfix">
                    <div class="col_two_third">
                        <p>{{ trans('frontend.copyright') }}</p>

                        <div>
                            <address class="add">
                                <strong>{{ trans('frontend.address') }}</strong><br>
                                434 Tran Khat Chan<br>
                            </address>
                            <address class="contact">
                                <abbr title="Phone Number"><strong>{{ trans('frontend.phone') }}</strong></abbr>
                                (+84) 988139396
                                <br>
                                <abbr title="Email Address"><strong>{{ trans('frontend.email') }}</strong></abbr>
                                larbo@framgia.com
                            </address>
                        </div>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="widget clearfix">
                            <div class="row">
                                <div class="col-md-6 clearfix bottommargin-sm likefb">
                                    <a href="https://www.facebook.com/FOODSDRINKS.123345/" class="social-icon si-dark si-colored si-facebook
                                        nobottommargin">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </a>
                                    <a href="#">
                                        <small>
                                            <strong>{{ trans('frontend.like-us') }}</strong><br>
                                            {{ trans('frontend.on-facebook') }}
                                        </small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div id="gotoTop" class="fa fa-arrow-circle-up"></div>

    {!! Html::script('frontend/js/jquery.js') !!}
    {!! Html::script('frontend/js/plugins.js') !!}
    {!! Html::script('frontend/js/rangeslider.min.js') !!}
    {!! Html::script('frontend/js/jquery.min.js') !!}
    {!! Html::script('frontend/js/bootstrap.min.js') !!}
    {!! Html::script('frontend/js/functions.js') !!}
    {!! Html::script('frontend/js/myscript.js') !!}
    @yield('script')

</body>
</body>
</html>
