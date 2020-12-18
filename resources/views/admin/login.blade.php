<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<link href="{{ asset('style/css/ch-ui.admin.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('style/font/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1></h1>
		<h2>後台管理</h2>
		<div class="form">
			@if(session('msg'))
				<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="" method="post">
					{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
{{-- 					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</li> --}}
					<li>
						<input type="submit" value="登入"/>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>