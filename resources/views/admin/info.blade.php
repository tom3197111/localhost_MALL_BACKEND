@extends('layouts.admin')
@section('content')

	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo;系统基本信息
	</div>
	
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系統</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>運行環境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>PHP運行方式</label><span>apache2handler</span>
                </li>
                <li>
                    <label>上傳附件限制</label><span>2M</span>
                </li>
                <li>
                    <label>台灣時間</label><span><?php echo date('Y年m月d日 h時i分s秒')?></span>
                </li>
                <li>
                    <label>伺服器網域/IP</label><span> {{$_SERVER['SERVER_NAME']}} {{$_SERVER['SCRIPT_NAME']}} {{$_SERVER['SERVER_ADDR']}}</span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
            </ul>
        </div>
    </div>

	<!--结果集列表组件 结束-->
@endsection