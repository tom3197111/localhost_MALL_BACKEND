@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;商品管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>编辑商品</h3>

    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url('admin/Commodity/create')}}"><i class="fa fa-plus"></i>添加商品</a>
            <a href="{{url('admin/Commodity')}}"><i class="fa fa-recycle"></i>全部商品</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/Commodity/'.$field->art_id)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120">分類：</th>
                <td>
                    <select name="cate_id">
                        @foreach($data as $d)
                        <option value="{{$d->cate_id}}" @if($field->cate_id == $d->cate_id) selected @endif>

                            {{$d->_cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>商品标题：</th>
                <td>
                    <input type="text" class="lg" name="art_title" value="{{$field->art_title}}">
                </td>
            </tr>
            <tr>
                <th>價錢：</th>
                <td>
                    <input type="text" class="sm" name="art_price" value="{{$field->art_price}}">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i><h>標體圖片</h1></th>
                <td>
                    原圖: <img style="width:100px"   alt="" src="http://back.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$field->file_upload}}"/>
                    更換:
                    <img alt="" style="width:100px" id="preview_progressbarTW_img" src="#" /><br>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <span><i class="fa fa-exclamation-circle yellow"></i>父類新增標體圖片會顯示在前台的分類內</span>
                </td>
            </tr>
            <tr>
                <th>關鍵字：</th>
                <td>
                    <input type="text" class="lg" name="art_tag" value="{{$field->art_tag}}">
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="art_description">{{$field->art_description}}</textarea>
                </td>
            </tr>

            <tr>
                <th>商品内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>

                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:500px;">{!! $field->art_content !!}</script>

                    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                </td>
            </tr>


            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script type="text/javascript">
       $("#file_upload").change(function(){
      //當檔案改變後，做一些事
     readURL(this);   // this代表<input id="imgInp">
   });

    function readURL(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function (e) {
       $("#art_thumb_img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection

