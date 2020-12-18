<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <head>
    <link rel="shortcut icon" href="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$data[0]->Company_log}}" type="image/x-icon" />
</head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/new.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="{{url('/')}}"></a></div>
    <nav class="topnav" id="topnav">
        @foreach($navs as $k=>$v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
    </nav>
</header>

@section('content')
    <h3>
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
        @endforeach
    </ul>
    <h3 class="ph">
        <p>人氣<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach( $pics as $p)
            <li><a href="{{url('a/'.$p->art_id)}}" title="{{$p->art_title}}" target="_blank">{{$p->art_title}}</a></li>
        @endforeach
    </ul>
@show

<footer>
    <p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>
</footer>
</body>
</html>
