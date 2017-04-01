@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('admin.reset-password')</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     {!! Form::open([
                        'route' => 'password.request',
                        'method' => 'POST',
                        'class' => 'form-horizontal'
                        ])
                    !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('admin.email-address')
                            </label>

                            <div class="col-md-6">
                                {!! Form::text ('email', old('email'), [
                                    'class' => 'form-control',
                                    'placeholder' => @trans('admin.email-address'),
                                    ])
                                !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' :
                            '' }}">
                            <label for="password" class="col-md-4 control-label">
                                @lang('admin.password')
                            </label>
                            <div class="col-md-6">
                                {!! Form::password ('password', null, [
                                    'class' => 'form-control',
                                    'placeholder' => @trans('admin.email-password'),
                                    ])
                                !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? '
                            has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">
                                @lang('admin.confirm-password')</label>
                            <div class="col-md-6">
                                {!! Form::password ('password_confirmation', null, [
                                    'class' => 'form-control',
                                    'placeholder' => @trans('admin.email-password'),
                                    ])
                                !!}

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::button(@trans('admin.reset-password'), [
                                    'class' => 'btn btn-primary',
                                    'type' => 'submit',
                                    ])
                                !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
