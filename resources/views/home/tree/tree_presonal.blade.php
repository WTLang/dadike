@extends('home.public.header')

@section('content_01')
{{-- 显示错误信息 --}}
<div class="comments-area">
    <h1 class="reply-title" style="margin-top:10px; padding-left:678px">我的发表</h1></br>
@if (session('success'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert">×</button>
    <strong>删除成功！</strong>
</div>
    @endif
        <ul class="comment-list">
            <li class="comment">
                {{-- 树洞遍历 --}}
                @foreach($tree_data as $k=>$v)
                <div class="comment-body">
                    <div class="comment-author">
                        <img src="/all_uploads/{{ $v->usds_head }}" alt="" class="img-circle" style="width:80px;height:80px">
                    </div>
                    <div class="comment-info">
                        <div class="comment-header">
                            <div class="comment-meta"><span class="comment-meta-date pull-right">{{ $v->created_at }} </span></div>
                            <h4 class="user-title">{{ $v->us_name }}</h4>
                        </div>
                        <div class="comment-content">
                            <p style="width:1180px">{{ $v->trd_content }}</p>
                        </div>
                            <a href="javaScript:;" class="btn btn-default">赞 &nbsp {{ $v->trd_good }}</a>
                            <a href="javaScript:;" class="btn btn-default">踩 &nbsp {{ $v->trd_bad }}</a>
                        <form action="/tree/{{ $v->trd_id }}" method="post" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删 &nbsp除" class="btn btn-danger" >
                        </form>
                    </div>
                </div>
                @endforeach
                {{-- 分页开始 --}}
                <div class="pagination alternate">
                {{ $tree_data->links() }}
                </div> 
                {{-- 分页结束 --}}
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $("#textarea").on('input', function(event) {
        var aa = $("#textarea").val().length;
        if (aa > 225) {
            alert("超出字数");
            return false;
            $("#textarea").attr("disabled",true);
        }
    });
</script>
@endsection