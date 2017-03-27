@extends('admin.master')

@section('item')
    {!! Html::style('admin/item.css') !!}
@endsection()
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="box-title">
                        <p class="text-right additem">
                            <a href="{{ action('Admin\ProductController@create') }}"
                               class="btn btn-block btn-primary btn-sm">
                                @lang('admin.add-product')
                            </a>
                        </p>
                    </h3>
                    <br>
                </div>
                <h3 class="box-title">
                <div class="sidebar-search">
                    {!! Form::open() !!}
                        <div class="input-group custom-search-form fix-form-search-item">
                            {!! Form::text ('search', null, [
                                'class' => 'form-control',
                                'placeholder' => 'search',
                                ]) !!}
                            <span class="input-group-btn">
                            {!! Form::button('<i class="fa fa-search"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-default',
                                ]) !!}
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
                </h3>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered fixtable">
                <tr>
                    <th>@lang('admin.stt')</th>
                    <th>@lang('admin.name')</th>
                    <th>@lang('admin.category')</th>
                    <th>@lang('admin.description')</th>
                    <th>@lang('admin.image')</th>
                    <th>@lang('admin.quantity')</th>
                    <th>@lang('admin.rate')</th>
                    <th>@lang('admin.price')</th>
                    <th>@lang('admin.comment')</th>
                    <th>@lang('admin.rate')</th>
                    <th>@lang('admin.status')</th>
                    <th>@lang('admin.action')</th>
                </tr>
                    @foreach ($product as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        {{ $item->category->name }}
                    </td>
                    <td>{{ $item->description }}</td>
                    <td>
                        {{ HTML::image(config('app.image_path') . '/' . $item->image,
                            @trans('admin.this-is-image-product'),
                            [
                                'class' => 'img_item',
                            ]) }}
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->rate }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->sum_comment }}</td>
                    <td>{{ $item->sum_rate }}</td>
                    <td>
                        @if ($item->status === 0)
                            @lang('admin.unable')
                        @else
                            @lang('admin.enable')
                        @endif
                    </td>
                    <td>
                        <a href="{{ action('Admin\ProductController@edit', $item->id) }}"
                            class="btn btn-block btn-primary btn-xs">
                            @lang('admin.edit')
                        </a>
                        {!! Form::open([
                            'action' => [
                                'Admin\ProductController@destroy',
                                $item->id,
                                ],
                            'method' => 'delete',
                            'class' => 'fixform',
                            ]) !!}

                        {!! Form::button(@trans('admin.delete'), [
                            'class' => 'btn btn-block btn-danger btn-xs
                                delete-button',
                            'type' => 'submit',
                            ]) !!}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">{{isset($product) ?  $product->links() : '' }}</div>
    </div>
@endsection()
