@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;公司資料修改
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>公司資料修改</h3>
{{--         @if($data)
            <div class="mark">
                        <p>{{$data->msg}}</p>
            </div>

        @endif --}}
    </div>
</div>
<!--结果集标题与导航组件 结束-->
<div class="result_wrap">
    <form action="{{url('admin/Companyinfo/'.$field->id)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>公司名稱：</th>
                <td>
                    <input type="text" name="Company_name" value="{{$field->Company_name}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>公司名稱必須填寫</span>
                </td>
            </tr>
            <tr>
                <th>公司電話：</th>
                <td>
                    <input type="text" class="lg" name="Company_phone" value="{{$field->Company_phone}}">
                </td>
            </tr>
            <tr>
                <th>公司地址：</th>
                <td>
                    <input type="text" class="lg" name="Company_address" value="{{$field->Company_address}}" ></input>
                </td>
            </tr>
            <tr>
                <th>公司Email：</th>
                <td>
                    <input type="text" class="lg" name="Company_email"  value="{{$field->Company_email}}"></input>
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

