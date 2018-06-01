<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - laravel-SenBlog</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="sen,sen.com">
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
                <li class="b-nav-cname <eq name="cid" value="index">b-nav-active</eq>  ">
                    <a href="/" onclick="recordId('/',0)">首页</a>
                </li>

                <li class="b-nav-cname ">
                    <a href="http://111.231.142.198/category/1" onclick="return recordId('cid', '1')">php</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="http://111.231.142.198/chat">随言碎语</a>
                </li>
                <li class="b-nav-cname hidden-sm  ">
                    <a href="http://111.231.142.198/git">开源项目</a>
                </li>
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                <li class="b-user-info">
                    <span><img class="b-head_img" src="http://111.231.142.198/statics/gentelella/production/images/img.jpg" alt="test" title="test"  /></span>
                    <span class="b-nickname">test</span>
                    <span><a href="http://111.231.142.198/auth/oauth/logout">退出</a></span>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->

<div class="b-h-70"></div>

<div id="b-content" class="container">
    <div class="row">
        <!-- 左侧列表开始 -->
        <div class="col-xs-12 col-md-12 col-lg-8">
            <!-- 循环文章列表开始 -->
            <div class="row b-one-article">
                <h3 class="col-xs-12 col-md-12 col-lg-12">
                    <a class="b-oa-title" href="http://111.231.142.198/article/1" target="_blank"> 写给 thinkphp 开发者的 laravel 系列教程 (一) 序言</a>
                </h3>
                <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                    <ul class="row">
                        <li class="col-xs-5 col-md-2 col-lg-3">
                            <i class="fa fa-user"></i> 白俊遥
                        </li>
                        <li class="col-xs-7 col-md-3 col-lg-3">
                            <i class="fa fa-calendar"></i> 2017-07-16 07:35:12
                        </li>
                        <li class="col-xs-5 col-md-2 col-lg-2">
                            <i class="fa fa-list-alt"></i> <a href="http://111.231.142.198/category/1" target="_blank">php</a>
                        </li>
                        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                            <a class="b-tag-name" href="http://111.231.142.198/tag/1" target="_blank">laravel</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- 文章封面图片开始 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                            <figure class="b-oa-pic b-style1">
                                <a href="http://111.231.142.198/article/1" target="_blank">
                                    <img src="http://111.231.142.198/uploads/article/5958ab4dd9db4.jpg" alt="白俊遥博客" title="白俊遥博客">
                                </a>
                                <figcaption>
                                    <a href="http://111.231.142.198/article/1" target="_blank"></a>
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
                <a class=" b-readall" href="http://111.231.142.198/article/1" target="_blank">阅读全文</a>
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
        <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-search">
                <form class="form-inline"  role="form" action="http://111.231.142.198/search" method="get">
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
            <div class="b-tags">
                <h4 class="b-title">加入组织</h4>
                <ul class="b-all-tname">
                    <li class="b-qun-or-code">
                        <img src="http://111.231.142.198/uploads/images/default.png" alt="QQ">
                    </li>
                    <li class="b-qun-word">
                        <p class="b-qun-nuber">
                            1. 手Q扫左侧二维码
                        </p>
                        <p class="b-qun-nuber">
                            2. 搜Q群：88199093
                        </p>
                        <p class="b-qun-code">
                            3. 点击<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=bba3fea90444ee6caf1fb1366027873fe14e86bada254d41ce67768fadd729ee"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="白俊遥博客群" title="白俊遥博客群"></a>
                        </p>
                        <p class="b-qun-article">
                            <a href="http://111.231.142.198/article/1" target="_blank"> 写给 thinkphp 开发者的 laravel 系列教程 (一) 序言</a>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <li class="b-tname">
                        <a class="tstyle-1" href="http://111.231.142.198/tag/1" onclick="return recordId('tid','1')">laravel (1)</a>
                    </li>
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">
                    <a class="b-recommend-a" href="http://111.231.142.198/article/1" target="_blank"><span class="fa fa-th-list b-black"></span>  写给 thinkphp 开发者的 laravel 系列教程 (一) 序言</a>
                </p>
            </div>
            <div class="b-link">
                <h4 class="b-title">最新评论</h4>
                <div>
                    <ul class="b-new-comment  b-new-commit-first ">
                        <img class="b-head-img js-head-img" src="http://111.231.142.198/uploads/avatar/default.jpg" _src="http://111.231.142.198/uploads/article/default.jpg" alt="白俊遥">
                        <li class="b-nickname">
                            白俊遥<span>2017-07-16 07:35:12</span>
                        </li>
                        <li class="b-nc-article">
                            在<a href="http://111.231.142.198/article/1" target="_blank"> 写给 thinkphp 开发者的 la...</a>中评论
                        </li>
                        <li class="b-content">
                            评论的内容
                        </li>
                    </ul>
                </div>
            </div>
            <eq name="show_link" value="1">
                <div class="b-link">
                    <h4 class="b-title">友情链接</h4>
                    <p>
                        <a class="b-link-a" href="https://baijunyao.com" target="_blank"><span class="fa fa-link b-black"></span> 白俊遥博客</a>
                    </p>
                </div>
            </eq>
        </div>
        <!-- 通用右部区域结束 -->
    </div>
    <div class="row">
        <!-- 通用底部文件开始 -->
        <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul>
                <li class="text-center">
                    本博客使用免费开源的 <a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">laravel-bjyblog</a> v5.5.1.1 搭建 © 2014-2018 localhost 版权所有  ICP证：豫ICP备14009546号-3                 </li>
                <li class="text-center">
                    联系邮箱：baijunyao@baijunyao.com
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
                        <a href="http://111.231.142.198/auth/oauth/redirectToProvider/qq"><img src="http://111.231.142.198/images/home/qq-login.png" alt="QQ登录" title="QQ登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="http://111.231.142.198/auth/oauth/redirectToProvider/weibo"><img src="http://111.231.142.198/images/home/sina-login.png" alt="微博登录" title="微博登录"></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="http://111.231.142.198/auth/oauth/redirectToProvider/github"><img src="http://111.231.142.198/images/home/github-login.jpg" alt="github登录" title="github登录"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 登录模态框结束 -->

<script src="http://111.231.142.198/statics/js/jquery-2.0.0.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="http://111.231.142.198/statics/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="http://111.231.142.198/statics/js/html5shiv.min.js"></script>
<script src="http://111.231.142.198/statics/js/respond.min.js"></script>
<![endif]-->
<script src="http://111.231.142.198/statics/pace/pace.min.js"></script>
<script src="http://111.231.142.198/js/home/index.js"></script>
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

<!-- 百度统计结束 -->
</body>
</html>
