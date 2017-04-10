<a href="{{ action('Admin\ProductController@updateStatus', $item->id) }}">
@if ($item->status)
    {!! Form::button(@trans('admin.enable'), [
        'class' => 'btn btn-success btn-sm btn3d',
        'type' => 'submit',
        ])
    !!}
@else
    {!! Form::button(@trans('admin.unable'), [
        'class' => 'btn btn-danger btn-sm btn3d',
        'type' => 'submit',
        ])
    !!}
@endif
</a>
