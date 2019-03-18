@extends('home.public.header')

@section('content_01')
    {{-- 显示错误信息 --}}
    <div class="comments-area">
    <h1 class="reply-title" style="margin-top:10px; padding-left:678px;">我的发表</h1></br>
    <hr>
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
                    <div class="comment-author" style="padding-left: 155px"><img src="/all_uploads/{{ $v->usds_head }}" alt="" class="img-circle" style="width:80px;height:80px"> </div>
                    <div class="comment-info">
                        <div class="comment-header">
                            <h4 class="user-title" style="padding-left: 155px">{{ $v->us_name }}</h4>
                        </div>
                        <div class="comment-content">
                            <p style="width:1100px;padding-left:155px">{{ $v->trd_content }}</p>
                        </div>
                        <a href="javascript:;" class="btn btn-default" style="margin-left: 150px">赞 &nbsp {{ $v->trd_good }}</a>
                        <a href="javascript:;" class="btn btn-default">踩 &nbsp {{ $v->trd_bad }}</a>
                        <form action="/tree/{{ $v->trd_id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="删 &nbsp除" class="btn btn-danger" >
                        </form>
                        <span class="comment-meta-date pull-right" style="color:black;padding-right: 305px;padding-top:10px">{{ $v->created_at }} </span>
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
@endsection