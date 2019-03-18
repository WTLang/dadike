{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_12', 'active open')
		@section('bxy_28', 'active')

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
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-user"></i>权限管理</a>
				<a href="/admin/index" class="current">角色管理</a>
			</div>
			<div class="widget-box">
				<div class="widget-content nopadding">
				<form action="/admin/nodes/{{ $role->id }}" method="post" class="form-horizontal" />
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="control-group">
						<label class="control-label">角色名称</label>
						<div class="controls">
							<input type="text" value="{{ $role->rname }}" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">权限的节点</label>
						<div class="controls">
							@foreach($nodes_data as $k=>$v)
							<label><input type="checkbox" name="nids[]" value="{{ $v->id }}" @if(in_array($v->id,$role_nodes_data_nid)) checked @endif/>{{ $v->ndesc }}</label>
							@endforeach
						</div>
					</div>
					<div class="control-group">
						<input type="submit" name="" value="提交" class="btn btn-success btn-large" style="float: right;">
					</div>
				</form>
					
				</div>
			</div>
			{{-- 用户表结束 --}}
@endsection
{{-- 后台内容填充结束 --}}