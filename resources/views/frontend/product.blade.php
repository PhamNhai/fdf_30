@extends('frontend.master')

@section('item')
    {!! Html::style('http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css') !!}
    {!! Html::style('admin/tam/rate/css/star-rating.css') !!}
    {!! Html::style('admin/tam/rate/themes/krajee-svg/theme.css') !!}
    {!! Html::style('admin/tam/rate.css') !!}
@endsection()

@section('script')
    {!! Html::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js') !!}
    {!! Html::script('admin/tam/rate/js/star-rating.js') !!}
    {!! Html::script('admin/tam/rate/themes/krajee-svg/theme.js') !!}
    {!! Html::script('admin/tam/rate/js/locales/{lang}.js') !!}
    {!! Html::script('admin/tam/rate/rate.js') !!}
@endsection()

@section('content')
@foreach($product as $item)
<div class="product clearfix pf-dress">
    <div class="product-image fix-img">
        <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
        <div class="sale-flash">{{ trans('frontend.sale') }}</div>
        <div class="product-overlay">
            <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                <i class="fa fa-cart-plus"
                    aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
            </a>
            <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view" data-lightbox="ajax">
                <i class="fa fa-eye" aria-hidden="true"></i><span>{{ trans('frontend.quik-view') }}</span>
            </a>
        </div>
    </div>
    <div class="product-desc">
        <div class="product-title"><h3><a href="#">{{ $item->name }}</a></h3></div>
        <div class="product-price"><ins>${{ $item->price }}</ins></div>
        <div class="product-rating">
            {!! Form::open() !!}
            {!! Form::text('input', $item->rate, [
                'class' => 'input-3 rating-loading',
                'data-size' => "xs",
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endforeach()
@endsection()
