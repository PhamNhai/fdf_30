@extends('frontend.master')
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
            #####
        </div>
    </div>
</div>
@endforeach()
@endsection()
