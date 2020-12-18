@extends('layouts.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;編輯輪播牆資訊
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>編輯輪播牆資訊</h3>

        @if(isset($errors))
        <div class="mark">
            <p>{{$errors}}</p>
        </div>

        @endif


        <div class="result_wrap">
            <form action="{{url('admin/banner/'.$field->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                        <tr>
                            <th><i class="require">*</i>當前圖片：<br></th>
                            <td>新圖:
                                <img src="{{$field->banner_url}}" style="max-width: 350px;max-height: 100px">
                                <img alt="" style="max-width: 350px;max-height: 100px" id="preview_progressbarTW_img" src="#" /><br>
                                <!-- <input id="file_upload" name="file_upload" type="file" multiple="true"> -->
                                <input id="banner_upload" name="banner_upload" type="file" multiple="true"><br> 
                                <input type="hidden" name="banner_url" value="{{$field->banner_url}}"><br>
                                <i class="require">*圖片只接受JPG</i><br>
                                <i class="require">*圖片尺寸最好是 1680*700 不然會等很久</i><br>
                                <i class="require">*由於圖片放大時間會比較久 請等30秒後在自行更新頁面</i><br>
                            </td>

                        </tr>
                        <tr>
                            <th>商品第一段文字 ：</th>
                            <td>
                                <input type="text" class="lg" name="banner_content_one" value="{{$field->banner_content_one}}">
                            </td>
                        </tr>
                        <tr>
                            <th>商品第二段文字 ：</th>
                            <td>
                                <textarea name="banner_content_two"v>{{$field->banner_content_two}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>商品第三段小字 ：</th>
                            <td>
                                <textarea name="banner_content_three" >{{$field->banner_content_three}}</textarea>
                                <span style="color:red";>* 如果是大字標體 此欄位會無功能</span>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>圖片按鈕文字  ：</th>
                            <td>
                                <input type="text" class="sm" name="banner_content_four" value="{{$field->banner_content_four}}">
                                <span style="color:red";>* 如果是大字標體 此欄位會無功能</span>
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

