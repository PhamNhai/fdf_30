@extends('frontend.master')
@section('content')
<div class="bottommargin">
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
            <tr class="cart_item">
                <td>
                    <a href="#" class="remove" title="Remove this item">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="cart-product-thumbnail">
                    <a href="#"><img width="64" height="64"
                        src="images/shop/thumbs/small/dress-3.jpg"
                        alt="Pink Printed Dress">
                    </a>
                </td>
                <td class="cart-product-name">
                    <a href="#">Pink Printed Dress</a>
                </td>
                <td class="cart-product-price">
                    <span class="amount">$19.99</span>
                </td>
                <td class="cart-product-quantity">
                    <div class="quantity clearfix">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="2" class="qty"/>
                        <input type="button" value="+" class="plus">
                    </div>
                </td>
                <td class="cart-product-subtotal">
                    <span class="amount">$39.98</span>
                </td>
            </tr>
            <tr class="cart_item">
                <td colspan="6">
                    <div class="row clearfix">
                        <div class="col-md-4 col-xs-4 nopadding">
                            <table>
                                <tr>
                                    <td>{{ trans('frontend.total-money') }}:</td>
                                    <td>$99</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8 col-xs-8 nopadding">
                            <a href="#" id="show-cart-deltais"
                                class="button button-3d notopmargin fright">
                                {{ trans('frontend.pay') }}
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<a href="{!! url('/') !!}" class="button button-small button-3d header-button">
    {{ trans('frontend.back') }}
</a>
<div class="line fix-line"></div>
<div class="table-responsive" id="my-cart">
    <h4>{{ trans('frontend.cart-total') }}</h4>

    <table class="table cart">
        <tbody>
            <tr class="cart_item">
                <td class="cart-product-name">
                    <strong>{{ trans('frontend.total-money-product') }}</strong>
                </td>

                <td class="cart-product-name">
                    <span class="amount">$106.94</span>
                </td>
            </tr>
            <tr class="cart_item">
                <td class="cart-product-name">
                    <strong>{{ trans('frontend.shipping') }}</strong>
                </td>

                <td class="cart-product-name">
                    <span class="amount">Free Delivery</span>
                </td>
            </tr>
            <tr class="cart_item">
                <td class="cart-product-name">
                    <strong>{{ trans('frontend.total-money') }}</strong>
                </td>

                <td class="cart-product-name">
                    <span class="amount color lead"><strong>$106.94</strong></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection()
