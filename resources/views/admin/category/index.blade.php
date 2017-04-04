@extends('admin.master')

@section('content')
    <div class="col-lg-10">
        <div class="row" id="content">
            <div class="col-lg-10 col-lg-offset-1 panel panel-primary">
                <div class="panel-heading">
                    <h2>{{ trans('category.list-category') }}</h2>
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary pull-left" href="{!! action('Admin\CategoryController@create') !!}"><i class="fa fa-plus"></i>{{ trans('category.add-category') }}</a>
                    <div class="panel-body">
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
                        <div class="box box-primary">
                            <div class="box-body">
                                <table class="table table-responsive" id="users-table">
                                    <thead>
                                        <th>{{ trans('category.id') }}</th>
                                        <th>{{ trans('category.name') }}</th>
                                        <th>{{ trans('category.type') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->typeCategory->name }}</td>
                                                <td><a href="{{ action('Admin\CategoryController@edit', $category->id) }}"
                                                class="btn btn-block btn-primary btn-xs">{{ trans('category.edit') }}</a>
                                                </td>
                                                <td>
                                                {!! Form::open([
                                                    'action' => ['Admin\CategoryController@destroy', $category['id']],
                                                    'method' => 'delete',
                                                    ])
                                                !!}
                                                {!! Form::button(@trans('category.delete'), [
                                                    'class' => 'btn btn-block btn-danger btn-xs delete-button',
                                                    'type' => 'submit',
                                                    ])
                                                !!}
                                                {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">{{ $categories->links() }}</div>
@endsection()
