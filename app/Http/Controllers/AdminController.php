<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::paginate(5);
        return view('admin', ['articles' => $articles]);
    }
}

