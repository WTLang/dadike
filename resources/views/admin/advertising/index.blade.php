{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 广告管理标签 --}}
	@section('cxy_09', 'active open')
		@section('bxy_20', 'active')
@section('content_01')
<div id="content">
	<div id="content-header">
		<h1>浏览广告</h1>
	</div>
	<div id="breadcrumb">
		<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i>广告管理</a>
		<a href="#" class="current">浏览广告</a>
	</div>
		@if (session('success'))
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert">×</button>
			<strong>修改成功！</strong>
		</div>
		@endif
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<h5>浏览广告</h5>
					{{-- 搜索框开始 --}}
					<form action="/admin/advertising" method="get" style="float: right;padding-top: 3px;padding-right: 3px;">
						Search: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{ $request['search'] or '' }}" ><button class="btn btn-info" style="float: right;padding-top: 3px;padding-right: 15px;">搜索</button>

					</form>
					{{-- 搜索框结束 --}}
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered data-table" >
						<thead>
						<tr>
							<th>序号</th>
							<th>广告名称</th>
							<th>图片</th>
							<th>广告链接地址</th>
							<th>联系人</th>
							<th>联系人电话</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
						@foreach($data as $k=>$v)
						<tr class="gradeX">
							<td style="padding-left:22px;padding-top:19px">{{ $v->ad_id }}</td>
							<td style="padding-left:25px;padding-top:19px">{{ $v->ad_name }}</td>
							<td style="padding-left:40px;padding-top:5px"><img src="/all_uploads/{{ $v->ad_image }}"  style="height:50px; width=:80px" ></td>
							<td class="center" style="padding-left:52px;padding-top:19px">{{ $v->ad_url }}</td>
							<td style="padding-left:30px;padding-top:19px">{{ $v->ad_people }}</td>
							<td style="padding-left:50px;padding-top:19px">{{ $v->ad_phone }}</td>
							<td style="padding-left:30px;padding-top:19px;color:{{ $v->ad_status==0? 'red':'green' }};">{{ $v->ad_status==0? '待审':'通过' }}</td>
							<td style="padding-left:52px;padding-top:15px">
								<form action="/admin/advertising/{{ $v->ad_id }}" method="post" style="display: inline-block;">
        							{{ csrf_field() }}
        						{{ method_field('DELETE') }}
        							<input type="submit" value="删除" class="btn btn-danger" >
        						</form>
        						<a href="/admin/advertising/{{ $v->ad_id }}/edit" class="btn btn-warning">修改</a>
        						<a href="/admin/advertising/{{ $v->ad_id }}" class="btn btn-primary">发布/关闭</a>
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