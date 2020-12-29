<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Header;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['searchKey'] = '';
        $data['headers'] = Header::all();
        $data['articles'] = Article::orderBy('title')->get();
        $data['recentArticles'] = Article::orderBy('created_at', 'ASC')->take(5)->get();
        return view('user.home', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['searchKey'] = '';
        $title = implode(' ', explode('-', $id));
        $article = Article::where('title', '=', $title)->first();
        $data['headers'] = Header::all();
        $data['article'] = $article;
        $data['recentArticles'] = Article::orderBy('created_at', 'ASC')->take(5)->get();
        return view('user.detail', $data);
    }
}
