<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>{{ $title }}</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/backstage_public/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/backstage_public/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/backstage_public/css/fullcalendar.css" />	
		<link rel="stylesheet" href="/backstage_public/css/unicorn.main.css" />
		<link rel="stylesheet" href="/backstage_public/css/unicorn.grey.css" class="skin-color" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		
		<div id="header"><h1>大迪克</h1></div>
					
		<!-- 搜索开始 -->
		<div id="search">
			<input type="text" placeholder="搜索..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<!-- 搜索结束 -->

		<!-- 导航开始 -->
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">管理员</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">0</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">新消息</a></li>
                        <li><a class="sInbox" title="" href="#">收件箱</a></li>
                        <li><a class="sOutbox" title="" href="#">发件箱</a></li>
                        <li><a class="sTrash" title="" href="#">垃圾</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">退出登录</span></a></li>
            </ul>
        </div>
        <!-- 导航结束 -->
            
        <!-- 侧边开始 -->
		<div id="sidebar">
			<!-- <a href="#" class="visible-phone"><i class="icon icon-home"></i> 44455666</a> -->
			<ul>
				<!-- 1.统计图模块 -->
				<!-- class="active"是左侧白色三角指向图标 -->
				<li class=""><a href="index.html"><i class="icon icon-home"></i> <span>统计图</span></a></li>

				<!-- 2.用户管理模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-user"></i> <span>用户管理</span> <span class="label">2</span></a>
					<ul>
						<li><a href="">管理员</a></li>
						<li><a href="">会员管理</a></li>
					</ul>
				</li>

				<!-- 3.文章管理模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-pencil"></i></i> <span>文章管理</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">浏览文章</a></li>
						<li><a href="">添加文章</a></li>
						<li><a href="">修改文章</a></li>
					</ul>
				</li>

				<!-- 3.文章分类管理模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-plus"></i></i> <span>文章分类</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">浏览分类</a></li>
						<li><a href="">添加分类</a></li>
						<li><a href="">修改分类</a></li>
					</ul>
				</li>

				<!-- 4.文章分类管理模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-signal"></i></i> <span>文章排行</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">按时间</a></li>
						<li><a href="">按最新</a></li>
						<li><a href="">按浏览</a></li>
					</ul>
				</li>

				<!-- 5.友情链接模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-asterisk"></i></i> <span>友情链接</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">浏览友情链接</a></li>
						<li><a href="">添加友情链接</a></li>
						<li><a href="">修改友情链接</a></li>
					</ul>
				</li>

				<!-- 6.权限模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-tag"></i></i> <span>用户权限</span> <span class="label">2</span></a>
					<ul>
						<li><a href="">浏览用户权限</a></li>
						<li><a href="">修改用户权限</a></li>
					</ul>
				</li>

				<!-- 7.评论模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-comment"></i></i> <span>评论管理</span> </a>
					<!-- 	<ul>
						<li><a href="">审核评论</a></li>
					</ul> -->
				</li>

				<!-- 8.广告模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-asterisk"></i></i> <span>广告管理</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">浏览广告</a></li>
						<li><a href="">添加广告</a></li>
						<li><a href="">修改广告</a></li>
					</ul>
				</li>

				<!-- 9.用户意见模块 -->
				<li class="submenu">
					<a href="#"><i class="icon icon-info-sign"></i></i> <span>用户建议</span> <span class="label">3</span></a>
					<ul>
						<li><a href="">查看用户意见</a></li>
						<li><a href="">发布处理结果</a></li>
					</ul>
				</li>

		
		</div>
		<!-- 侧边结束 -->
		@section('content_01')


		@show


            <script src="/backstage_public/js/excanvas.min.js"></script>
            <script src="/backstage_public/js/jquery.min.js"></script>
            <script src="/backstage_public/js/jquery.ui.custom.js"></script>
            <script src="/backstage_public/js/bootstrap.min.js"></script>
            <script src="/backstage_public/js/jquery.flot.min.js"></script>
            <script src="/backstage_public/js/jquery.flot.resize.min.js"></script>
            <script src="/backstage_public/js/jquery.peity.min.js"></script>
            <script src="/backstage_public/js/fullcalendar.min.js"></script>
            <script src="/backstage_public/js/unicorn.js"></script>
            <script src="/backstage_public/js/unicorn.dashboard.js"></script>
	</body>
</html>
