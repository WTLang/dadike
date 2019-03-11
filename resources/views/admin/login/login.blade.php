<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unicorn Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/backstage_public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/backstage_public/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/backstage_public/css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo" style="height: 180px;">
            <h1 style="padding-left: 70px;padding-top: 50px;font-size: 50px;height: 70px;">大迪克后台</h1>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger" style="width: 348px;margin-left: 567px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif   
        
        @if (session('msg'))
        <div class="alert alert-danger" style="width: 348px;margin-left: 567px;">
                <li>{{ session('msg') }}</li>
        </div>
        @endif 
        <div id="loginbox">
            <form class="form-vertical" action="/admin/login" method="post" />
                {{ csrf_field() }}
                {{-- 显示错误的信息 --}}
                
                <p>输入用户名和密码.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="用户名" name="admin_name" value="{{ old('admin_name') }}"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="密码" name="admin_password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a class="flip-link" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right">
                        <input type="submit" class="btn btn-inverse" value="登录" />
                    </span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical" />
                <p>在下面输入您的电子邮件地址，我们将向您发送如何恢复密码的说明。</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="输入邮箱" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="" class="flip-link" id="to-login">&lt; 返回登录</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="发送" /></span>
                </div>
            </form>
        </div>
        
        <script src="/backstage_public/js/jquery.min.js"></script>  
        <script src="/backstage_public/js/unicorn.login.js"></script> 
    </body>
</html>
    