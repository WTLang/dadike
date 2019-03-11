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
    <script src="reception_public/js/jquery.min.js"></script>
    <script src="reception_public/js/bootstrap.min.js"></script>
    <script src="reception_public/js/menumaker.js"></script>
    <script src="reception_public/js/jquery.sticky.js"></script>
    <script src="reception_public/js/sticky-header.js"></script>
</body>
</html>