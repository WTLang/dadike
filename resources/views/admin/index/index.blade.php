{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

@section('cxy_01', 'active')
@section('cxy_02', 'active')
@section('cxy_03', 'active')
@section('cxy_04', 'active')
@section('cxy_05', 'active')
@section('cxy_06', 'active')
@section('cxy_07', 'active')
@section('cxy_08', 'active')
@section('cxy_09', 'active')
@section('cxy_10', 'active')


@section('content_01')
		{{-- 统计表开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>大迪克</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="消息" style="width: 60px;">
						<i class="icon-comment"></i>
						<span class="label label-important" style="width: 20px;">0</span>
					</a>
					<!-- <a class="btn btn-large tip-bottom" title="管理文件"><i class="icon-file"></i></a> -->
					<!-- <a class="btn btn-large tip-bottom" title="管理用户"><i class="icon-user"></i></a> -->
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>分析</a>
				<a href="#" class="current">仪表盘</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">

					<!-- 最新发帖开始 -->
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title"><span class="icon"><i class="icon-file"></i></span><h5>最新发帖</h5><span title="54 total posts" class="label label-info tip-left">54</span></div>
							<div class="widget-content nopadding">
								<ul class="recent-posts">
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av2.jpg" />
										</div>
										<div class="article-post">
											<span class="user-info"> By: neytiri on 2 Aug 2012, 09:27 AM, IP: 186.56.45.7 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Publish</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av3.jpg" />
										</div>
										<div class="article-post">
											<span class="user-info"> By: john on on 24 Jun 2012, 04:12 PM, IP: 192.168.24.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Publish</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av1.jpg" />
										</div>
										<div class="article-post">
											<span class="user-info"> By: michelle on 22 Jun 2012, 02:44 PM, IP: 172.10.56.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Publish</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li class="viewall">
										<a title="View all posts" class="tip-top" href="#"> + 查看全部 + </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- 最新发帖结束 -->

					<!-- 最新评论开始 -->
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title"><span class="icon"><i class="icon-comment"></i></span><h5>最新评论</h5><span title="88 total comments" class="label label-info tip-left">88</span></div>
							<div class="widget-content nopadding">
								<ul class="recent-comments">
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av1.jpg" />
										</div>
										<div class="comments">
											<span class="user-info"> User: michelle on IP: 172.10.56.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Approve</a> <a href="#" class="btn btn-warning btn-mini">Mark as spam</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av3.jpg" />
										</div>
										<div class="comments">
											<span class="user-info"> User: john on IP: 192.168.24.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Approve</a> <a href="#" class="btn btn-warning btn-mini">Mark as spam</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<img width="40" height="40" alt="User" src="/backstage_public/img/demo/av2.jpg" />
										</div>
										<div class="comments">
											<span class="user-info"> User: neytiri on IP: 186.56.45.7 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-mini">Edit</a> <a href="#" class="btn btn-success btn-mini">Approve</a> <a href="#" class="btn btn-warning btn-mini">Mark as spam</a> <a href="#" class="btn btn-danger btn-mini">Delete</a>
										</div>
									</li>
									<li class="viewall">
										<a title="View all comments" class="tip-top" href="#"> + 查看全部 + </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					{{-- 最新评论开始 --}}

				</div>
				<div class="row-fluid">
					<div id="footer" class="span12">
						2019 &copy; 大迪克博客</a>
					</div>
				</div>
			</div>
		</div>
		{{-- 统计表结束 --}}
@endsection
{{-- 后台内容填充结束 --}}