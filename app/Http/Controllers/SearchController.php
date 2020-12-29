<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Header;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchKey = $request->input('g');
        $data['headers'] = Header::all();
        $articles = Article::where('title', 'like', '%' . $searchKey . '%')
            ->orWhere('content', 'like', '%' . $searchKey . '%')->get();
        $data['searchKey'] = $searchKey;
        foreach ($articles as $key => $artcle) {
            $title = $artcle['title'];
            $articles[$key]['title'] = str_replace(
                $searchKey,
                '<span style="background: yellow">' . $searchKey . '</span>',
                $title
            );

            $content = $artcle['content'];
            $articles[$key]['content'] = str_replace(
                $searchKey,
                '<span style="background: yellow">' . $searchKey . '</span>',
                $content
            );
        }
        $data['articles'] = $articles;
        return view('user.search', $data);
    }
}
