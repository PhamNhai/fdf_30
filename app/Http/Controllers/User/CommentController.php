<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->only('user_id', 'product_id', 'content');
            try {
            $comment = Comment::create($input);
            $result = [
                'success' => true,
                'content' => $input['content'],
                'user' => auth()->user()->name,
                'created_at' => $comment->created_at->diffForHumans(),
                'avatarPath' => isset(auth()->user()->avatar) ? auth()->user()->getAvatarPath() : asset(config('app.avatar_default_path')),
                'commentId' => $comment->id,
                'deleteUrl' => route('comment.delete', $comment->id),
            ];
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'message' => trans('label.comment_fail'),
                ];
                return response()->json($result);
            }
            return response()->json($result);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Comment::findOrFail($id)->delete();

            return redirect()->back()
                ->with('success', trans('frontend.delete-comment-successfully'));
        } catch (Exception $e) {
            return redirect()->back()
                ->with('errors', trans('frontend.delete-comment-fail'));
        }
    }

    public function updateComment(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->only('id', 'content');
            try {
            $comment = Comment::findOrFail($input['id']);
            $comment->content = $input['content'];
            $comment->save();
            $result = [
                'success' => true,
                'content' => $comment->content,
                'user' => auth()->user()->name,
                'created_at' => $comment->created_at->diffForHumans(),
                'avatarPath' => isset(auth()->user()->avatar) ? auth()->user()->getAvatarPath() : asset(config('app.avatar_default_path')),
                'commentId' => $comment->id,
                'deleteUrl' => route('comment.delete', $comment->id),
            ];
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'message' => trans('label.edit_comment_fail'),
                ];
                return response()->json($result);
            }
            return response()->json($result);
        }
        return redirect()->back();
    }
}
