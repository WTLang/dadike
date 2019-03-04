{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 仪表盘标签 --}}
	@section('cxy_01', '')	
		@section('bxy_01', '')
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
	@section('cxy_04', 'active open')
		@section('bxy_08', 'active')
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
		{{-- 文章分类首页开始 --}}
		
		

		<div id="content">
			<div id="content-header">
				<h1>大迪克 </h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="消息" style="width: 60px;">
						<i class="icon-comment"></i>
						<span class="label label-important" style="width: 20px;">0</span>
					</a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>文章分类</a>
				<a href="/admin/index" class="current">浏览分类</a>
			</div>
			
			@if (session('sort_success'))
				<div class="rt-success alert-block">
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
								<a href="/admin/acm/create/{{ $v->acm_id }}" class="btn btn-inverse btn-mini" style="margin-top: 4px;width: 120px;">添加子分类</a>
							</td>
						</tr>
							@php  
								$data_01 = $v->one
							@endphp
							@foreach($data_01 as $kk => &$vv)
								@if ($kk == 'two')
									@php
						            	continue;
						            @endphp
						        @else
						            <tr class="gradeA odd">
										<td>{{ $vv->acm_id 		}}</td>
										<td>{{ $vv->acm_name 	}}</td>
										<td>{{ $vv->acm_pid 		}}</td>
										<td>{{ $vv->acm_path 	}}</td>
										<td style="color: green;">{{ $vv->acm_status == 1 ? '已激活' : '静止'}}</td>
										<td >
											<form action="/admin/acm/{{ $vv->acm_id }}/edit" method="get" >
												<input type="submit" value="修改" class="btn btn-primary btn-mini" style="float: left;margin-right: 3px;width: 68px;">
											</form>
											<form action="/admin/acm/{{ $vv->acm_id }}" method="post" >
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<input type="submit" value="删除" class="btn btn-danger btn-mini" style="width: 68px;">
											</form>
										</td>
									</tr>
						        @endif
							@endforeach
						@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
		{{-- 文章分类首页结束 --}}
@endsection
{{-- 后台内容填充结束 --}}