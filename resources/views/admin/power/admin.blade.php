{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_12', 'active open')
		@section('bxy_28', 'active')

@section('content_01')
	<div id="content">
	{{-- 管理员表开始 --}}
		<div id="content-header">
				<h1>大迪克</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="消息" style="width: 60px;">
						<i class="icon-comment"></i>
						<span class="label label-important" style="width: 20px;">0</span>
					</a>
				</div>
			</div>
				<button class="btn btn-large btn-primary" style="margin-left: 10px;" id="b_roles" onmouseover="roles()">角色列表</button>
				<button class="btn btn-large btn-success" id="b_nodes" onmouseover="nodes()">权限节点列表</button>
			@if (session('asuccess'))
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<strong>添加成功!</strong>
				</div>
			@endif

			@if (session('aerror'))
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">×</button>
					<strong>添加失败!</strong>
				</div>
			@endif
			@if (session('esuccess'))
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<strong>修改成功!</strong>
				</div>
			@endif
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-user"></i>用户管理</a>
				<a href="/admin/index" class="current">管理员</a>
			</div>
		<div class="widget-box" id="roles">
			<div class="widget-title">
				<h5>名称表</h5>
			</div>
			<div class="widget-content nopadding" >
				<table class="table table-bordered data-table">
					<thead>
					<tr>
						<th>id</th>
						<th>角色名称</th>
						<th>权限</th>
					</tr>
					</thead>
					<tbody>
					@foreach($roles_data as $k=>$v)
					<tr class="gradeX">
						<td>{{$v->id}}</td>
						<td>{{$v->rname}}</td>
						<td>
							<a href="/admin/nodes/{{ $v->id }}/edit" class="btn btn-success">权限节点</a>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>  
			</div>
		</div>

		<div class="widget-box" id="nodes" hidden>
			<div class="widget-title">
				<h5>权限节点列表</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
					<tr>
						<th>id</th>
						<th>节点描述</th>
						<th>节点控制器名称</th>
						<th>节点方法名称</th>
					</tr>
					</thead>
					<tbody>
					@foreach($nodes_data as $k=>$v)
					<tr class="gradeX">
						<td>{{$v->id}}</td>
						<td>{{$v->ndesc}}</td>
						<td>{{$v->cname}}</td>
						<td>{{$v->aname}}</td>
					</tr>
					@endforeach
					</tbody>
				</table>  
			</div>
		</div>
	</div>
@endsection
{{-- 后台内容填充结束 --}}
<script type="text/javascript">
	function roles(){
		$('#roles').show();
		$('#nodes').hide();
	}
	function nodes(){
		$('#roles').hide();
		$('#nodes').show();
	}
</script>