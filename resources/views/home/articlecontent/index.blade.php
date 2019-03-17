@extends('home.public.header')


@section('content_01')

@if(session('acr_data_yes'))
    <script>
        alert('回复成功,返回查看');
    </script>
@endif

@if(session('acr_data_no'))
    <script>
        alert('回复失败,请重试');
    </script>
@endif

@if(session('acr_delete_yes'))
    <script>
        alert('删除成功');
    </script>
@endif


@if(session('acr_delete_no'))
    <script>
        alert('删除失败失败,请重试');
    </script>
@endif

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 80px;background-color: white;">
	<h1 style="color: #aa9144;" >
		<a href="/acm/{{ $acm_data[0]->acm_id }}/{{ $acm_datas[0]->acm_name }}/{{ $acm_data[0]->acm_name }}" style="margin-left: 100px;">{{ $acm_data[0]->acm_name }}</a>
	</h1>
</div>
<div class="container">
	{{-- 标题 --}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="mb60 text-center section-title">
                <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $am_data[0]->am_title }}</font></font></h1>
            </div>
        </div>
    </div>
	
	{{-- 内容 --}}
    <div style="width:auto;height:50px;border-top:1px #aa9144 dashed;border-bottom:1px #aa9144 dashed;">
    	<p style="margin: 10px 0px 0px 350px;float: left;"><b>发布时间:</b> {{ $am_data[0]->am_create_time }}</p>
    	<p style="margin: 10px 0px 0px 150px;float: left;"><b>作者:</b> {{ $am_data[0]->am_author }}</p>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <img src="/all_uploads/{{ $am_data[0]->am_img }}" alt="图片未加载" class="img-responsive mb30" style="width: 600px;height:300px;margin:auto;margin-top: 20px;margin-bottom: 20px;">
        <p class="lead" style="width: 1000px;margin:auto;margin-top: 20px;margin-bottom: 20px;line-height: 50px;">
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	{{ $am_data[0]->am_content }}
	    </p>
    </div>
    <div>
    	<p style="font-size: 20px;color: red;margin-left: 300px;margin-bottom: 30px;line-height: 40px;">
    		<b>复制黏贴文章不易，如果您觉得文章对你没有帮助。
    		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			打赏几百万激励下作者吧，谢谢支持！ ~(@^_^@)~！
			</b>
		</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
    	<h3 style="margin-left: 275px;">支付宝扫一扫</h3>
		<img src="/reception_public/zhifu/zhifubao.png" alt="图片未加载" style="width: 250px;height: 250px;margin-left:200px;">    	
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    	<h3 style="margin-left: 200px;">微信扫一扫</h3>
    	<img src="/reception_public/zhifu/weixin.png" alt="图片未加载" style="width: 250px;height: 250px;margin-left:120px;">
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 80px;background-color: #f0f0f0;">
		<p style="margin-left: 430px;font-size: 25px;margin-top: 30px;">广告位出租,<a href="tencent://message/?Menu=yes&uin=760811659& Service=300&sigT=45a1e5847943b64c6ff3990f8a9e644d2b31356cb0b4ac6b24663a3c8dd0f8aa12a595b1714f9d45" >点击咨询</a>
		</p>
	</div>
    

    {{-- 评论   --}}
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
	    <form action="/articlecontent/create" method="post" style="margin: 10px 0px 0px 20px;">
            {{ csrf_field() }}
            <input type="hidden" name="acr_uid" value="{{ session('uid') }}">
            <input type="hidden" name="acr_name" value="{{ session('us_name') }}">
            <input type="hidden" name="acr_am_id" value="{{ $am_data[0]->am_id }}">
		    <textarea name="acr_content" id="abc" cols="80" rows="6" style="margin-left: 80px;resize:none;border-radius: 10px;text-indent : 20px;line-height: 30px;letter-spacing:2px;" onclick="abcd();"></textarea>
	    	<input type="submit" value="回复" style="margin: 140px 0px 0px 20px;border-radius: 20px;background-color: #1E9FFF;border: none;width: 150px;height: 30px;color: white;">
	    </form>
	    <h3 style="margin: 10px 0px 0px 20px;">{{ $acr_count }} 条评论</h3>
	    {{-- 遍历 --}}
        @if($acr_data == '0')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <p style="height:1px;border:none;border-top:1px solid #555555;margin-bottom: 10px;"></p>
            </div>
        @else
            @foreach($acr_data as $k => $v)
    	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    		    <p style="height:1px;border:none;border-top:1px solid #555555;"></p>
    		    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
                    @php
                        $acr_path = DB::table('users_details')->where('uid',$v->acr_uid)->get();
                    @endphp
    		    	<img src="/all_uploads/{{ $acr_path[0]->usds_head }}" alt="图片未加载" style="width: 150px;height: 150px;border-radius: 10px;  ">
    		    </div>
    		    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
    		    	<h2 style="color: #aa9144;">{{ $v->acr_name }}</h2>
    		    	<p style="font-size: 18px;height:60px;width: 800px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $v->acr_content }}</p>
    		    	<span><b>评论时间: {{ $v->acr_time }}</b></span>
                    <a href="articlecontent/del/{{ $v->acr_id}}" style="margin-left: 20px;" 
                        {{ $v->acr_uid == session('uid') ? ' ':'hidden' }}>
                        删除
                    </a>
    		    </div>
    		</div>
            @endforeach
        @endif
    </div>
</div>
<script src="/reception_public/js/jquery.min.js"></script>
<script type="text/javascript">
    $("#abc").on('input', function(event) {
    	var aa = $("#abc").val().length;
    	if (aa > 80) {
    		alert("超出字数");
    		return false;
    		$("#abc").attr("disabled",true);
    	}
    });

    function abcd(){
        if ({{ empty(session('uid'))== null ? session('uid'):'null' }}) {
            return false;
        }else{
            alert('未登录,请登录回复');
        }

    }
</script>

@endsection




