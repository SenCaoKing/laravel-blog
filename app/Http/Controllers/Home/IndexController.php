<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Article $articleModel)
    {
        $article = $articleModel->getHomeList();
        p($article);
        $assign = [
            'article'    => $article,
            'title_word' => ''
        ];
        return view('home/index/index', $assign);
    }
}
