{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 仪表盘标签 --}}
	@section('cxy_01', 'active open')	
		@section('bxy_01', 'active')
		@section('bxy_02', '')

{{-- 用户管理标签 --}}
	@section('cxy_02', '')
		@section('bxy_03', '')
		@section('bxy_04', '')

{{-- 文章管理标签 --}}
	@section('cxy_03', '')
		@section('bxy_05', '')
		@section('bxy_06', '')
		@section('bxy_07', '')

{{-- 文章分类标签 --}}
	@section('cxy_04', '')
		@section('bxy_08', '')
		@section('bxy_09', '')
		@section('bxy_10', '')

{{-- 文章排行标签 --}}
	@section('cxy_05', '')
		@section('bxy_11', '')
		@section('bxy_12', '')
		@section('bxy_13', '')

{{-- 友情链接标签 --}}
	@section('cxy_06', '')
		@section('bxy_14', '')
		@section('bxy_15', '')
		@section('bxy_16', '')

{{-- 用户权限标签 --}}
	@section('cxy_07', '')
		@section('bxy_17', '')
		@section('bxy_18', '')

{{-- 评论管理标签 --}}
	@section('cxy_08', '')
		@section('bxy_19', '')

{{-- 广告管理标签 --}}
	@section('cxy_09', '')
		@section('bxy_20', '')
		@section('bxy_21', '')
		@section('bxy_22', '')

{{-- 用户管理标签 --}}
	@section('cxy_10', '')
		@section('bxy_23', '')
		@section('bxy_24', '')


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
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>分析</a>
				<a href="/admin/index" class="current">本站</a>
			</div>
		


		<div class="span12">
			<div class="row-fluid">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-home"></i>
						</span>
						<h5>本站信息</h5>
					</div>
					<div class="widget-content">
						<div class="invoice-content">
							<div class="invoice-head">
								<div class="invoice-meta">
									 <span class="invoice-number">大迪克 </span><span class="invoice-date">创建时间: 2019-2-25</span>
								</div>
								<h5>网站类型:技术博客</h5>
								<div class="invoice-to">
									<ul>
										<li>
										<span><strong>成员:</strong></span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;后端主管:吴亮</span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;前端主管:黄汉豪</span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;网页架构:萧瑞泽</span>
										</li>
									</ul>
								</div>
								<div class="invoice-from">
									<ul>
										<li>
										<span><strong>致谢:</strong></span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;项目经理:林峰</span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;前讲师:王猛</span>
										<span>&nbsp;&nbsp;&nbsp;&nbsp;后讲师:刘春</span>
										</li>
									</ul>
								</div>
							</div>
							<div>
								<table class="table table-bordered">
								<thead>

								<tr>
									<th colspan="3">关于本站</th>
								</thead>
								<tfoot>

								</tfoot>
								<tbody>

								<tr>
									<td>
										网站名称
									</td>
									<td>
										大迪克
									</td>
								</tr>

								<tr>
									<td>
										网站类型
									</td>
									<td>
										技术博客
									</td>
								</tr>

								<tr>
									<td>
										备案号
									</td>
									<td>
										京公网安备00000000000000号
									</td>
								</tr>

								<tr>
									<td>
										联系号码
									</td>
									<td>
										13513513513
									</td>
								</tr>

								<tr>
									<td>
										网站地址
									</td>
									<td>
										http://dadike.com
									</td>
								</tr>

								</tbody>
								</table>
							</div>
							
							<h5>Do you know?</h5>
							<p>
								There's nothing special about what's in here.
							</p>
							<p class="help-block">
								<strong>Note:</strong> This line of English is just for good looking,
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		{{-- 统计表结束 --}}

@endsection
{{-- 后台内容填充结束 --}}