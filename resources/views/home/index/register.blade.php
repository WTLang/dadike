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
                        {{-- 显示错误的信息 --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/" method="POST">
                            {{ csrf_field() }}
                        <div class="col-md-10">
                            <label class="" for="uname"> 用户名</label>
                            <input type="text" name="us_name" id="us_name"  class="form-control" placeholder="输入您的用户名,字母组成,6-16位" value="{{ old('us_name') }}" onblur="namecheck(this)">
                        </div>
                        <div>
                            <img id="right-img" src="" style="padding-top: 30px;" >
                        </div>
                        <div class="col-md-10">
                            <label class="" for="us_password">密码</label>
                            <input type="password" name="us_password" id="pass"  class="form-control" placeholder="输入密码,6-18位,不含空格">
                        </div>

                        <div class="col-md-10">
                            <label class="" for="reus_password">再次输入密码</label>
                            <input type="password" name="reus_password" id="pass" placeholder="重新输入您的密码" class="form-control" >
                        </div>

                        <div class="col-md-10">
                            <label class="" for="phone"> 手机号码</label>
                            <input type="text" name="us_tel" id="phone" placeholder="输入您的11位手机号" class="form-control" value="{{ old('us_tel') }}">
                        </div>
                        
                        <div class="col-md-10">
                            <label class="" for="phone"> 电子邮件</label>
                            <input type="text" name="us_email" id="phone"  class="form-control" placeholder="输入您的电子邮箱" value="{{ old('us_email') }}">
                        </div>

                        <div class="col-md-8">
                            <label class="" for="code"> 邮箱验证码</label>
                            <input type="text" onblur="check(this)" name="code" id="code"  class="form-control" style="width: 250px;" placeholder="输入6位验证码">
                        </div>

                        <div class="col-md-4">
                            <input type="button" onclick="send(this)" id="sendBtn" value="发送验证码" class="btn btn-white btn-primary mt20" style="width: 110px;margin-top: 33px;padding-left: 20px;" >
			            </div>

                        <div class="col-md-8">
                            <input type="submit" id="submit" name="" value="立即注册" class="btn btn-white btn-lg mt20" style="width: 387px;font-size: 20px;height: auto" disabled>
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
    function editCon()
        {
            var t = 60;
            var time = null;
            if(time == null){
                time = setInterval(function(){
                    t--;
                    // 修改当前button 和 内容
                    $('#sendBtn').val('重新发送('+t+'s)');
                    if(t < 1){
                        // 清除定时器
                        clearInterval(time);
                        time = null;
                        $('#sendBtn').val('发送验证码');
                        // 设置button状态
                        $('#sendBtn').attr('disabled',false);
                    }
                },1000);
            }
                
        }

    /**
     * 验证码发送方法
     */

    function send(obj){
        //获取输入的邮箱
        var us_email = $('input[name=us_email]').val();
        //邮箱的正则
        var email_grep = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
        if (!email_grep.test(us_email)) {
            alert('请输入正确的邮箱');
            return false;
        }

        // 将js对象转化成jquery对象
        var object = $(obj);
        // 设置button状态
        object.attr('disabled',true);
        // 获取当前的按钮上的文字
        var text = object.val();
        if(text == '发送验证码'){
            //csfr
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});

            // 发送ajax,发送邮件 
            $.get('/send',{'us_email':us_email},function(data){
                // console.log(data);
                editCon(); //成功发送后,定时器开启
            },'json'); 

        }else{
            return false;
        }
    }

    /**
     * 验证码框失焦就开始判断是否输入正确
     */

    function check(){
        var code = $('input[name=code]').val();
            // 发送ajax 请求后台 
            //csfr
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});

            // 发送ajax 请求后台 
            $.get('/check',{'code':code},function(data){
                // alert(data);
                if (data) {
                    $('#submit').attr('disabled',false);
                }else{
                    alert('验证码错误,请输入正确验证码或者重新获取');
                    $('#submit').attr('disabled',true);
                }
            },'json'); 
    }

    /**
     * 检测输入名是否与数据库有重复
     */
    function namecheck(){
        var us_name = $('input[name=us_name]').val();
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});

            // 发送ajax 请求后台 
            $.get('/namecheck',{'us_name':us_name},function(data){
                if (data) {     
                    $('#submit').attr('disabled',true);
                    alert('用户名已存在,请重新输入');
                }else{
                    $('#right-img').attr('src','/reception_public/images/right.jpg');
                }
            },'json'); 
    }
</script>
<!-- 登录 -->

@endsection