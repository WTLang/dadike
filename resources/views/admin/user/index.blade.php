{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_02', 'active open')
		@section('bxy_03', '')
		@section('bxy_04', 'active')

@section('content_01')
		{{-- 用户表开始 --}}
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
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-user"></i>用户管理</a>
				<a href="/admin/index" class="current">会员管理</a>
			</div>
			<div class="widget-box">
			<div class="widget-title">

				{{-- 搜索框 --}}
				<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
					<div class="dataTables_filter" id="DataTables_Table_0_filter">
						<label>Search: 
							<input type="text" aria-controls="DataTables_Table_0" />
						</label>
					</div>
					
				</div>
				{{-- 搜索框结束 --}}

			</div>
				<div class="widget-content nopadding">

					<table class="table table-bordered data-table">
						<thead>
						<tr>
							<th>用户id</th>
							<th>用户名</th>
							<th>手机号</th>
							<th>电子邮箱</th>
							<th>状态</th>
							<th>身份</th>
							<th>注册时间</th>
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
							<td>123</td>
							<td>InternetExplorer</td>
							<td>13580339679</td>
							<td>nopysiu@gmail.com</td>
							<td>在线</td>
							<td>会员</td>
							<td class="center">2018-2-26</td>
						</tr>
						</tbody>
					</table>  
				</div>
			</div>
			{{-- 用户表结束 --}}

			{{-- 页码 --}}
			<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
				<a tabindex="0" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_first">First</a>
				<a tabindex="0" class="previous fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_previous">Previous</a>
				<span>
					<a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1
					</a>
				</span>
				<a tabindex="0" class="next fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_next">Next</a>
				<a tabindex="0" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_last">Last</a>
			</div>
			{{-- 页码结束 --}}

@endsection
{{-- 后台内容填充结束 --}}