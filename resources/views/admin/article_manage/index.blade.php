{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章管理标签 --}}
	@section('cxy_03', 'active open')
		@section('bxy_05', 'active')

@section('content_01')
		{{-- 文章添加首页开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>大迪克</h1>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>文章管理</a>
				<a href="/admin/index" class="current">浏览文章</a>
			</div>
		@if (session('article_manage_success'))
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">×</button>
				<strong>添加成功!</strong>
			</div>
		@endif

		@if (session('article_update_success'))
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">×</button>
				<strong>修改成功!</strong>
			</div>
		@endif

		@if (session('article_delete_success'))
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">×</button>
				<strong>添加成功!</strong>
			</div>
		@endif

		@if (session('article_delete_error'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>删除失败!</strong>
			</div>
		@endif

<div class="widget-box span12">
		<div class="widget-title">
			<h5>添加文章</h5>
		{{-- 搜索框开始 --}}
			<form action="/admin/am" method="get" style="float: right;padding-top: 3px;padding-right: 3px;">
				Search: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{ $request['search'] or '' }}" ><button class="btn btn-info" style="float: right;padding-top: 3px;padding-right: 15px;">搜索</button>
			</form>
		{{-- 搜索框结束 --}}
		</div>
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
		<table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
			<thead>
				<tr role="row">
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">
						<div class="DataTables_sort_wrapper">
							ID<span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">
						<div class="DataTables_sort_wrapper">
							文章标题<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">
						<div class="DataTables_sort_wrapper">
							作者<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 150px;">
						<div class="DataTables_sort_wrapper">
							发表时间<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;">
						<div class="DataTables_sort_wrapper">
							封面图路径<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">
						<div class="DataTables_sort_wrapper">
							一级分类id<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;">
						<div class="DataTables_sort_wrapper">
							文章内容<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 70px;">
						<div class="DataTables_sort_wrapper">
							状态<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>
					<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 130px;">
						<div class="DataTables_sort_wrapper">
							操作<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
						</div>
					</th>

				</tr>
				</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($data as $k => $v)
				<tr class="gradeA odd">
					<td style="padding-top: 35px;padding-left: 20px;">{{ $v->am_id }}</td>
					<td style="padding-top: 35px;padding-left: 20px;">{{ $v->am_title }}</td>
					<td style="padding-top: 35px;padding-left: 20px;">{{ $v->am_author }}</td>
					<td style="padding-top: 35px;padding-left: 30px;">{{ $v->am_create_time }}</td>
					<td>
						<img src="/all_uploads/{{ $v->am_img }}" style="width: 75px;height:40px;padding-top: 15px;padding-left: 13px;">
					</td>
					<td style="width:20px;padding-top: 35px;padding-left: 55px;">{{ $v->am_acm_id }}</td>
					<td style="max-width: 30px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;padding-top: 35px;padding-left: 20px;padding-right: 20px;">{{ $v->am_content }}</td>
					<td style="width:10px;padding-top: 35px;padding-left: 10px;color: {{ $v->am_status == 0 ? 'red':'green' }} ;">{{ $v->am_status == 0 ? '未发布':'已发布' }}</td>
					<td style="padding-top: 5px;">
						<a href="/admin/am/{{ $v->am_id }}" class="btn btn-primary" style="margin-bottom: 5px;width: 110px;">发布/关闭</a>
						
						<a href="/admin/am/{{ $v->am_id }}/edit" class="btn btn-primary" style="float: right;">修改</a>
						<form action="/admin/am/{{ $v->am_id }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" class="btn btn-danger" value="删除" style="width: 55px;color: white;">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		<div class="pagination pagination-lg">
			{{ $data->appends($request)->links() }}			
		</div>
</div>
		{{-- 文章添加首页结束 --}}
@endsection
{{-- 后台内容填充结束 --}}