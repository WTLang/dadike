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
                                <li class="active"><a href="/" title="Home">主页</a>
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
                            <li><a href="#" title="Features">新闻</a>
                                <ul>
                                    <li><a href="testimonial.html" title="Service List">新闻分类一</a></li>
                                    <li><a href="styleguide.html" title="Service Detail">新闻分类二</a></li>
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
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">联系我们</h2>
                            <ul class="listnone contact">
                                <li><i class="fa fa-map-marker"></i> 4958 Norman Street Los Angeles, CA 90042 </li>
                                <li><i class="fa fa-phone"></i> +00 (800) 123-4567</li>
                                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                                <li><i class="fa fa-envelope-o"></i> info@salon.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                        {{-- social block --}}
                            <h2 class="widget-title">友情链接</h2>
                            <ul class="listnone">
                                <li>
                                <a href="#"> <i class="fa fa-facebook"></i> Facebook </a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linked In</a></li>
                                <li>
                                <a href="#"> <i class="fa fa-youtube"></i>Youtube</a>
                                </li>
                            </ul>
                        </div>
                    {{-- /.social block --}}
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                        {{-- newsletter block --}}
                            <h2 class="widget-title">咨询</h2>
                            <p>输入您的电子邮件地址，以便在收件箱中接收新的患者信息和其他有用信息。</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="输入您的邮箱">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">提交</button>
                                </span>
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
                            <p>© dadike 2020 | all rights reserved</p>
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
                    <p>© 大迪克博客 2019 | 版权所有</p>
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