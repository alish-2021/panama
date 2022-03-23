<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('panel.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.blog.create');
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
            'title' => ['required', 'max:100'],
            'preview_desc' => ['required', 'min:10'],
            'desc' => ['required', 'min:10'],
            'preview_img' => ['required', 'mimes:svg,jpeg,jpg,png|max:10000'],
            'img' => ['required', 'mimes:svg,jpeg,jpg,png|max:10000'],
        ]);

        if(!$request){
            return redirect()->route('blog.create')->withErrors($data);
        }

        $path_img = $request->file('img')->store('upload', 'public');
        $path_preview_img = $request->file('preview_img')->store('upload', 'public');

        Blog::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'preview_desc' => $request->preview_desc,
            'img' => $path_img,
            'preview_img' => $path_preview_img,
        ]);
        return redirect()->route('blog.index')->withSuccess('Успешно добален !!!');
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
        $blog = Blog::findOrFail($id);
        return view('panel.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'preview_desc' => ['required', 'min:10'],
            'desc' => ['required', 'min:10'],
            'preview_img' => ['required', 'mimes:svg,jpeg,jpg,png|max:10000'],
            'img' => ['required', 'mimes:svg,jpeg,jpg,png|max:10000'],
        ]);

        if(!$request){
            return redirect()->route('blog.edit')->withErrors($data);
        }

        $path_img = $request->file('img')->store('upload', 'public');
        $path_preview_img = $request->file('preview_img')->store('upload', 'public');

        $blog->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'preview_desc' => $request->preview_desc,
            'img' => $path_img,
            'preview_img' => $path_preview_img,
        ]);
        return redirect()->route('blog.index')->withSuccess('Успешно обновлен !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->withSuccess('Успешно удален !!!');
    }
}
