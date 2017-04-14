@extends('admin.master')

@section('item')
    {!! Html::style('admin/tam/manage-user.css') !!}
@endsection()
@section('content')
    <div class="row bootstrap snippets">
        <div class="col-md-9 col-sm-7">
            <h2>{{ trans('user.list-user') }}</h2>
        </div>
        <div class="col-md-3 col-sm-5">
            <form method="get" role="form" class="search-form-full">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" id="search-input" placeholder="Search...">
                    <i class="entypo-search"></i>
                </div>
            </form>
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
    @foreach($users as $user)
        <div class="member-entry">
            <a href="{{ action('Admin\UserController@edit', $user->id) }}" class="member-img">
                {{ HTML::image($user->avatar ? $user->avatar : config('app.avatar_default_path'),
                    @trans('user.this-is-avatar'),
                    [
                        'class' => 'img-rounded',
                    ])
                }}
            </a>
            <div class="member-details">
                <h4><a href="{{ action('Admin\UserController@edit', $user->id) }}">{{ $user->name }}
                    {{ $user->role === 'admin' ? trans('user.admin') : trans('user.user') }}
                </a></h4>
                <div class="row info-list">
                    <div class="col-lg-4">
                        <i class="fa fa-envelope"></i>
                        <span class="text-primary">{{ $user->email }}</span>
                    </div>
                    <div class="col-lg-4">
                        <i class="fa fa fa-phone"></i>
                        <span class="text-primary">{{ $user->phone }}</span>
                    </div>
                    @if ($user->role == 'user')
                        <div class="col-lg-2">
                            <a href="{{ action('Admin\UserController@setAdmin', $user->id) }}"
                            class="btn btn-block btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>{{ trans('user.set-admin') }}</a>
                        </div>
                    @else
                        <div class="col-lg-2"></div>
                    @endif
                    <div class="col-lg-2">
                        <a href="{{ action('Admin\UserController@edit', $user->id) }}"
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
                    <div class="col-lg-2">
                        {!! Form::open([
                            'action' => ['Admin\UserController@destroy', $user['id']],
                            'method' => 'delete',
                            ])
                        !!}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>' . trans('user.delete'), [
                            'class' => 'btn btn-block btn-danger btn-xs delete-button',
                            'type' => 'submit',
                            ])
                        !!}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12">{{ $users->links() }}</div>
@endsection()
