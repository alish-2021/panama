<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{
    public function indexPage(){
        return view('page.index');
    }
    public function articlePage(){
        $articles = Article::simplePaginate(1);
        return view('page.article', compact('articles'));
    }
}
