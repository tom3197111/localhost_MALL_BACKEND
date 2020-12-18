@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;訂單管理
</div>
<!--面包屑导航 结束-->


<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>父級分類：</th>
                <td>
                    <select name="cate_pid">
                        <option value="0">==頂級分類==</option>
                        @foreach($order_data as $d)

      

                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>分類名稱：</th>
                <td>
                    <span><i class="fa fa-exclamation-circle yellow"></i>分類名稱必須填寫</span>
                </td>
            </tr>
            <tr>
                <th>分類標題：</th>
                <td>
                </td>
            </tr>
            <tr>
                <th>關鍵字：</th>
                <td>
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>排序：</th>
                <td>
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

