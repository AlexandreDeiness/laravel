<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ],
        [
           'content.required' => 'Content obligatoire'
        ]);

        Article::create([
           'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('article.index');

        $user = new image;

        $user->title = Input::get('name');
        if(Input::hasFile('image')){
            $file=Input::file('image');
            $file->move(public_path().'/', $file->getClientOriginalName());

            $user->name = $file->getClientOriginalName();
            $user->size = $file->getClientsize();
            $user->type = $file->getClientMimeType();
        }

        $user->save();

        return redirect('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect()->route('article.index');
        }

        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect()->route('article.index');
        }

        return view('articles.edit', compact('article'));
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

        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('article.show', [$article->id])->with('success', 'Article modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article supprimé');

    }
}
