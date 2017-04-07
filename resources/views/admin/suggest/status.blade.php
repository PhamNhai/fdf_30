{!! Form::open([
    'action' => ['Admin\SuggestController@update', $suggest['id']],
    'method' => 'PUT',
    ])
!!}
@if ($suggest->status)
    {!! Form::button(@trans('suggest.accept'), [
        'class' => 'btn btn-success',
        'type' => 'submit',
        ])
    !!}
@else
    {!! Form::button(@trans('suggest.waitting'), [
        'class' => 'btn btn-warning',
        'type' => 'submit',
        ])
    !!}
@endif
{{ Form::close() }}
