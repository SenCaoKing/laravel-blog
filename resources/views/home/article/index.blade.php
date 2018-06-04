@extends('layouts.home')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)

@section('content')
    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8">
        <div class="row b-article">
            <h1 class="col-xs-12 col-md-12 col-lg-12 b-title">{{ $data->title }}</h1>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <ul class="row b-metadata">
                    <li class="col-xs-5 col-md-2 col-lg-3"><i class="fa fa-user"></i> {{ $data->author }}</li>
                    <li class="col-xs-7 col-md-3 col-lg-3"><i class="fa fa-calendar"></i> {{ $data->created_at }}</li>
                    <li class="col-xs-5 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="PP url('homr/index/category', [$data->cid])">{{ $data->category_name }}</a></li>
                    <li class="col-xs-7 col-md-5 col-lg-4"><i class="fa fa-tags"></i>
                        @foreach($data->tag as $v)
                            {{ $v->name }}
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
                {{ $data->markdown }}
                <eq name="article['current']['is_original']" value="1">
                    <p class="b-h-20"></p>
                    <p class="b-copyright">
                        {$Think.config.COPYRIGTH_WORD}
                    </p>
                </eq>
                <ul class="b-prev-next">
                    <li class="b-prev">
                        上一篇:
                        <empty name="article['prev']">
                            <span>没有了</span>
                            <else />
                            <a href="{$article['prev']['url']}">{$article['prev']['title']}</a>
                        </empty>
                    </li>
                    <li class="b-next">
                        下一篇:
                        <empty name="article['next']">
                            <span>没有了</span>
                            <else />
                            <a href="{$article['next']['url']}">{$article['next']['title']}</a>
                        </empty>
                    </li>
                </ul>
            </div>
        </div>
        {{--引入通用评论开始--}}
        <include file="Public/public_comment" />
        {{--引入通用评论结束--}}
    </div>
    <!-- 左侧文章结束 -->
@endsection