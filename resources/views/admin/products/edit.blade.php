@extends('admin.master')
@section('content')
@section('item')
    {!! Html::style('admin/item.css') !!}
@endsection()
<div class="col-lg-12">
    <h1 class="page-header">@lang('admin.product')
        <small>@lang('admin.edit')</small>
    </h1>
</div>
<div class="col-lg-7 form-item">
    {!! Form::open([
        'method' => 'PATCH',
        'action' => [
            'Admin\ProductController@update',
            $product['id'],
            ],
        'enctype' => 'multipart/form-data',
        ]) !!}
        @if (isset($product))
            {{ Form::hidden('id', $product['id']) }}
        @endif
        <div class="form-group">
            <label>@lang('admin.name')</label>
            {!! Form::text ('name', old('name',
                isset($product) ? $product['name'] :null), [
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
            @if (isset($product))
                {!! Form::select('category',
                    $categories,
                    $product->category_id
                    ,[
                        'class'=>'form-control',
                    ]) !!}
            @else
                {!! Form::select('category',
                $category,
                null,[
                    'class'=>'form-control',
                    ]) !!}
            @endif
        </div>
        <div class="form-group">
            <label>@lang('admin.price')</label>
            {!! Form::number('price', old('price',
                isset($product) ? $product['price'] :null), [
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
            {{ Form::textarea('description', old('description',
                isset($product) ? $product['description'] :null), [
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
            {!! Form::number ('quantity', old('quantity',
                isset($product) ? $product['quantity'] :null), [
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
            @if (isset($product))
                {{ Form::hidden('current_img', $product['image']) }}
            @endif
        </div>
        <div class="form-group">
            <label>
                {!! Form::radio('status', 1,
                    $product['status'] == 1 ? true : null,
                    [
                    'class' => 'radio-inline',
                    ]) !!}
                    @lang('admin.enable')
                {!! Form::radio('status', 0, 
                    $product['status'] == 0 ? true : null,
                    [
                    'class' => 'radio-inline',
                    ]) !!}
                    @lang('admin.unable')
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
