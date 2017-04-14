<div class="row bootstrap snippets">
    <div class="col-md-12 col-md-offset-0 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ trans('frontend.comment') }}
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                        @foreach ($comments as $comment)
                        <li class="media">
                            <a href="#" class="pull-left">
                                {{ HTML::image($comment->user->avatar ?: config('app.avatar_default_path'),
                                    trans('user.this-is-avatar'),
                                    [
                                        'class' => 'img-circle',
                                    ])
                                }}
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                    @if (auth()->check() && (Auth::user()->role == config('app.ad')))
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
                                    @endif
                                </span>
                                <strong class="text-success">{{ $comment->user->name }}</strong>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="col-md-12">{{ $comments->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
