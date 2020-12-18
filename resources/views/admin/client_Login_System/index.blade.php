@extends('layouts.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 登入系統配置
</div>
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>登入相關資料設定</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>編輯</th>
                </tr>
                @foreach($data as $k => $v)
                @if($v->banner_tag == 15)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>

                    <td>
                        <a href="{{url('admin/client_Login_System/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</form>
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>註冊相關資料設定</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>編輯</th>
                </tr>
                @foreach($data as $k => $v)
                @if($v->banner_tag == 16)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>

                    <td>
                        <a href="{{url('admin/client_Login_System/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</form>
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>忘記帳號相關資料設定</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>編輯</th>
                </tr>
                @foreach($data as $k => $v)
                @if($v->banner_tag == 17)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>

                    <td>
                        <a href="{{url('admin/client_Login_System/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</form>
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>忘記密碼相關資料設定</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>編輯</th>
                </tr>
                @foreach($data as $k => $v)
                @if($v->banner_tag == 18)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>

                    <td>
                        <a href="{{url('admin/client_Login_System/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</form>

