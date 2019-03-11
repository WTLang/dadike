<!DOCTYPE html>
<html lang="zh-CN">
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
    @yield('meta')
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
                    <a href="/"><img src="/reception_public/images/logo.png" alt=""></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="/" title="Home">主页</a>
                            </li>
                                <li class="has-sub"><a href="service-list.html" title="Service List">博客</a>
                                    <ul>
                                        <li><a href="service-list.html" title="Service List">分类一</a></li>
                                        <li><a href="service-detail.html" title="Service Detail">分类二</a></li>
                                    </ul>
                                </li>
                            <li class="has-sub"><a href="blog-default.html" title="Blog ">帖子</a>
                                <ul>
                                    <li><a href="blog-default.html" title="Blog">帖子分类一</a></li>
                                    <li><a href="blog-single.html" title="Blog Single ">帖子分类二</a></li>
                                </ul>
                            </li>
                            <li><a href="#" title="Features">新闻</a>
                                <ul>
                                    <li><a href="testimonial.html" title="Service List">新闻分类一</a></li>
                                    <li><a href="styleguide.html" title="Service Detail">新闻分类二</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html" title="Contact Us">联系我们</a></li>

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