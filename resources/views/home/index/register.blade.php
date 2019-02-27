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
                        <h1 class="widget-title">你还没有注册?</h1>
                        <ul class="listnone">
                            <li><a href="#"> <i class="fa fa-facebook"></i> Facebook </a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i> 推特</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="footer-widget widget-newsletter">
                        <h2 class="widget-title">加入我们</h2>
                        <form action="/" method="POST">
                            {{ csrf_field() }}
                        <div class="col-md-12">
                            <label class="" for="uname"> 用户名</label>
                            <input type="text" name="us_name" id="name" placeholder="" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label class="" for="us_password">密码</label>
                            <input type="text" name="pass" id="pass" placeholder="" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label class="" for="phone"> 手机号码</label>
                            <input type="text" name="us_tel" id="phone" placeholder="" class="form-control">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="" for="phone"> 电子邮件</label>
                            <input type="text" name="us_email" id="phone" placeholder="" class="form-control">
                        </div>

                        <div class="col-md-8">
                            <label class="" for="captcha"> 邮箱验证码</label>
                            <input type="text" name="captcha" id="captcha" placeholder="" class="form-control" style="width: 250px;">
                        </div>
                        <div class="col-md-4">
			                <a onclick="send()" class="btn btn-white btn-primary mt20" style="width: 110px;margin-top: 33px;padding-left: 20px;">发送验证码</a>
			            </div>

                        <div class="col-md-8">
                            <input type="submit" name="" value="立即注册" class="btn btn-white btn-lg mt20" style="width: 387px;font-size: 20px;height: auto">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="tiny-footer"><!-- 底部填充 --></div>
                    
        </div>
    </div>
</div>
</div>
<script>
    function send(){
        var us_email = $('input[name=us_email]').val();
        
    }
</script>
<!-- 登录 -->

@endsection