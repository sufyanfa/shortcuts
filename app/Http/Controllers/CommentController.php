<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Shortcut;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'shortcut_id' => ['required', 'integer'],
            'comment' => ['required', 'string', 'max:255'],
        ]);

        $shortcut = Shortcut::findOrFail($request->shortcut_id);

        $user_id = auth()->user()->id;

        $shortcut->comments()->create(
            [
                'user_id' => $user_id,
                'comment' => $data['comment'],
            ]
        );

        return back()->with('success', 'تم إضافة التعليق !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment == null)
        {
            abort(404);
        }
        //$this->authorize('update', $shortcut);
        $data = request()->validate([
            'comment'  => ['required', 'string'],
        ]);

        $comment->update([
            'comment' => $data['comment'],
        ]);

        return redirect('/shortcuts/'.$comment->shortcut_id)->with('success', 'تم تعديل التعليق !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment == null)
        {
            abort(404);
        }
        //$this->authorize('update', $comment);
        $comment->delete();
        return redirect('/shortcuts/'.$comment->shortcut_id)->with('warning', 'تم حذف التعليق !');
    }
}
