{!! Form::open([
    'action' => ['Admin\OrderController@update', $order['id']],
    'method' => 'PUT',
    ])
!!}
@if ($order->status)
    {!! Form::button(@trans('order.waitting'), [
        'class' => 'btn btn-success btn-sm btn3d',
        'type' => 'submit',
        ])
    !!}
@else
    {!! Form::button(@trans('order.resolved'), [
        'class' => 'btn btn-danger btn-sm btn3d',
        'type' => 'submit',
        ])
    !!}
@endif
{{ Form::close() }}
