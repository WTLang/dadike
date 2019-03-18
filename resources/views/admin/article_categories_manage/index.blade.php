{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章分类标签 --}}
	@section('cxy_04', 'active open')
		@section('bxy_08', 'active')

@section('content_01')
{{-- 文章分类首页开始 --}}
<div id="content">
	<div id="content-header">
		<h1>大迪克 </h1>
	</div>
	<div id="breadcrumb">
		<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>文章分类</a>
		<a href="javascript:;" class="current">浏览分类</a>
	</div>
	
	@if (session('sort_success'))
	<div class="alert alert-success alert-block">
		<button class="close" data-dismiss="alert">×</button>
		<strong>添加成功!</strong>
	</div>
	@endif

	@if (session('sonsort_error'))
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">×</button>
		<strong>发生错误!</strong> 有子分类不能删除.
	</div>
	@endif
	
	@if (session('sonsort_success'))
	<div class="alert alert-success alert-block">
		<button class="close" data-dismiss="alert">×</button>
		<strong>删除成功!</strong>
	</div>
	@endif

	@if (session('acm_updata_success'))
	<div class="alert alert-success alert-block">
		<button class="close" data-dismiss="alert">×</button>
		<strong>修改成功!</strong>
	</div>
	@endif
	<div class="widget-box span12">
		<div class="widget-title">
			<h5>分类列表</h5>
		</div>
		<div class="widget-content nopadding">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
				<table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
				<thead>
					<tr role="row">
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 224px;">
							<div class="DataTables_sort_wrapper">
								ID<span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span>
							</div>
						</th>
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 399px;">
							<div class="DataTables_sort_wrapper">
								分类名称<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">
							<div class="DataTables_sort_wrapper">
								所属分类ID<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;">
							<div class="DataTables_sort_wrapper">
								分类路径<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;">
							<div class="DataTables_sort_wrapper">
								状态<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						<th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;">
							<div class="DataTables_sort_wrapper">
								操作<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
					</tr>
				</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($data as $k => $v)
				<tr class="gradeA odd">
					<td>{{ $v->acm_id 		}}</td>
					<td>{{ $v->acm_name 	}}</td>
					<td>{{ $v->acm_pid 		}}</td>
					<td>{{ $v->acm_path 	}}</td>
					<td style="color: green;">{{ $v->acm_status == 1 ? '已激活' : '静止'}}</td>
					<td >
						<form action="/admin/acm/{{ $v->acm_id }}/edit" method="get" >
							<input type="submit" value="修改" class="btn btn-primary btn-mini" style="float: left;margin-right: 3px;width: 68px;">
						</form>
						<form action="/admin/acm/{{ $v->acm_id }}" method="post" >
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="删除" class="btn btn-danger btn-mini" style="width: 68px;">
						</form>
						<a href="/admin/acm/create/{{ $v->acm_id }}" class="btn btn-inverse btn-mini {{ $v->acm_pid == 0 ? ' ':'hidden' }}" style="margin-top: 4px;width: 120px;"  >添加子分类</a>
					</td>
				</tr>
				@endforeach
				</tbody>
				</table>
			</div>
		</div>
	</div>
{{-- 文章分类首页结束 --}}
@endsection
{{-- 后台内容填充结束 --}}