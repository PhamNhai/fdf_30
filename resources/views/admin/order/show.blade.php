@extends('admin.master')

@section('item')
    {!! Html::style('admin/tam/order-show.css') !!}
@endsection()
@section('content')
    <div class="row bootstrap snippets">
        <div class="col-md-9 col-sm-7">
        <table>
        <tr>
            <th><h2>{{ trans('order.order-user')}}</h2></th>
            <td><h2><a href="#">{{ $order->user->name }}</a></h2></td>
        </tr>
        <tr>
            <th>{{ trans('order.ship-address-show') }}</th>
            <td>{{ $order->ship_address }}</td>
        </tr>
        <tr>
            <th>{{ trans('order.total-price-of-order') }}</th>
            <td>{{ $order->price . trans('order.dola') }}
        </tr>
        <tr>
            <th>{{ trans('order.status-show') }}</th>
            <td>@include('admin.order.status')</td>
        </tr>
        </table>
        </div>
    </div>
    @foreach ($orderDetails as $orderDetail)
    <div class="member-entry">
        <a href="#" class="member-img">
            <img src={{ $orderDetail->product->image }} class="img-rounded">
            <i class="fa fa-forward"></i>
        </a>
        <div class="member-details">
            <h4><a href="#">{{ $orderDetail->product->name }}</a></h4>
            <table class="table">
                <thead class="text-primary">
                    <tr>
                    <th><span></span></th>
                    <th><span>{{ trans('order.price-per-product') }}</span></th>
                    <th><span>{{ trans('order.quantity') }}</span></th>
                    <th><span>{{ trans('order.total-price') }}</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>{{ $orderDetail->price / $orderDetail->quantity }}<i class="fa fa-dollar"></i></td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $orderDetail->price }}<i class="fa fa-dollar"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    <a class="btn btn-primary pull-right" href="{!! action('Admin\OrderController@index') !!}">{{ trans('order.back') }}</i></a>
@endsection()
