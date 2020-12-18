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
    <form action="{{url('admin/Companyinfo/'.$field->id)}}" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>公司名稱：</th>
                <td>
                    <input type="text" name="Company_name" value="{{$field->Company_name}}"><br>
                    <span><i class="fa fa-exclamation-circle yellow"></i>公司名稱必須填寫</span>
                </td>
            </tr>
            <tr>
                <th>公司Log：</th>
                <td>
                    原圖:
                    <img style="width: 100px" src="{{$field->Company_log}}">
                    新圖:<img alt="" style="width:100px" id="preview_progressbarTW_img" src="#" /><br>
                    <input id="file_upload" name="Company_log" type="file" multiple="true"><br>
                    <span><i class="fa fa-exclamation-circle yellow"></i>log大小 最好以450*300 不然會上傳很久</span>
                </td>
            </tr>            <tr>
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

