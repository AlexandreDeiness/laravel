<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $comments = Comment::paginate(5);

        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


//        $this->validate($request, [
//            'title' => 'required',
//            'content' => 'required'
//        ],
//            [
//                'content.required' => 'Content obligatoire'
//            ]);
//
//        Comment::create([
//            'user_id' => Auth::user()->id,
//            'title' => $request->title,
//            'content' => $request->content
//        ]);
//
//        return redirect()->route('comment.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $comment = Comment::find($id);
//
//        if(!$comment) {
//            return redirect()->route('comment.index');
//        }
//
//        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        if(!$comment) {
            return redirect()->route('comment.index');
        }

        return view('comments.edit', compact('comment'));
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ],
            [
                'content.required' => 'Content obligatoire'
            ]);

        $comment = Comment::find($id);

        $comment->title = $request->title;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('comment.show', [$comment->id])->with('success', 'Commentaire updaté');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->route('comment.index')->with('success', 'Commentaire supprimé');

    }
}
