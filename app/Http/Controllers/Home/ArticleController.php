<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($id, Article $article)
    {
        $data = $article->getDataById($id);
        $assign = [
            'data' => $data
        ];
        return view('home/article/index', $assign);
    }
}
