@extends('frontend.master')
@section('content')
{!! @Form::open([
    'route' => 'post.suggest',
    'method' => 'POST'
]) !!}
<div class="col_full">
    <textarea class="fix-suggest" name="suggest" cols="50" rows="10"
        placeholder=" {{ trans('frontend.type-suggest') }} "></textarea>
</div>
{!! Form::hidden('id_user', Auth::id()) !!}
{!! Form::button(@trans('frontend.send'), [
    'class' => 'btn btn-lg btn-success btn-block',
    'type' => 'submit',
    ])
!!}
{!! @Form::close() !!}
@endsection()
