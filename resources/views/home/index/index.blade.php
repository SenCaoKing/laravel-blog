@extends('layouts.home')

@section('title', 'Sen Blog,技术博客,个人博客,php博客系统')

@section('keywords', '个人博客系统,个人博客模板,thinkphp博客,php博客,技术博客,Sen')

@section('description', 'Sen的php博客,个人技术博客,senblog,senadmin官方网站')

@section('content')
    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <!-- 循环文章列表开始 -->
        <div class="row b-one-article">
            <h3 class="col-xs-12 col-md-12 col-lg-12">
                <a class="b-oa-title" href="" target="_blank"> 写给 thinkphp 开发者的 laravel 系列教程 (一) 序言</a>
            </h3>
            <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                <ul class="row">
                    <li class="col-xs-5 col-md-2 col-lg-3">
                        <i class="fa fa-user"></i>
                    </li>
                    <li class="col-xs-7 col-md-3 col-lg-3">
                        <i class="fa fa-calendar"></i> 2017-07-16 07:35:12
                    </li>
                    <li class="col-xs-5 col-md-2 col-lg-2">
                        <i class="fa fa-list-alt"></i> <a href="" target="_blank">php</a>
                    </li>
                    <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                        <a class="b-tag-name" href="" target="_blank">laravel</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                    <!-- 文章封面图片开始 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                        <figure class="b-oa-pic b-style1">
                            <a href="" target="_blank">
                                <img src="" alt="博客" title="博客">
                            </a>
                            <figcaption>
                                <a href="" target="_blank"></a>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- 文章封面图片结束 -->

                    <!-- 文章描述开始 -->
                    <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                        终于；终于；终于；开始正式写 laravel 系列了；本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；我把我从tp3转到laravel的历程转成一篇篇的文章教程；愿这一系列的文章；能成为童鞋们踏入laravel的引路人；如果还没下定决定要使用laravel；那么我上来就是一个连接；不是别人说好我也跟着说好的；而是我实实在在的使用过后；...
                    </div>
                    <!-- 文章描述结束 -->
                </div>
            </div>
            <a class=" b-readall" href="" target="_blank">阅读全文</a>
        </div>
        <!-- 循环文章列表结束 -->

        <!-- 列表分页开始 -->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 b-page text-center">

            </div>
        </div>
        <!-- 列表分页结束 -->
    </div>
    <!-- 左侧列表结束 -->
@endsection