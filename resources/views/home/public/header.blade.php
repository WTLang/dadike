<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title or '大迪克' }}</title>
    {{-- Bootstrap --}}
    <link href="/reception_public/css/bootstrap.min.css" rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="/reception_public/css/font-awesome.min.css" rel="stylesheet">
    {{-- Style --}}
    <link href="/reception_public/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- 头部占位 --}}
    @yield('meta')
    {{-- 微博关注 --}}
    <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    {{-- 轮播图样式 --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/reception_public/Rotation/css/normalize.css" />
    <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/reception_public/Rotation/css/main.css">
</head>
<body>
    {{-- 头部开始 --}}
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="/" style="font-size: 50px;">大迪克博客</a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active">
                                    <a href="/" title="Home">主页</a>
                                </li>
                                <li class="has-sub"><a href="javascript:;" title="Service List">博客</a>
                                    <ul>
                                        <li><a href="" title="Service List">分类一</a></li>
                                        <li><a href="" title="Service Detail">分类二</a></li>
                                    </ul>
                                </li>
                            <li class="has-sub"><a href="blog-default.html" title="Blog ">帖子</a>
                                <ul>
                                    <li><a href="blog-default.html" title="Blog">帖子分类一</a></li>
                                    <li><a href="blog-single.html" title="Blog Single ">帖子分类二</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="" title="Blog ">树洞</a>
                                <ul>
                                    <li><a href="/tree/index" title="Blog">发表树洞</a></li>
                                    <li><a href="/tree/show" title="Blog Single ">我的发表</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="/aboutus" title="Contact Us">关于我们</a></li>
                            @if(\Session::get('us_name'))
                            <li class="has-sub"><a href="" title="Blog ">欢迎您,{{ \Session::get('us_name') }}</a>
                                <ul>
                                    <li><a href="/personal" title="Blog">个人中心</a></li>
                                    <li><a href="/logout" title="Blog Single ">登出</a></li>
                                </ul>
                            </li>
                            @else
                            <li class=""><a href="/login" title="Blog ">登入/注册</a>
                            @endif
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    {{-- 头部结束 --}}
    
    @section('content_01')


    @show

       {{-- 脚部开始 --}}
    <div class="footer">
        <div class="container">
            <div class="footer-block">
            {{-- footer block --}}
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-left: 125px;">
                        <div class="footer-widget footer-social">
                        {{-- social block --}}
                            <h2 class="widget-title">友情链接 </h2>
                            @php
                            $friend_data = DB::table('friend_link')->where('flk_status',1)->limit(5)->get();
                            @endphp
                            {{-- 友情链接遍历开始 --}}
                            @foreach($friend_data as $k=>$v)
                            <ul class="listnone">
                                <li>
                                <a href="http://www.{{ $v->flk_url }}">{{ $v->flk_name }}</a>
                                </li>
                            </ul>
                            @endforeach
                            {{-- 友情链接遍历结束 --}}
                        </div>
                    {{-- /.social block --}}
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                        {{-- social block --}}
                            <h2 class="widget-title"></h2>
                            <ul class="listnone">
                                <li>
                                <a href="#"></a>
                                </li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li>
                                <a href="#"></a>
                                </li>
                            </ul>
                        </div>
                    {{-- /.social block --}}
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                        {{-- newsletter block --}}
                            <h2 class="widget-title" style="padding-left:97px">咨询微信</h2>
                            <div class="input-group" style="margin-left: 100px">
                                {{-- 微信二维码图片 --}}
                                <img src="/reception_public/Rotation/img/code.png" alt="" style="width:150px;height:150px">
                            </div>
                        {{-- /input-group --}}
                        </div>
                    {{-- newsletter block --}}
                    </div>
                </div>
            <div class="tiny-footer">
            {{-- tiny footer block --}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright-content">
                            <p>© 大迪克 2019 | 版权所有 | <a href="">使用前必读</a> | <a href="">意见反馈</a> | 京IPC号000000号</p>
                            <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000001" target="_blank"><i></i>京公网安备00000000000000号</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /.tiny footer block --}}
            </div>
        {{-- 脚部结束 --}}
        </div>
    </div>

    <div class="tiny-footer">
    {{-- 最底下文字 --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="copyright-content">
                    <p>© Men Salon 2020 | all rights reserved</p>
                </div>
            </div>
        </div>
    </div>
    {{-- 最底下文字结束 --}}
    <script src="/reception_public/js/jquery.min.js"></script>
    <script src="/reception_public/js/bootstrap.min.js"></script>
    <script src="/reception_public/js/menumaker.js"></script>
    <script src="/reception_public/js/jquery.sticky.js"></script>
    <script src="/reception_public/js/sticky-header.js"></script>
</body>

</html>

