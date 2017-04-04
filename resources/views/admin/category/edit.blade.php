@extends('admin.master')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('category.category') }}
        <small>{{ trans('category.update') }}</small>
    </h1>
</div>
<div class="col-lg-7 form-item">
    {!! Form::open([
        'method' => 'PUT',
        'action' => ['Admin\CategoryController@update', $category['id']],
        'enctype' => 'multipart/form-data',
        ])
    !!}
        <div class="form-group">
            <label>{{ trans('category.name') }}</label>
            {!! Form::text ('name', old('name',
                isset($category) ? $category['name'] :null), [
                'class' => 'form-control',
                ])
            !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="cate">{{ trans('category.type') }}</label>
                {!! Form::select('type_id', $typeId, null, [
                    'class' => 'form-control'
                    ])
                !!}
        </div>
        {!! Form::button(@trans('category.update-category'), [
            'class' => 'btn btn-default',
            'type' => 'submit',
            ]) !!}

        {!! Form::button(@trans('category.reset'), [
            'class' => 'btn btn-default',
            'type' => 'reset',
            ]) !!}
    {!! Form::close() !!}
@endsection()
