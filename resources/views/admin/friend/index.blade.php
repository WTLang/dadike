{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 友情链接标签 --}}
	@section('cxy_06', 'active open')
		@section('bxy_14', 'active')
@section('content_01')
{{-- 统计表开始 --}}
<div id="content">
	<div id="content-header">
		<h1>浏览友情链接</h1>
	</div>
	<div id="breadcrumb">
		<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i> 友情链接</a>
		<a href="javascript:;" class="current">浏览友情链接</a>
	</div>
	<div class="span12">		
		<div class="widget-box">
			<div class="widget-title">
			<h5>友情链接</h5>
			{{-- 搜索框开始 --}}
			<form action="/admin/friend" method="get" style="float: right;padding-top: 3px;padding-right: 3px;">
				<label>Search: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{ $request['search'] or '' }}" ><button class="btn btn-info" style="float: right;padding-top: 3px;padding-right: 15px;">搜索</button></label>
			</form>
			{{-- 搜索框结束 --}}
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table" >
					<thead>
					<tr>
						<th>序号</th>
						<th>网站名称</th>
						<th>网图站片</th>
						<th>网址</th>
						<th>邮箱</th>
						<th>介绍</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					@foreach($data as $k=>$v)
					<tr class="gradeX">
						<td style="padding-left:25px;padding-top:19px;">{{ $v->flk_id }}</td>
						<td style="padding-left:45px; padding-top:19px">{{ $v->flk_name }}</td>
						<td style="padding-left:10px;width:60px;height:45px;"><img src="{{ url($v->flk_image) }}" ></td>
						<td class="center" style="padding-left:60px;padding-top:19px;">{{ $v->flk_url }}</td>
						<td style="padding-left:70px;padding-top:19px;">{{ $v->flk_email }}</td>
						<td style="padding-left:15px;max-width: 55px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;padding-top:19px;">{{ $v->flk_depict }}</td>
						<td style="padding-left:30px;padding-top:19px;color:{{ $v->flk_status==0? 'red':'green' }}; ">{{ $v->flk_status==0? '待审':'通过' }}</td>
						<td style="padding-left:40px;padding-top:15px;width:150px;">
							<form action="/admin/friend/{{ $v->flk_id }}" method="post" style="display: inline-block;">
    							{{ csrf_field() }}
    						{{ method_field('DELETE') }}
    						<input type="submit" value="删除" class="btn btn-danger" >
    						</form>
    						<a href="/admin/friend/{{ $v->flk_id }}/edit" class="btn btn-warning">修改</a>
						</td>
					</tr>
						 @endforeach
				</tbody>
				</table>	 
			</div>
		</div>
	{{-- 分页开始 --}}
	<div class="pagination alternate">
		{{ $data->appends($request)->links() }}
	</div> 
	{{-- 分页结束 --}}
</div>
@endsection
{{-- 后台内容填充结束 --}}