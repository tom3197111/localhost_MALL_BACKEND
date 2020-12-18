@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;商品管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加商品</h3>
        @if($errors)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif

            </div>

        @endif
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
    <form action="{{url('admin/Commodity')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120">分類：</th>
                <td>
                    <select name="cate_id">
                        @foreach($data as $d)
                        <option value="{{$d->cate_id}}">{{$d->_cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>商品標題：</th>
                <td>
                    <input type="text" class="lg" name="art_title">
                </td>
            </tr>
            <tr>
                <th>價錢：</th>
                <td>
                    <input type="text" class="sm" name="art_price">
                </td>
            </tr>
            <tr>
                <th>是否特價：</th>
                <td>
                    是:<input type="checkbox" class="sm" name="special" value="1">
                    否:<input type="checkbox" class="sm" name="special" value="0">
                </td>
            </tr>            
            <tr>
                <th>縮圖：</th>
                <td>
                    <input type="hidden" size="50" name="art_thumb">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">

                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <img src="" alt="" id="art_thumb_img" style="max-width: 350px;max-height: 100px">
                </td>
            </tr>
            <tr>
                <th>關鍵字：</th>
                <td>
                    <input type="text" class="lg" name="art_tag">
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <textarea name="art_description"></textarea>
                </td>
            </tr>
            <tr>
                <th>商品內容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>

                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:500px;"></script>

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

