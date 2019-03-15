<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
	<head>
		<title>{{ $title or '大迪克' }}</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/backstage_public/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/backstage_public/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/backstage_public/css/fullcalendar.css" />	
		<link rel="stylesheet" href="/backstage_public/css/unicorn.main.css" />
		<link rel="stylesheet" href="/backstage_public/css/unicorn.grey.css" class="skin-color" />
		<link rel="stylesheet" href="/backstage_public/clock_css/clock.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		
		<div id="header"><a href="/admin/index"><h1>大迪克</h1></a></div>
					
		{{-- 搜索开始 --}}
		<div id="search" hidden>
			<input type="text" placeholder="搜索..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		{{-- 搜索结束 --}}

		{{-- 导航开始 --}}
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">管理员</span></a></li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="/admin/logout"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
            </ul>
        </div>
        {{-- 导航结束 --}}
            
        {{-- 侧边开始 --}}
		<div id="sidebar">
			<ul>
				{{-- 1.统计图模块 --}}
				{{-- class="active"是左侧白色三角指向图标 --}}
				<li class="submenu @yield('cxy_01')">
					<a href="#"><i class="icon icon-home"></i><span>仪表盘</span></a>
					<ul>
						<li class="@yield('bxy_01')"><a href="/admin/index">本站信息</a></li>
						<li class="@yield('bxy_02')" hidden><a href="/admin/count">网站总览</a></li>
					</ul>
				</li>

				{{-- 2.用户管理模块 --}}
				<li class="submenu @yield('cxy_02') ">
					<a href="#"><i class="icon icon-user"></i> <span>用户管理</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_03')"><a href="">管理员</a></li>
						<li class="@yield('bxy_04')"><a href="/admin/user">会员管理</a></li>
					</ul>
				</li>

				{{-- 3.文章管理模块 --}}
				<li class="submenu @yield('cxy_03')">
					<a href="#"><i class="icon icon-pencil"></i></i> <span>文章管理</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_05')"><a href="/admin/am">浏览文章</a></li>
						<li class="@yield('bxy_06')"><a href="/admin/am/create">添加文章</a></li>
						<li class="@yield('bxy_07')" hidden><a href="/admin/am/{id}/edit">修改文章</a></li>
					</ul>
				</li>

				{{-- 3.文章分类管理模块 --}}
				<li class="submenu @yield('cxy_04')">
					<a href="#"><i class="icon icon-plus"></i></i> <span>文章分类</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_08')"><a href="/admin/acm">浏览分类</a></li>
						<li class="@yield('bxy_09')"><a href="/admin/acm/create">添加分类</a></li>
						<li class="@yield('bxy_10')" hidden><a href="/admin/acm/{id}/edit">修改分类</a></li>
					</ul>
				</li>

				{{-- 4.文章排行管理模块 (关闭)
				<li class="submenu @yield('cxy_05')">
					<a href="#"><i class="icon icon-signal"></i></i> <span>文章排行</span> <span class="label">3</span></a>
					<ul>
						<li class="@yield('bxy_11')"><a href="">按时间</a></li>
						<li class="@yield('bxy_12')"><a href="">按最新</a></li>
						<li class="@yield('bxy_13')"><a href="">按浏览</a></li>
					</ul>
				</li>
				--}}

				{{-- 5.友情链接模块 --}}
				<li class="submenu @yield('cxy_06')">
					<a href="#"><i class="icon icon-asterisk"></i></i> <span>友情链接</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_14')"><a href="/admin/friend">浏览友情链接</a></li>
						<li class="@yield('bxy_15')"><a href="/admin/friend/create">添加友情链接</a></li>
						<li class="@yield('bxy_16')" hidden><a href="">修改友情链接</a></li>
					</ul>
				</li>

				{{-- 6.权限模块 --}}
				<li class="submenu @yield('cxy_07')">
					<a href="#"><i class="icon icon-tag"></i></i> <span>用户权限</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_17')"><a href="">浏览用户权限</a></li>
						<li class="@yield('bxy_18')"><a href="">修改用户权限</a></li>
					</ul>
				</li>

				{{-- 7.文章回复模块--}}
				<li class="submenu @yield('cxy_08')">
					<a href="#"><i class="icon icon-comment"></i></i> <span>文章回复</span> </a>
					<ul>
						<li class="@yield('bxy_19')"><a href="/admin/reply">审核回复</a></li>
					</ul>
				</li>
				

				{{-- 8.广告模块 --}}
				<li class="submenu @yield('cxy_09')">
					<a href="#"><i class="icon icon-asterisk"></i></i> <span>广告管理</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_20')"><a href="/admin/advertising">浏览广告</a></li>
						<li class="@yield('bxy_21')"><a href="/admin/advertising/create">添加广告</a></li>

						<li class="@yield('bxy_22')" hidden><a href="">修改广告</a></li>
					</ul>
				</li>

				{{-- 9.联系我们模块 --}}
				<li class="submenu @yield('cxy_10')">
					<a href="#"><i class="icon icon-info-sign"></i></i> <span>用户建议</span> <span class="label">2</span></a>
					<ul>
						<li class="@yield('bxy_23')"><a href="/admin/aboutus">查看消息</a></li>
						<li class="@yield('bxy_24')"><a href="">发布处理结果</a></li>
					</ul>
				</li>

				{{-- 10.树洞模块 --}}
				<li class="submenu @yield('cxy_11')">
					<a href="#"><i class="icon icon-heart"></i></i> <span>树洞管理</span> <span class="label">3</span></a>
					<ul>
						<li class="@yield('bxy_25')"><a href="/admin/tree">浏览树洞</a></li>
						<li class="@yield('bxy_26')"><a href="/admin/tree/create">发表树洞</a></li>
						<li class="@yield('bxy_27')"><a href="">修改心情</a></li>
					</ul>
				</li>

		
		</div>
		{{-- 侧边结束 --}}

		@section('content_01')
		
		
		@show
			<div class="row-fluid">
				<div id="footer" class="span12">
					2019 &copy; 大迪克博客
				</div>
			</div>

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
            <script src="/backstage_public/clock_css/clock.js"></script>

            {{-- 微博关注 --}}
            <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
