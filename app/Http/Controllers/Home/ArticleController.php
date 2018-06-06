<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($id, Article $article)
    {
        // 获取文章数据
        $data = $article->getDataById($id);
        // 获取上一篇
        $prev = $article->select('id', 'title')->orderBy('created_at', 'asc')->where('id', '>', $id)->limit(1)->first();
        $next = $article->select('id', 'title')->orderBy('created_at', 'desc')->where('id', '<', $id)->limit(1)->first();
        $assign = [
            'data' => $data,
            'prev' => $prev,
            'next' => $next
        ];
        return view('home/article/index', $assign);
    }
}
