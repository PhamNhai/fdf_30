@extends('frontend.master')
@section('content')
<div class="product-item-details">
    <div class="image-details">
        <a href="#">
            {{ Html::image(config('app.image_path') . '/' . '2.jpg') }}
        </a>
        <textarea class="form-control fix-comment" id="comment"
            placeholder="@lang('frontend.type-comment')"></textarea>
    </div>
    <div class="ifo-img">
        <div class="product-price"><ins>$24.99</ins></div>
        <div class="line fix-line"></div>
        {!! Form::open([
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'class' => 'cart nobottommargin clearfix',
            ]) !!}
            <div class="quantity clearfix">
                {!! Form::button('-', [
                    'class' => 'minus',
                    ])
                !!}
                {!! Form::text('quantity', 1, [
                    'class' => 'qty',
                    'step' => 1,
                    'min'  => 1,
                    'title' => 'Qty',
                    'size' => 4,
                    ])
                !!}
                {!! Form::button('+', [
                    'class' => 'plus',
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
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Libero velit id eaque ex quae laboriosam nulla optio doloribus!
        Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>
        <p>Perspiciatis ad eveniet ea quasi debitis quos laborum eum
        reprehenderit eaque explicabo assumenda rem modi.</p>
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
        <div class="line fix-line"></div>
            <div class="feed-back">
                <div>
                    {{ trans('frontend.rate') }}
                </div>
                <div class="m-comment">
                    <img src="{!! asset('icon/widget-comment@2x.png') !!}">
                    <span>6</span>
                </div>
        </div>
        <div class="line fix-line"></div>
        <a href="{!! url('/') !!}"
            class="button button-small button-3d header-button">
            {{ trans('frontend.back') }}
        </a>
    </div>
</div>
@endsection()
