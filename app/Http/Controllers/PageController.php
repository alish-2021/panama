<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Blog;

class PageController extends Controller
{
    public function indexPage(){
        return view('page.index');
    }
    public function articlePage(){
        $articles = Article::simplePaginate(10);
        return view('page.article', compact('articles'));
    }
    public function blogIndexPage(){
        $blogs = Blog::simplePaginate(10);
        return view('page.blog.index', compact('blogs'));
    }
    public function blogShowPage($id){
        $blog = Blog::find($id);
        if(!$blog){
            return abort(404);
        }

        return view('page.blog.show', compact( 'blog'));
    }
}
