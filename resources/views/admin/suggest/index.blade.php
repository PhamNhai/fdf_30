@extends('admin.master')

@section('item')
    {!! Html::style('admin/tam/order.css') !!}
@endsection()
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-heading">
                <h2>{{ trans('suggest.list-suggest') }}</h2>
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
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th><span>{{ trans('suggest.user') }}</span></th>
                                    <th><span>{{ trans('suggest.date') }}</span></th>
                                    <th class="text-center"><span>{{ trans('suggest.status') }}</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suggests as $suggest)
                                <tr>
                                    <td>
                                        <img src={{ $suggest->user->avatar }} alt="">
                                        <a href="#" class="user-link">{{ $suggest->user->name }}</a>
                                    </td>
                                    <td>{{ $suggest->created_at }}</td>
                                    <td class="text-center">
                                        @include('admin.suggest.status')
                                    </td>
                                    <td><a data-toggle="collapse" href="#content{{ $suggest->id }}">{{ trans('suggest.show-content') }}</a>
                                    <td>
                                        {!! Form::open([
                                            'action' => ['Admin\SuggestController@destroy', $suggest['id']],
                                            'method' => 'delete',
                                            ])
                                        !!}
                                        {!! Form::button(trans('suggest.delete'), [
                                            'class' => 'btn btn-block btn-danger btn-xs delete-button',
                                            'type' => 'submit',
                                            ])
                                        !!}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                <tr>
                                <td colspan="5"><div id="content{{ $suggest->id }}" class="panel-collapse collapse">
                                    <div class="panel-body text-primary"><h4>{{ trans('suggest.content') }}</h4></div>
                                    <div class="panel-footer">{{ $suggest->content }}</div>
                                </div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">{{ $suggests->links() }}</div>
@endsection()
