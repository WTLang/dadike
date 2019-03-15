{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 回复管理标签 --}}
	@section('cxy_08', 'active open')
		@section('bxy_19', 'active')

@section('content_01')

<div id="content">
	<div id="content-header">
		<h1>文章回复</h1>
	</div>
	<div id="breadcrumb">
		<a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i>文章回复</a>
		<a href="#" class="current">审核回复</a>
	</div>
			
	@if (session('acr_delete_yes'))
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert">×</button>
			<strong>删除成功!</strong>
		</div>
	@endif

	@if (session('acr_delete_no'))
		<div class="alert alert-error">
			<button class="close" data-dismiss="alert">×</button>
			<strong>删除失败,请重试!</strong>
		</div>
	@endif

	<div class="span12">		
		<div class="widget-box">
			<div class="widget-title">
			<h5>友情链接</h5>
				<form action="" method="get" style="float: right;padding-top: 3px;padding-right: 3px;">
					<label>Search: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{ $request['search'] or '' }}"><button class="btn btn-info" style="float: right;padding-top: 3px;padding-right: 15px;">搜索</button></label>
				</form>
			</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<tr>
					<th>序号</th>
					<th>用户id</th>
					<th>用户名</th>
					<th>文章id</th>
					<th>回复内容</th>
					<th>回复时间</th>
					<th>操作</th>
				</tr>
				@foreach($acr_data as $k => $v)
				<tr>
					<td style="padding-left: 26px;padding-top: 18px;">{{ $v->acr_id }}</td>
					<td style="padding-left: 30px;padding-top: 18px;">{{ $v->acr_uid }}</td>
					<td style="padding-left: 25px;padding-top: 18px;width: 100px;">{{ $v->acr_name }}</td>
					<td style="padding-left: 25px;padding-top: 18px;width: 35px;">{{ $v->acr_am_id }}</td>
					<td  style="padding-left: 40px;padding-top: 18px;max-width: 300px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"  >
						<a href="javascript:;" onclick="yiru(this)" title="点击显示全部内容" class="arcm_content">{{ $v->acr_content }}</a>
					</td>
					<td style="padding-left: 80px;padding-top: 18px;">{{ $v->acr_time }}</td>
					<td style="padding-left: 35px;padding-top: 14px;">
						<form action="/admin/reply/{{ $v->acr_id }}" method="post" style="display: inline-block;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="删除" class="btn btn-danger">
						</form>
					</td>
				</tr>
				@endforeach
			</table>	 
		</div>
		<div class="pagination pagination-lg">
			{{ $acr_data->appends($request)->links() }}			
		</div>
	</div>
</div>
<script type="text/javascript">
	function yiru(obj){
		var val = $(obj).text();
		alert(val);
	}

</script>
@endsection
{{-- 后台内容填充结束 --}}