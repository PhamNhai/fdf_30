@extends('frontend.master')
@section('content')
<div class="bottommargin">
    {{ Form::open([
        'route' => 'order',
        'method' => 'post',
    ]) }}
    <table class="table cart">
        <thead>
            <tr>
                <th class="fa fa-trash-o" aria-hidden="true">&nbsp;</th>
                <th class="cart-product-thumbnail">&nbsp;</th>
                <th class="cart-product-name">{{ trans('frontend.product') }}</th>
                <th class="cart-product-price">{{ trans('frontend.price') }}</th>
                <th class="cart-product-quantity">{{ trans('frontend.quantity') }}</th>
                <th class="cart-product-subtotal">{{ trans('frontend.total') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contents as $content)
            <tr class="cart_item">
                <td>
                    <a href="{{ route('remove-product', $content->id) }}" class="remove" title="Remove this item">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="cart-product-thumbnail">
                    <a href="#">
                    {{ Html::image(config('app.image_path') . '/' . $content['attributes']['image']) }}
                    </a>
                </td>
                <td class="cart-product-name">
                    <a href="#">{{ $content->name }}</a>
                </td>
                <td class="cart-product-price">
                    <span class="amount">$ {{ $content->price }}</span>
                </td>
                <td class="cart-product-quantity">
                    <div class="quantity clearfix">
                    {!! Form::button('-', [
                        'class' => 'minus',
                        ]) !!}
                    {!! Form::text('quantity', $content->quantity, [
                        'class' => 'qty',
                        'step' => 1,
                        'min'  => 1,
                        'title' => 'Qty',
                        'size' => 4,
                    ]) !!}
                    {!! Form::button('+', [
                        'class' => 'plus',
                        ]) !!}
                    </div>
                </td>
                <td class="cart-product-subtotal">
                    <span class="amount">$ {!! $content->price * $content->quantity !!}</span>
                </td>
            </tr>
            @endforeach()
            <tr class="cart_item">
                <td colspan="6">
                    <div class="row clearfix">
                        <div class="col-md-4 col-xs-4 nopadding">
                            <table>
                                <tr>
                                    <td>{{ trans('frontend.total-money') }}:</td>
                                    <td>$ {{ $subTotal }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8 col-xs-8 nopadding">
                            {!! Form::button(trans('frontend.pay'), [
                                'class' => 'button button-3d notopmargin fright',
                                'id' => 'show-cart-deltais',
                                'type' => 'submit',
                            ]) !!}
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    {{ Form::close() }}
</div>
<a href="{!! url('/') !!}" class="button button-small button-3d header-button">
    {{ trans('frontend.back') }}
</a>
@endsection()
