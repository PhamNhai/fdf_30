@extends('admin.master')
@section('content')
@section('item')
    {!! Html::style('admin/item.css') !!}
@endsection()
<div class="col-lg-12">
    <h1 class="page-header">@lang('admin.product')
        <small>@lang('admin.add')</small>
    </h1>
</div>
<div class="col-lg-7 form-item">
    {!! Form::open([
        'method' => 'POST',
        'action' => ['Admin\ProductController@store'],
        'enctype' => 'multipart/form-data',
        ])
    !!}
        <div class="form-group">
            <label>@lang('admin.name')</label>
            {!! Form::text ('name', old('name'), [
                'class' => 'form-control',
                'placeholder' => @trans('admin.enter-name'),
                ]) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="cate">@lang('admin.category')</label>
            {!! Form::select('category_id',
                $category,
                null, [
                    'class' => 'form-control'
                ]) !!}
        </div>
        <div class="form-group">
            <label>@lang('admin.price')</label>
            {!! Form::number('price', old('price'), [
                'class' => 'form-control',
                'placeholder' => @trans('admin.enter-price'),
                ]) !!}
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>@lang('admin.description')</label>
            {{ Form::textarea('description', null, [
                'class' => 'form-control',
                'rows' => 3,
                ]) }}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>@lang('admin.quantity')</label>
            {!! Form::number ('quantity', old('quantity'), [
                'class' => 'form-control',
                'placeholder' => @trans('admin.quantity'),
                ]) !!}
            @if ($errors->has('quantity'))
                <span class="help-block">
                    <strong>{{ $errors->first('quantity') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>@lang('admin.image')</label>
            {!! Form::file('image', [
                'class' => 'form-control',
                ]) !!}
        </div>
        <div class="form-group">
            <label>
                {!! Form::radio('status', 0, [
                    'class' => 'radio-inline',
                    ]) !!} 
                    @lang('admin.unable')
                {!! Form::radio('status', 1, [
                    'class' => 'radio-inline',
                    ]) !!}
                    @lang('admin.enable')
            </label>
        </div>
        {!! Form::button(@trans('admin.add-product'), [
            'class' => 'btn btn-default',
            'type' => 'submit',
            ]) !!}
        {!! Form::button(@trans('admin.reset'), [
            'class' => 'btn btn-default',
            'type' => 'reset',
            ]) !!}
    {!! Form::close() !!}
</div>
@endsection()
