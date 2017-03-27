@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('admin.register')</div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => 'register',
                        'method' => 'POST',
                        'role' => 'form',
                        'class' => 'form-horizontal',
                        ])
                    !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">
                            @lang('admin.user-name')
                        </label>

                        <div class="col-md-6">
                            {!! Form::text ('name', old('name'), [
                                'class' => 'form-control',
                                'id' => 'name',
                                ])
                            !!}
            
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">
                            @lang('admin.email-address')
                        </label>

                        <div class="col-md-6">
                            {!! Form::text ('email', old('email'), [
                                'class' => 'form-control',
                                'id' => 'email',
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
                            {!! Form::password ('password', [
                                'class' => 'form-control',
                                'id' => 'password',
                                ])
                            !!}

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">
                            @lang('admin.confirm-password')
                        </label>

                        <div class="col-md-6">
                             {!! Form::password ('password_confirmation', [
                                'class' => 'form-control',
                                'id' => 'password_confirmation',
                                'type' => 'password',
                                ])
                            !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : ''
                        }}">
                        <label for="address" class="col-md-4 control-label">
                            @lang('admin.address')
                        </label>

                        <div class="col-md-6">
                            {!! Form::text ('address', old('address'), [
                                'class' => 'form-control',
                                'id' => 'address',
                                ])
                            !!}
    
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('phone') ? ' has-error' : ''
                        }}">
                        <label for="phone" class="col-md-4 control-label">
                            @lang('admin.phone')</label>

                        <div class="col-md-6">
                            {!! Form::text ('phone', old('phone'), [
                                'class' => 'form-control',
                                'id' => 'phone',
                                ])
                            !!}

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::button(@trans('admin.register'), [
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
