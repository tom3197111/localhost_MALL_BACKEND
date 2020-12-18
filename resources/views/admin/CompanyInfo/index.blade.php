@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 公司資料配置
</div>
<!--面包屑导航 结束-->
<!--结果页快捷搜索框 开始-->
<!--结果页快捷搜索框 结束-->
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>公司資料</h3>
        </div>

    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>公司名稱</th>
                    <th>公司Log</th>
                    <th>公司電話</th>
                    <th>公司地址</th>
                    <th>公司Email</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td>{{$v->Company_name}}</td>
                    <td><img style="width: 100px" src="{{$v->Company_log}}"></td>
                    <td>{{$v->Company_phone}}</td>
                    <td>{{$v->Company_address}}</td>
                    <td>{{$v->Company_email}}</td>
                    <td>
                        <a href="{{url('admin/Companyinfo/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endforeach
            </table>

     {{--        <div class="page_list">
                {{$data->links()}}
            </div> --}}
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
@endsection
