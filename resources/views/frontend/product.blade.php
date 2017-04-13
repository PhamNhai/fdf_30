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
@if (isset($productCategory))
    <div class="form-group" id="filter">
    {!! Form::open([
            'method' => 'GET',
            'route' => 'product-filter-category',
            'class' => 'form-filter',
        ]) !!}

        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}
        {!! Form::hidden('categoryId', $categoryId) !!}
        {!! Form::button(@trans('frontend.filter'),[
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($productCategory as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true">
                        </i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span>{{ trans('frontend.quik-view') }}</span>
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
    @endforeach
@elseif (isset($product))
    <div class="form-group" id="filter">
        {!! Form::open([
                'method' => 'GET',
                'route' => 'product-filter',
                'class' => 'form-filter',
            ]) !!}

        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}

        {!! Form::button(@trans('frontend.filter'), [
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($product as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true">
                        </i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
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
    @endforeach
@elseif (isset($productByPrice))
    <div class="form-group" id="filter">
        {!! Form::open([
                'method' => 'GET',
                'route' => 'product-filter',
                'class' => 'form-filter',
            ]) !!}

        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}

        {!! Form::button(@trans('frontend.filter'), [
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($productByPrice as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
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
    @endforeach
@elseif (isset($productByDate))
    <div class="form-group" id="filter">
        {!! Form::open([
                'method' => 'GET',
                'route' => 'product-filter',
                'class' => 'form-filter',
            ]) !!}
        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}

        {!! Form::button(@trans('frontend.filter'), [
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($productByDate as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
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
    @endforeach
@elseif (isset($productCategoryByPrice))
    <div class="form-group" id="filter">
        {!! Form::open([
                'method' => 'GET',
                'route' => 'product-filter-category',
                'class' => 'form-filter',
            ]) !!}

        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}
        {!! Form::hidden('categoryId', $categoryId) !!}

        {!! Form::button(@trans('frontend.filter'), [
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($productCategoryByPrice as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
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
    @endforeach
@elseif (isset($productCategoryByNew))
    <div class="form-group" id="filter">
        {!! Form::open([
                'method' => 'GET',
                'route' => 'product-filter-category',
                'class' => 'form-filter',
            ]) !!}
        {!! Form::select('filter', [
                'pr' => trans('frontend.fitter-price'),
                'new' => trans('frontend.fitter-new'),
            ],
        null, [
                'class' => 'form-control',
                'id' => 'pref-orderby',
            ]) !!}
        {!! Form::hidden('categoryId', $categoryId) !!}
        {!! Form::button(@trans('frontend.filter'), [
                'class' => 'btn btn-default fix-filter',
                'type' => 'submit',
            ]) !!}

        {!! Form::close() !!}
    </div>
    @foreach ($productCategoryByNew as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
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
    @endforeach
@elseif (isset($productSearch))
    <p>{{ @trans('frontend.product-relationship').''.'"'.$req.'"'}}</p>
    @foreach ($productSearch as $item)
        <div class="product clearfix pf-dress">
            <div class="product-image fix-img">
                <a href="#">{{ Html::image(config('app.image_path') . '/' . $item->image) }}</a>
                <div class="sale-flash">{{ trans('frontend.sale') }}</div>
                <div class="product-overlay">
                    <a href="{{ route('shopping', $item->id) }}" class="add-to-cart">
                        <i class="fa fa-cart-plus"
                            aria-hidden="true"></i><span>{{ trans('frontend.add-cart') }}</span>
                    </a>
                    <a href="{{ route('frontend.product-deltais', $item->id) }}" class="item-quick-view"
                        data-lightbox="ajax">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span>{{ trans('frontend.quik-view') }}</span>
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
    @endforeach
@endif
@endsection
