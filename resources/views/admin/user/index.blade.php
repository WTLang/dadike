{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_02', 'active open')
		@section('bxy_03', 'active')

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
				<form action="/admin/user" method="get">
				<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
					<div class="dataTables_filter" id="DataTables_Table_0_filter">
						<label>Search: 
							<input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ $request['search'] or '' }}">
						<input type="submit" value="搜索" class="btn btn-info">
						</label>
					</div>
				</div>
				</form>
				{{-- 搜索框结束 --}}

			</div>
				<div class="widget-content nopadding">
					@if (session('success'))
						<div class="alert alert-success">
							<button class="close" data-dismiss="alert">×</button>
							<strong>操作成功!</strong>
						</div>
					@endif
					<table class="table table-bordered data-table">
						<thead>
						<tr>
							<th>用户id</th>
							<th>用户名</th>
							<th>手机号</th>
							<th>电子邮箱</th>
							<th>注册时间</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						{{-- 遍历会员 --}}
						@foreach($userdata as $k=>$v)
						<tr class="gradeX">
							<td>{{ $v->uid }}</td>
							<td>{{ $v->us_name }}</td>
							<td>{{ $v->us_tel }}</td>
							<td>{{ $v->us_email }}</td>
							<td>{{ $v->created_at }}</td>
							<td>
								@if($v->identify == 0)
								<a href="/admin/user/ban/{{$v->uid}}" class="btn btn-success"  value="{{$v->id}}" onclick="return confirm('确定封号吗?')"> 状态:正常</a>
								@else
								<a href="/admin/user/res/{{$v->uid}}" class="btn btn-danger"  value="{{$v->id}}" onclick="return confirm('确定解封吗?')"> 状态:封禁</a>
								@endif
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>  
				</div>
			</div>
			{{-- 用户表结束 --}}


			{{-- 页码 --}}
			<div class="pagination pagination-lg " style="float: right;">
 				{{ $userdata->appends($request)->links() }}
			</div>
			{{-- 页码结束 --}}

@endsection
{{-- 后台内容填充结束 --}}