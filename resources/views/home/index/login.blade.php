@extends('home.public.header')

@section('content_01')
<div class="content">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-block">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12"></div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <h1 class="widget-title">大迪克</h1>
                            <ul class="listnone">
                                <li><a href="#"><i class="fa fa-twitter"></i> QQ</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i>微博</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i>微信</a></li>
                                <li><a href="#"> <i class="fa fa-youtube"></i>人人</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <form action="/dologin" method="POST">
                                {{ csrf_field() }}
                            <h2 class="widget-title">登录你的账号</h2>
                            <div class="col-md-12">
                                <label class="" for="name"> 用户名</label>
                                <input type="text" name="name" id="name" placeholder="" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <label class="" for="pass">密码</label>
                                <input type="text" name="pass" id="pass" placeholder="" class="form-control">
                            </div>

                             <div class="col-md-8">
                                <label class="" for="pass">验证码</label>
                                <input type="text" name="verify" id="pass" placeholder="" class="form-control">
                            </div>
                            <div class="col-md-4" style="margin-top: 36px;">
                                <a href="javascript:viod(0);" onclick="changeimg()"><img id="verify" width="160"src="/reception_public/Model/verify/verify.php" alt="" onclick="changeimg()"></a><br/>
                            </div>
                            <div class="col-md-5">
                                <input type="submit" name="login" value="登录" class="btn btn-white btn-lg mt20" style="width: 200px;">
                                <!-- <a href="/dologin" class="btn btn-white btn-lg mt20" style="width: 200px;">登录</a> -->
                            </div>
                            </form>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <a href="/create" class="btn btn-white btn-lg mt20" style="width: 200px;">没有账号?注册</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-footer"><!-- 底部填充 --></div>
            </div>
        </div>
    </div>
</div>
<!-- 登录 -->
<script>
    function changeimg(){
        var a = document.getElementById('verify');
        a.src = '/reception_public/Model/verify/verify.php?'+Math.random();
    }
</script>
@endsection