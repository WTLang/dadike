{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
@section('cxy_02', 'active open')
		@section('bxy_04', 'active')
@section('content_01')
		{{-- 用户表开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>大迪克</h1>
				<div class="btn-group">
					<a class="btn btn-large btn-primary" title="" style="width: 75px;" href="/admin/admin/create">添加管理员
					</a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-user"></i>用户管理</a>
				<a href="javascript:;" class="current">管理员管理</a>
			</div>
			<div class="widget-box">
			<div class="widget-title">
				{{-- 搜索框 --}}
				<form action="/admin/admin" method="get">
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
			@if (session('success'))
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<strong>操作成功!</strong>
				</div>
			@endif
			
				<div class="widget-content nopadding">

					<table class="table table-bordered data-table">
						<thead>
						<tr>
							<th>管理员id</th>
							<th>名称</th>
							<th>电子邮箱</th>
							<th>管理员等级</th>
							<th>注册时间</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						{{-- 遍历会员 --}}
						@foreach($admindata as $k=>$v)
						<tr class="gradeX">
							<td>{{ $v->id }}</td>
							<td>{{ $v->admin_name }}</td>
							<td>{{ $v->admin_email }}</td>
							@if($v->identify == 1)
							<td>文章管理员</td>
							@elseif($v->identify == 2)
							<td>用户管理员</td>
							@else
							<td>超级管理员</td>
							@endif
							<td>{{ $v->created_at }}</td>
							<td>
								<a href="/admin/admin/edit/{{$v->id}}" class="btn btn-primary"class="btn btn-success">修改</a>
								<a href="/admin/admin/role/{{$v->id}}" class="btn btn-warning">角色</a>
								<a href="/admin/admin/editpass/{{$v->id}}" class="btn btn-info">密码</a>
								@if($v->identify != 3)
								<a href="/admin/admin/del/{{$v->id}}" class="btn btn-danger" onclick="return confirm('确定删除吗?')"> 删除</a>
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
 				{{ $admindata->appends($request)->links() }}
			</div>
			{{-- 页码结束 --}}

@endsection
{{-- 后台内容填充结束 --}}