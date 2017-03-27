@extends('layouts.app')

@section('content')
<div class="container">
     @if (Session::has('flash_message'))
        <div class="alert alert-warning !!}">
            {!! Session::get('flash_message') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            {!! Form::open([
                'route' => 'login',
                'method' => 'POST',
                'role' => 'form',
                ])
            !!}
                <fieldset>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <h2>@lang('admin.please-login')</h2>
                        <hr class="colorgraph">
                        <div class="form-group">
                            {!! Form::text ('email', old('email'), [
                                'class' => 'form-control input-lg',
                                'placeholder' => @trans('admin.email-address'),
                                'type' => 'email',
                                'id' => 'email',
                                ])
                            !!}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::password ('password', [
                                'class' => 'form-control input-lg',
                                'placeholder' => @trans('admin.password'),
                                'type' => 'password',
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
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            {!! Form::button(@trans('admin.sign-in'), [
                                'class' => 'btn btn-lg btn-success btn-block',
                                'type' => 'submit',
                                ])
                            !!}
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="{{ route('register') }}" class="btn btn-lg btn-primary
                                btn-block">
                                @lang('admin.register')
                            </a>
                        </div>
                    </div>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        @lang('admin.forgot-password-?')
                    </a>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
