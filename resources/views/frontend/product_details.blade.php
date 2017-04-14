@extends('frontend.master')

@section('item')
    {!! Html::style('http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css') !!}
    {!! Html::style('admin/tam/rate/css/star-rating.css') !!}
    {!! Html::style('admin/tam/rate/themes/krajee-svg/theme.css') !!}
    {!! Html::style('admin/tam/rate.css') !!}
    {!! Html::style('admin/tam/comment.css') !!}
@endsection()

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {!! Html::script('admin/tam/rate/js/star-rating.js') !!}
    {!! Html::script('admin/tam/rate/themes/krajee-svg/theme.js') !!}
    {!! Html::script('admin/tam/rate/js/locales/{lang}.js') !!}
    {!! Html::script('admin/tam/rate/rate.js') !!}
    {!! Html::script('admin/js/myscript.js') !!}
@endsection()
@section('content')
<div class="product-item-details">
    @if (Session::has('errors'))
        <div class="alert alert-danger">
            {{ Session::get('errors') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="right">
        <div class="image-details">
            <a href="#">
                {{ Html::image(config('app.image_path') . '/' . $product->image) }}
            </a>
        </div>
        <div class="line fix-line"></div>
        @if (auth()->check())
            <div>
                <h4 class="text-primary">Please! Rate it:</h4>
                {!! Form::open() !!}
                    <div class="hide" data-route="{{ url('rate') }}"></div>
                    {!! Form::text('rate', $userRateValue, [
                        'id' => "input-2",
                        'class' => 'rating rating-loading',
                        'data-size' => "xs",
                        'data-step' => "1",
                    ]) !!}
                    {!! Form::hidden('product_id', $product->id, [
                        'id' => 'product-id',
                    ]) !!}
                    {!! Form::hidden('user_id', Auth::user()->id, [
                        'id' => 'user_id',
                    ]) !!}
                {!! Form::close() !!}
           </div>
        @endif
        <div class="line fix-line"></div>
        <a href="{!! url('/') !!}"
            class="button button-small button-3d header-button">
            {{ trans('frontend.back') }}
        </a>
    </div>
    <div class="ifo-img">
        <div class="text-success"><h3>{{ $product->name }}</h3></div>
        <div class="product-price"><ins>${{ $product->price }}</ins></div>
        <div class="line fix-line"></div>
        {!! Form::open([
            'method' => 'GET',
            'route' => [
                'shopping',
                $product->id,
                ],
            'enctype' => 'multipart/form-data',
            'class' => 'cart nobottommargin clearfix',
            ]) !!}
            <div class="quantity clearfix">
                {!! Form::button('-', [
                    'class' => 'minus',
                    'id' => $product->id,
                    ])
                !!}
                {!! Form::text('quantity', 1, [
                    'class' => 'qty',
                    'id' => $product->id,
                    'step' => 1,
                    'min'  => 1,
                    'title' => 'Qty',
                    'size' => 4,
                    ])
                !!}
                {!! Form::button('+', [
                    'class' => 'plus',
                    'id' => $product->id,
                    ])
                !!}
            </div>
            {!! Form::button(@trans('frontend.add-cart'), [
                'class' => 'add-to-cart button nomargin',
                'type' => 'submit',
                ])
            !!}
        {!! Form::close() !!}
        <div class="clear"></div>
        <div class="line fix-line"></div>
        <p>
            {{ $product->description }}
        </p>
        <div class="panel panel-default product-meta">
            <div class="panel-body">
                <span class="posted_in">
                    {{ trans('frontend.category') }}: <a href="#" rel="tag">Dress</a>.
                </span>
                <span class="tagged_as">
                    {{ trans('frontend.tag') }}: <a href="#" rel="tag">Pink</a>,
                    <a href="#" rel="tag">Short</a>,
                    <a href="#" rel="tag">Dress</a>,
                    <a href="#" rel="tag">Printed</a>.
                </span>
            </div>
        </div>
        @if (auth()->check())
        {!! Form::open() !!}
        <div class="urlcomment" data-route="{{ url('comment') }}"></div>
        {!! Form::hidden('user_id', Auth::user()->id, [
            'id' => 'user_id',
        ]) !!}
        {!! Form::hidden('product_id', $product["id"], [
            'id' => 'product_id',
        ]) !!}
        {!! Form::textarea('content', null, [
            'class' => 'form-control fix-comment',
            'id' => "comment1",
            'placeholder' => trans('frontend.type-comment'),
            'cols' => '50',
            'rows' => '3',
        ]) !!}
        {!! Form::close() !!}
        @endif

        <div class="line fix-line"></div>
        @include('user.comment.comment')
    </div>
</div>
@endsection()
