<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::all();
        return view('admin.article', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = date('YmdHis') . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('public/images/', $filename);
        if (Article::create([
            'title' => $request->title,
            'slug' => implode('-', explode(' ', $request->title)),
            'image' => $filename,
            'content' => $request->content
        ])) {
            return ["status" => 'OK'];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        Storage::delete('public/images/' . $article->image);
        $filename = date('YmdHis') . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('public/images/', $filename);
        $article->title = $request->title;
        $article->slug = implode('-', explode(' ', $request->title));
        $article->image = $filename;
        $article->content = $request->content;

        if ($article->save()) {
            return ['status' => 'OK'];
        }
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
        Storage::delete('public/images/' . $article->image);
        if ($article->delete()) {
            return ['status' => 'OK'];
        }
    }
}
