<div class="row bootstrap snippets">
    <div class="col-md-12 col-md-offset-0 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ trans('frontend.comment') }}
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    <div id = "edit-comment-aria"></div>
                    <div id = "comment2"></div>
                        @foreach ($comments as $comment)
                        <div id='location-comment{{ $comment->id }}'>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    {{ HTML::image($comment->user->avatar ?: config('app.avatar_default_path'),
                                        trans('user.this-is-avatar'),
                                        [
                                            'class' => 'img-circle',
                                        ])
                                    }}
                                </a>
                                <span class="text-muted pull-right">
                                    @if (auth()->check() && (Auth::user()->id == $comment->user_id))
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" >
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="" class='edit-comment' id={{ $comment->id }}>{{ trans('admin.edit') }}</a></li>
                                                <li>
                                                <a href="{{ action('User\CommentController@destroy', $comment->id) }}" class="delete-comment">{{ trans('admin.delete') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                        {{-- <a href=""
                                            class="btn btn-block btn-primary btn-xs">
                                            @lang('admin.edit')
                                        </a>
                                        @if (auth()->check() && (Auth::user()->id == $comment->user_id))
                                            {!! Form::open([
                                                'action' => [
                                                    'User\CommentController@destroy',
                                                    $comment->id
                                                    ],
                                                'method' => 'delete',
                                                'class' => 'fixform',
                                            ]) !!}

                                            {!! Form::button(trans('admin.delete'), [
                                                'class' => 'btn btn-block btn-danger btn-xs delete-button',
                                                'type' => 'submit',
                                                ]) !!}
                                            {{ Form::close() }}
                                        @endif --}}
                                </span>
                                <div class="media-body">
                                    <div id='content-comment' data-content-comment = "{{ $comment->content }}"></div>
                                    <strong class="text-success">{{ $comment->user->name }}</strong>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    <p id="content-comment{{ $comment->id }}">{{ $comment->content }}</p>
                                </div>
                            </li>
                        </div>
                        @endforeach
                    </ul>
                    <div class="col-md-12">{{ $comments->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
