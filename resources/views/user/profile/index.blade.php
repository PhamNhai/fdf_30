@extends('frontend.master')

@section('item')
    {!! Html::style('admin/tam/manage-user.css') !!}
@endsection()
@section('content')
    <div class="row bootstrap snippets">
        <div class="col-md-9 col-sm-7">
            <h2>{{ trans('user.profile') }}</h2>
        </div>
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
    <div class="member-entry">
        <a href="{{ action('User\UserController@edit', $user->id) }}" class="member-img">
            {{ HTML::image($user->avatar ?: config('app.avatar_default_path'), trans('user.this-is-avatar'),
                [
                    'class' => 'img-rounded',
                ])
            }}
        </a>
        <div class="member-details">
            <h4>
                <a href="{{ action('User\UserController@edit', $user->id) }}">{{ $user->name }}</a>
            </h4>
            <div class="row info-list">
                <div class="col-lg-4">
                    <i class="fa fa-envelope"></i>
                    <span class="text-primary">{{ $user->email }}</span>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa fa-phone"></i>
                    <span class="text-primary">{{ $user->phone }}</span>
                </div>
                <div class="col-lg-2">
                    <a href="{{ action('User\UserController@edit', $user->id) }}"
                    class="btn btn-block btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>{{ trans('user.edit') }}</a>
                </div>
                <div class="clear"></div>
                <div class="col-lg-4">
                    <i class="fa fa-truck"></i>
                    <span class="text-primary">{{ $user->address }}</span>
                </div>
                <div class="col-lg-6">
                    <span>{{ trans('user.created-at') }}</span>
                    <span class="text-primary">{{ $user->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
