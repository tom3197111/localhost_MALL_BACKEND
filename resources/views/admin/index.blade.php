
@extends('layouts.admin')

@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">後台管理</div>
			<ul>
				<li><a href="{{url('http://mall.com/')}}" target="_blank" class="active">首頁</a></li>
				<li><a href="{{url('admin/info')}}" target="main">管理頁</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理員：{{ Session::get('user')}}</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密碼</a></li>
				<li><a href="{{url('admin/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>商品管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分類</a></li>
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分類列表</a></li>
					<li><a href="{{url('admin/Commodity/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>增加新商品</a></li>
					<li><a href="{{url('admin/Commodity')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>商品列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>訂單管理</h3>
				<ul class="sub_menu" style="display: block">
					<li><a href="{{url('order')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>訂單列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>系統設置</h3>
				<ul class="sub_menu" style="display: block">
<!-- 					<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情連接</a></li>
					<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定義導航</a></li> -->
					<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>網站配置</a></li>
             {{--                            <img src="http://su_mall.com/images/banner1.jpg"
                    alt="" id="art_thumb_img" style="max-width: 350px;max-height: 100px" >
				</ul> --}}
                </ul>
			</li>
            <li>
                <h3><i class="fa fa-fw fa-database"></i>公司資料</h3>
                <ul class="sub_menu" style="display: block">
         {{--            <li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情連接</a></li>
                    <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定義導航</a></li> --}}
                    <li><a href="{{url('admin/Companyinfo')}}" target="main"><i class="fa fa-fw fa-cogs"></i>公司資料配置</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-database"></i>前台管理</h3>
                <ul class="sub_menu" style="display: block">
         {{--            <li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情連接</a></li>
                    <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定義導航</a></li> --}}
                    <li><a href="{{url('admin/banner')}}" target="main"><i class="fa fa-fw fa-cogs"></i>廣告牆配置</a></li>
                    <li><a href="{{url('admin/client_Login_System')}}" target="main"><i class="fa fa-fw fa-cogs"></i>登入系統配置</a></li>
                </ul>
            </li>
		</ul>

	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin\info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->

	<!--底部 结束-->

@endsection
