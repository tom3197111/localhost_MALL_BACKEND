@extends('layouts.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;登入系統配置
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>登入系統配置</h3>

        @if(isset($errors))
        <div class="mark">
            <p>{{$errors}}</p>
        </div>

        @endif


        <div class="result_wrap">
            <form action="{{url('admin/client_Login_System/'.$field->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                        <tr>
                            <th><i class="require">*</i>當前圖片：<br></th>
                            <td>新圖:
                                <img src="{{$field->banner_url}}" style="max-width: 350px;max-height: 100px">
                                <img alt="" style="max-width: 350px;max-height: 100px" id="preview_progressbarTW_img" src="#" /><br>
                                <input id="banner_upload" name="banner_upload" type="file" multiple="true"><br> 
                                <input type="hidden" name="banner_url" value="{{$field->banner_url}}"><br>
                                <span style="color:red";>* 如果非jpg會因為轉檔的關係時間會拉長 或者上傳失敗 請使用JPG檔</span>
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
        @endsection

