{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 树洞链接标签 --}}
	@section('cxy_11', 'active open')
	@section('bxy_25', 'active')

@section('content_01')
		{{-- 统计表开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>浏览树洞</h1>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i> 树洞管理</a>
				<a href="#" class="current">浏览树洞</a>
			</div>
				<div class="span12">		
						<div class="widget-box">
							<div class="widget-title">
							<h5>友情链接</h5>
							{{-- 搜索框开始 --}}
							<form action="/admin/tree" method="get" style="float: right;padding-top: 3px;padding-right: 3px;">
								<label>Search: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{ $request['search'] or '' }}" ><button class="btn btn-info" style="float: right;padding-top: 3px;padding-right: 15px;">搜索</button></label>
							</form>
							{{-- 搜索框结束 --}}
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered data-table" >
									<thead>
									<tr>
									<th>序号</th>
									<th>用户名</th>
									<th>树洞内容</th>
									<th>点赞数量</th>
									<th>踩赞数量</th>
									<th>发布时间</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									@foreach($tree_data as $k=>$v)
									<tr class="gradeX">
									<td style="padding-left:23px;padding-top:28px;width:25px">{{ $v->trd_id }}</td>
									<td style="padding-left:25px; padding-top:28px;width:69px;">{{ $v->us_name }}</td>
									<td style="padding-left:10px;max-width: 55px;height:45px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;padding-top:28px;">{{ $v->trd_content }}</td>
									<td class="center" style="width:50px;padding-top:28px">{{ $v->trd_good }}</td>
									<td class="center" style="width:50px;padding-top:28px">{{ $v->trd_bad }}</td>
									<td class="center" style="padding-left:6px;padding-top:27px;width:131px;">{{ $v->created_at }}</td>
									<td style="width:50px;">
									<form action="/admin/tree/{{ $v->trd_id }}" method="post" style="display: inline-block;">
            							{{ csrf_field() }}
            						{{ method_field('DELETE') }}
            						<input type="submit" value="删除" class="btn btn-danger" style="margin-top:13px">
            						</form>
									</td>
									</tr>
           							 @endforeach
									</tbody>
									</table>	 
								</div>
							</div>
								{{-- 分页开始 --}}
								<div class="pagination alternate">
 								{{ $tree_data->links() }}
 								</div> 
 								{{-- 分页结束 --}}
						</div>
		{{-- 统计表结束 --}}
@endsection
{{-- 后台内容填充结束 --}}