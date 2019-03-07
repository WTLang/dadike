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

    {{-- 脚部开始 --}}
    <div class="footer">
        <div class="container">
            <div class="footer-block">
            {{-- footer block --}}
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-left: 125px;">
                        <div class="footer-widget footer-social">
                        {{-- social block --}}
                            <h2 class="widget-title">友情链接</h2>
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
                            <h2 class="widget-title">咨询</h2>
                            <p>如有问题可使用微信扫一扫，扫取以下二维码即可获取我们的联系方式。</p>
                            <div class="input-group">
                                {{-- 微信二维码图片 --}}
                                <img src="/reception_public/Rotation/img/5.jpg" alt="" style="width:250px;height:250px">
                                }
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
    <script src="reception_public/js/jquery.min.js"></script>
    <script src="reception_public/js/bootstrap.min.js"></script>
    <script src="reception_public/js/menumaker.js"></script>
    <script src="reception_public/js/jquery.sticky.js"></script>
    <script src="reception_public/js/sticky-header.js"></script>
</body>

</html>