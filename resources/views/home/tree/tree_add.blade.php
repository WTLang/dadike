@extends('home.public.header')

@section('content_01')
<div class="leave-comments" style="height:350px;margin-top:0px;width:1000px;margin-left:230px">
    {{-- 显示错误信息 --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger" style="margin-top:-40px;height:55px;margin-left:-40px;width:1000px;padding-left:42px">
                <button class="close" data-dismiss="alert">×</button>
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" style="margin-top:-40px;height:55px;margin-left:-40px;width:1000px;padding-left:42px">
        <button class="close" data-dismiss="alert">×</button>
        <strong>添加成功！</strong>
    </div>
    @endif
    <h2 class="reply-title" style="margin-top:-21px">发表树洞</h2>
    <form class="reply-form" action="/tree" method="post" enctype="multipart/form-data"/>
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="textarea">分享你的故事</label>
                    <div>
                    <textarea class="form-control" id="textarea" name="trd_content" rows="6" placeholder="请填写要发表的内容"></textarea>
                    <p style="margin-top:-22px;padding-left: 850px"><span id="text-count">500</span>/500</p>
                    </div>
                    <input type="text" name='trd_good' value='0' hidden>
                    <input type="text" name='trd_bad' value='0' hidden>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button id="singlebutton" class="btn btn-default">点击发布</button>
                </div>
            </div>
        </div>
    </form>
</div>
<hr>
    <div class="comments-area">
        <ul class="comment-list">
            <li class="comment">
                {{-- 树洞遍历 --}}
                @foreach($tree_data as $k=>$v)
                <div class="comment-body">
                    <div class="comment-info" style="padding-left:0px">
                        <div class="comment-content">
                            <p style="width:1234px;padding-left:230px">{{ $v->trd_content }}</p>
                        </div>
                        <button onclick="zz(this,{{ $v->trd_id }})" class="btn btn-default" id="zz" style="margin-left: 225px" >赞 &nbsp;{{ $v->trd_good }}</button>
                        <button onclick="cc(this,{{ $v->trd_id }})" class="btn btn-default" id="cc" style="" >踩 &nbsp;{{ $v->trd_bad }}</button>
                        <span class="comment-meta-date pull-right" style="padding-right:295px;padding-top:10px;color: black">{{ $v->created_at }} </span>
                        
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
<script src="/reception_public/js/jquery.min.js"></script>
{{-- 树洞内容字数限制 --}}
<script type="text/javascript">
    $("#textarea").on("input propertychange", function () {
        var $this = $(this),
                _val = $this.val(),
                count = "";
        if (_val.length > 500) {
            $this.val(_val.substring(0, 500));
        }
        count = 500 - $this.val().length;
        $("#text-count").text(count);
    });
</script>
{{-- 点赞 --}}
<script type="text/javascript">
    function getCaption(obj){
    var index=obj.lastIndexOf(";");
    obj=obj.substring(index+1,obj.length);
        return obj;
    }
    function zz(obj,id)
    {
        var val = $(obj).html();
        var vall = getCaption(val);
        var url = "/tree/zan/"+id+"/"+vall;
        $.get(url, function(data) {
            console.log(data);
            if(data != 1){
                window.location.reload();
            }else{
                alert('您已经点过了');
            }
        })
    } 
</script>
{{-- 踩赞 --}}
<script type="text/javascript">
    function getCaption(obj){
    var index=obj.lastIndexOf(";");
    obj=obj.substring(index+1,obj.length);
        return obj;
    }
    function cc(obj,id)
    {
        var val = $(obj).html();
        var vall = getCaption(val);
        var url = "/tree/cai/"+id+"/"+vall;
        $.get(url, function(data) {
            console.log(data);
            if(data != 1){
                window.location.reload();
            }else{
                alert('您已经点过了');
            }
        })
    } 
</script>
@endsection