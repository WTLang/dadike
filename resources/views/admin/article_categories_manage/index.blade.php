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
		{{-- 统计表开始 --}}
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
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>文章分类</a>
				<a href="/admin/index" class="current">浏览分类</a>
			</div>

<div class="widget-box span12">
	<div class="widget-title">
	<h5>Dynamic table</h5>
	</div>
	<div class="widget-content nopadding">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class=""><div id="DataTables_Table_0_length" class="dataTables_length"><label>Show <div class="select2-container" id="s2id_autogen1">    <a href="#" onclick="return false;" class="select2-choice" tabindex="0">   <span>10</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   <div><b></b></div></a><div class="select2-drop select2-with-searchbox select2-offscreen" style="display: block;">   <div class="select2-search">       <input type="text" autocomplete="off" class="select2-input" tabindex="0">   </div>   <ul class="select2-results"></ul></div>    </div><select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" style="display: none;"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
	<thead>
	<tr role="row"><th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 224px;"><div class="DataTables_sort_wrapper">Rendering engine<span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span></div></th><th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 399px;"><div class="DataTables_sort_wrapper">Browser<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div></th><th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;"><div class="DataTables_sort_wrapper">Platform(s)<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div></th><th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 181px;"><div class="DataTables_sort_wrapper">Engine version<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div></th></tr>
	</thead>

	<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="gradeA odd">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Firefox 1.0</td>
	<td class=" ">Win 98+ / OSX.2+</td>
	<td class="center ">1.7</td>
	</tr><tr class="gradeA even">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Firefox 1.5</td>
	<td class=" ">Win 98+ / OSX.2+</td>
	<td class="center ">1.8</td>
	</tr><tr class="gradeA odd">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Firefox 2.0</td>
	<td class=" ">Win 98+ / OSX.2+</td>
	<td class="center ">1.8</td>
	</tr><tr class="gradeA even">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Firefox 3.0</td>
	<td class=" ">Win 2k+ / OSX.3+</td>
	<td class="center ">1.9</td>
	</tr><tr class="gradeA odd">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Camino 1.0</td>
	<td class=" ">OSX.2+</td>
	<td class="center ">1.8</td>
	</tr><tr class="gradeA even">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Camino 1.5</td>
	<td class=" ">OSX.3+</td>
	<td class="center ">1.8</td>
	</tr><tr class="gradeA odd">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Netscape 7.2</td>
	<td class=" ">Win 95+ / Mac OS 8.6-9.2</td>
	<td class="center ">1.7</td>
	</tr><tr class="gradeA even">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Netscape Browser 8</td>
	<td class=" ">Win 98SE+</td>
	<td class="center ">1.7</td>
	</tr><tr class="gradeA odd">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Netscape Navigator 9</td>
	<td class=" ">Win 98+ / OSX.2+</td>
	<td class="center ">1.8</td>
	</tr><tr class="gradeA even">
	<td class="  sorting_1">Gecko</td>
	<td class=" ">Mozilla 1.0</td>
	<td class=" ">Win 95+ / OSX.1+</td>
	<td class="center ">1</td>
	</tr></tbody></table><div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label></div><div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate"><a tabindex="0" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_first">First</a><a tabindex="0" class="previous fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_previous">Previous</a><span><a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1</a><a tabindex="0" class="fg-button ui-button ui-state-default">2</a><a tabindex="0" class="fg-button ui-button ui-state-default">3</a><a tabindex="0" class="fg-button ui-button ui-state-default">4</a><a tabindex="0" class="fg-button ui-button ui-state-default">5</a></span><a tabindex="0" class="next fg-button ui-button ui-state-default" id="DataTables_Table_0_next">Next</a><a tabindex="0" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" id="DataTables_Table_0_last">Last</a></div></div></div>  
	</div>
</div>




		{{-- 统计表结束 --}}

@endsection
{{-- 后台内容填充结束 --}}