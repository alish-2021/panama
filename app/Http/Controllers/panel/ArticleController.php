<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('panel.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  ['required', 'max:100'],
            'desc' =>  ['required', 'min:10'],
            'preview_img' => ['required', 'mimes:svg,png,jpg,jpeg|max:10000']
        ]);
        if(!$request){
            return redirect()->route('article.create')->withErrors($data);
        }

        $path_preview = $request->file('preview_img')->store('upload', 'public');

        Article::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'preview_img' => $path_preview,
        ]);
        return redirect()->route('article.index')->withSuccess('Успешно добален !!!');
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
        $article = Article::findOrFail($id);
        return view('panel.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required', 'max:100'] ,
            'desc' => ['required', 'min:100'],
            'preview_img' => ['required', 'mimes:svg,png,jpg,jpeg|max:10000'],
        ]);

        if(!$request){
            return redirect()->route('article.edit')->withErrors($data);
        }

        $path_preview = $request->file('preview_img')->store('upload', 'public');
        $article->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'preview_img' => $path_preview,
        ]);
        return redirect()->route('article.index')->withSuccess('Успешно обновлен !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->withSuccess('Успешно удален !!!');
    }
}
