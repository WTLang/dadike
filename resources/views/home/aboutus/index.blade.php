@extends('home.public.header')

@section('content_01')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-caption">
                    <h2 class="page-title">关于我们</h2>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="/">大迪克</a></li>
                            <li class="active">博客</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @if (session('aboutus_error'))
    <script language="javascript">alert("发送失败,有内容为空");</script>
    @endif

    @if (session('aboutus_success'))
    <script language="javascript">alert("发送成功,我们会尽一切努力尽快回复您。");</script>
    @endif

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="widget widget-contact">
                    <!-- widget search -->
                    <h3 class="widget-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系信息</font></font></h3>
                    <address>
                        <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></strong>
                        <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广东省 广州市
                         </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">天河区 · 兄弟连
                         </font></font><br>
                        <abbr title="电话"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></abbr><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话:（123）456-7890
                    </font></font></address>
                    <address>
                        <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系人邮箱</font></font></strong>
                        <br>
                        <a href="mailto:#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">123456@gmail.com</font></font></a>
                    </address>
                </div>
                <div class="widget widget-social">
                    <div class="social-circle">
                        <a href="javascript:;"  onclick="weibo()">博</a>
                        <a href="tencent://message/?Menu=yes&uin=760811659& Service=300&sigT=45a1e5847943b64c6ff3990f8a9e644d2b31356cb0b4ac6b24663a3c8dd0f8aa12a595b1714f9d45" >Q</a>

                        <a href="javascript:;" onmouseover="weixin_select();" onmouseout="weixin_hidden();" >微</a>
                    </div>
                    <div id="weixin_img" class="white_content" hidden> 
                        <img src='borther.png' style="height: 200px;width: 200px;padding-top: 12px;margin-left: 100px;" />  
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">与我们联系</font></font></h1>
                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">请填写下面的表格。</font><font style="vertical-align: inherit;">我们会尽一切努力尽快回复您。</font></font></p>
                        <form action="/aboutus/store" method="post" >
                        	{{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">名称</font></font></label>
                                    <input type="text" name="about_name" id="name" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
                                    <input type="text" name="about_phone" id="phone" placeholder="" class="form-control" oninput="checkPhone()">
                                    <span class="default" id="phoneErr" style="padding-left: 20px;color: red;"  hidden>手机号码不合规范</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件</font></font></label>
                                    <input type="text" name="about_email" id="email" placeholder="" class="form-control" oninput="checkEmail()">
                                    <span class="default" id="emailErr" style="padding-left: 20px;color: red;" hidden>电子邮箱不合法</span>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="textarea"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">信息</font></font></label>
                                        <textarea class="form-control" id="textarea" name="about_message" rows="6"style="resize:none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" id="message" value="发消息" class="btn btn-default">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript"> 
    function checkPhone(){ 
    var userphone = document.getElementById('phone'); 
    var phonrErr = document.getElementById('phoneErr'); 
    var pattern = /^1[34578]\d{9}$/; //验证手机号正则表达式 
    if(!pattern.test(userphone.value)){ 
        phonrErr.hidden="" 
        return false; 
    } 
    else{ 
        phonrErr.innerHTML="手机号码正确" 
        phonrErr.style['color']="green"; 
        return true; 
        } 
    }

    function checkEmail(){ 
    var useremail = document.getElementById('email'); 
    var emailrErr = document.getElementById('emailErr'); 
    var pattern = /^\w+@\w+(\.[a-zA-Z]{2,3}){1,2}$/; //邮箱验证 
    if(!pattern.test(useremail.value)){ 
        emailErr.hidden="" ;
        return false; 
    } 
    else{ 
        emailErr.innerHTML="邮箱验证成功" 
        emailErr.style['color']="green"; 
        return true; 
        } 
    }
    /* 微博 */
    function weibo()
    {
        window.open("https://weibo.com/u/2991975565?refer_flag=9549880000_guanzhuanniu&is_all=1"); 
    }
    /* 微信 */
    function weixin_select()
    {
        var weixin = document.getElementById('weixin_img'); 
        weixin.hidden = '' ;
        return true;
    }
    function weixin_hidden()
    {
        var weixin = document.getElementById('weixin_img'); 
        weixin.hidden = 'hidden' ;
        return true;
    }
</script> 

@endsection