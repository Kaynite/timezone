<?php

namespace App\Http\Controllers;

use App\DataTables\CommentsDatatable;
use App\Models\Comment;
use App\Http\Requests\PostCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentsDatatable $datatable)
    {
        return $datatable->render('adminlte.comments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCommentRequest $request)
    {
        Comment::create($request->all());
        return back()->with('success', 'Comment was added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'An error occured while deleting']);
        }
        return redirect()->route('comments.index')
            ->with('success', __('admin.comments.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('comments')) {
            return back()->withErrors(['message' => __('admin.comments.form.no selection')]);
        }

        Comment::destroy($request->comments);

        return redirect()->route('comments.index')
            ->with('success', __('admin.comments.form.success multiple delete'));
    }
}
