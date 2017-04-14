@extends('admin.master')

@section('item')
    {!! Html::style('admin/tam/order.css') !!}
@endsection()
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-heading">
                <h2>{{ trans('order.list-order') }}</h2>
            </div>
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
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>{{ trans('order.user') }}</span></th>
                                <th><span>{{ trans('order.date') }}</span></th>
                                <th class="text-center"><span>{{ trans('order.status') }}</span></th>
                                <th><span>{{ trans('order.ship-address') }}</span></th>
                                <th><span>{{ trans('order.price') }}</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <img src={{ asset($order->user->avatar) }} alt="">
                                        <a href="#" class="user-link">{{ $order->user->name }}</a>
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td class="text-center">
                                        @include('admin.order.status')
                                    </td>
                                    <td>
                                        <span class='text-primary'>{{ $order->ship_address }}</span>
                                    </td>
                                    <td>{{ $order->price . trans('order.dola')}}</td>
                                    <td><a href="{{ action('Admin\OrderController@show', $order->id) }}" class="btn btn-block btn-primary btn-xs">{{ trans('order.show-order') }}</a>
                                    <td>
                                        {!! Form::open([
                                            'action' => ['Admin\OrderController@destroy', $order['id']],
                                            'method' => 'delete',
                                            ])
                                        !!}
                                        {!! Form::button(@trans('order.delete'), [
                                            'class' => 'btn btn-block btn-danger btn-xs delete-button',
                                            'type' => 'submit',
                                            ])
                                        !!}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">{{ $orders->links() }}</div>
@endsection()
