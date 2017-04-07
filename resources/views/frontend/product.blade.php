@extends('frontend.master')
@section('content')
<div class="product-item">
    <div class="image">
        <a href="#">
            {{ Html::image(config('app.image_path') . '/' . '2.jpg') }}
        </a>
    </div>
    <div class="sale">{{ trans('frontend.sale') }}</div>
    <div class="product-action">
        <a href="#" class="add-to-cart">
            <i class="fa fa-cart-plus"
                aria-hidden="true">
            </i><span> {{ trans('frontend.add-cart') }}</span>
        </a>
        <a href="{!! url('product-deltais') !!}" class="item-quick-view"
            data-lightbox="ajax">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span> {{ trans('frontend.quik-view') }}</span>
        </a>
    </div>
    <div class="desc-product">
        <div class="product-title">
            <h3><a href="#">Checked Short Dress</a></h3>
        </div>
        <div class="product-price"><ins>$12.49</ins></div>
        <div class="product-rating">
            #####
        </div>
    </div>
</div>
@endsection()
