@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 商品管理
</div>
<!--面包屑导航 结束-->
<!--结果页快捷搜索框 开始-->
<!--结果页快捷搜索框 结束-->
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>商品列表</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/Commodity/create')}}"><i class="fa fa-plus"></i>添加商品</a>
                <a href="{{url('admin/Commodity')}}"><i class="fa fa-recycle"></i>全部商品</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>標題</th>
                    <th>商品圖片</th>
                    <th>點擊</th>
                    <th>價錢</th>
                    <th>是否特價</th>
                    <th>發布時間</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->art_id}}</td>
                    <td>
                        <a href="#">{{$v->art_title}}</a>
                    </td>
                    <td>
                    <?php
                        $String = $v->file_upload;
                        $url=str_replace("public\\",'', $String);
                    ?>
                    <img src="http://back.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$url}}"
                    alt="" id="art_thumb_img" style="max-width: 350px;max-height: 100px" >
                	</td>
                    <td>{{$v->art_view}}</td>
                    <td>{{$v->art_price}}</td>
                    @if($v->special == 1)
                    <td>是</td>
                    @else
                    <td>否</td>
                    @endif
                    <td>{{date('Y-m-d',$v->art_time)}}</td>
                    <td>
                        <a href="{{url('admin/Commodity/'.$v->art_id.'/edit')}}">修改</a>
                        <a href="javascript::" onclick="delArt({{$v->art_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>
<script>
    //这里是删除分类的提示框
    function delArt(art_id){
        layer.confirm('您確定要删除這篇商品吗？', {
            btn: ['確定','取消'] //按钮
        }, function(){
            //传异步参数
            $.post("{{url('admin/Commodity/')}}/"+art_id ,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status == 0){
                    //刷新当前界面
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg,{icon: 6});

                }
            });
//            alert(cate_id);
            // layer.msg('的确很重要', {icon: 1});
        }, function(){
//            layer.msg('也可以这样', {
//                time: 20000, //20s后自动关闭
//                btn: ['明白了', '知道了']
//            });
        });
    }
</script>
@endsection
