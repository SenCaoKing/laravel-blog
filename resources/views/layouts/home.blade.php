<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ $config['WEB_NAME'] }}</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="Sen, {{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/css/bjy.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/css/animate.min.css') }}">
    @yield('css')
</head>
<body>
<!-- 顶部导航开始 -->
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" onclick="recordId('/',0)">
                <div class="hidden-xs b-nav-background"></div>
                <ul class="b-logo-code">
                    <li class="b-lc-start">&lt;?php</li>
                    <li class="b-lc-echo">echo</li>
                </ul>
                <p class="b-logo-word">'Sen Blog'</p>
                <p class="b-logo-end">;</p>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname @if($cid == 'index') b-nav-active @endif">
                    <a href="/" onclick="recordId('/',0)">首页</a>
                </li>
                @foreach($category as $v)
                    <li class="b-nav-cname @if($v->id == $cid) b-nav-native @endif ">
                        <a href="" onclick="return recordId('cid', '{{ $v->id }}')">{{ $v->name }}</a>
                    </li>
                @endforeach
                <li class="b-nav-cname @if($v->id == $cid) b-nav-native @endif ">
                    <a href="{{ url('chat') }}">随言碎语</a>
                </li>
                <li class="b-nav-cname hiddem-sm @if($v->id == $cid) b-nav-native @endif ">
                    <a href="{{ url('git') }}">开源项目</a>
                </li>
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(empty($user['name']))
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a href="javascript:;" onclick="login()">登录</a>
                    </li>
                @else
                    <li class="b-user-info">
                        <span><img class="b-head_img" src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" title="{{ $user['name'] }}" /></span>
                        <span class="b-nickname">{{ $user['name'] }}</span>
                        <span><a href="javascript:;" onclick="logout()">退出</a></span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->

<div class="b-h-70"></div>

<div id="b-content" class="container">
    <div class="row">
        @yield('content')

        <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <?php $tag_i = 0; ?>
                    @foreach($tag as $v)
                        <?php $tag_i++; ?>
                        <?php $tag_i=$tag_i==5?1:$tag_i; ?>
                            <li class="b-tname">
                                <a class="tstyle-{{ $tag_i }}" href="{{ url('tag', [$v->id]) }}" onclick="return recordId('tid','{{ $v->id }}')">{{ $v->name }}({{ $v->article_count }})</a>
                            </li>
                    @endforeach
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">
                    @foreach($topArticle as $v)
                        <a class="b-recommend-a" href="{{ url('article', [$v->id]) }}" target="_blank"><span class="fa fa-th-list b-black"></span> {{ $v->title }}</a>
                    @endforeach

                </p>
            </div>
            <div class="b-link">
                <h4 class="b-title">最新评论</h4>
                <div>
                    @foreach($comment as $v)
                        <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                            <img class="b-head-img js-head-img" src="{{ asset('images/home/qq_default.jpg') }}" _src="{{ $v->avatar }}" alt="{{ $v->name }}">
                            <li class="b-nickname">
                                {{ $v->name }}<span>{{ wordTime($v->created_at) }}</span>
                            </li>
                            <li class="b-nc-article">
                                在<a href="{{ url('article', [$v->article_id]) }}" target="_blank">{{ $v->title }}</a>中评论
                            </li>
                            <li class="b-content">
                                {!! $v->content !!}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <eq name="show_link" value="1">
                <div class="b-link">
                    <h4 class="b-title">友情链接</h4>
                    <p>
                        @foreach($friendshipLink as $v)
                            <a class="b-link-a" href="{{ url($v->url) }}" target="_blank"><span class="fa fa-link b-black"></span> {{ $v->name }}</a>
                        @endforeach

                    </p>
                </div>
            </eq>
            <div class="b-search">
                <form class="form-inline" role="form" action="{{ url('search') }}" method="get">
                    <input class="b-search-text" type="text" name="search_word">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
        </div>
        <!-- 通用右部区域结束 -->
    </div>
    <div class="row">
        <!-- 通用底部文件开始 -->
        <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul>
                <li class="text-center">
                    本博客使用免费开源的 <a rel="nofollow" href="" target="_blank">laravel-bjyblog</a> v5.5.1.1 搭建 © 2014-2018 localhost 版权所有  ICP证：                 </li>
                <li class="text-center">
                    联系邮箱：{{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}
                </li>
            </ul>
            <div class="b-h-20"></div>
            <a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a>
        </footer>
        <!-- 通用底部文件结束 -->
    </div>
</div>
<!-- 主体部分结束 -->

<!-- 登录模态框开始 -->
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row">
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href=""><img src="{{ asset('images/home/qq-login.png') }}" alt="QQ登录" title="QQ登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href=""><img src="{{ asset('images/home/sina-login.png') }}" alt="微博登录" title="微博登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href=""><img src="{{ asset('images/home/douban-login.png') }}" alt="豆瓣登录" title="豆瓣登录"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 登录模态框结束 -->

<script src="{{ asset('statics/js/jquery-2.0.0.min.js') }}"></script>
<script>
    logoutUrl="{{url('home/user/logout')}}";
</script>
<script src="{{ asset('statics/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('statics/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('statics/js/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('statics/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/home/index.js') }}"></script>
<!-- 百度页面自动提交开始 -->
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->
{!! htmlspecialchars_decode($config['WEB_STATISTICS']) !!}
<!-- 百度统计结束 -->
@yield('js')
</body>
</html>
