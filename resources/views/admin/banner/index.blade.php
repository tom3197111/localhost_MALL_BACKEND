@extends('layouts.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 廣告牆配置
</div>
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>第一層廣告-輪播牆列表</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th class="tc" width="5%">輪播牆播放順序</th>
                    <th>商品第一段文字</th>
                    <th>商品第二段文字</th>
                    <th>商品第三段小字</th>
                    <th>圖片按鈕文字</th>
                    <th>編輯輪播牆資訊</th>
                </tr>
                @foreach($data as $k => $v)
                @if($k <= 3)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>
                    <td class="tc"> {{$v->banner_tag}}</td>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>{{$v->banner_content_four}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>第二層廣告-中型宣傳廣告</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>商品第一段文字</th>
                    <th>商品第二段文字</th>
                    <th>商品第三段文字</th>
                    <th>圖片按鈕文字</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($k >= 4 && $k <=5 )
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>{{$v->banner_content_four}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>大橫幅宣傳廣告</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>當前圖片</th>
                    <th>活動名稱</th>
                    <th>活動中間字</th>
                    <th>活動內容</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($v->banner_tag == 14)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>第三層廣告-中型宣傳廣告</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>商品第一段文字</th>
                    <th>商品第二段文字</th>
                    <th>商品第三段文字</th>
                    <th>圖片按鈕文字</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($k >= 7 && $k <= 10 )
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>{{$v->banner_content_four}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>第四層廣告-大型宣傳廣告</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">當前圖片</th>
                    <th>商品第一段文字</th>
                    <th>商品第二段文字</th>
                    <th>商品第三段文字</th>
                    <th>圖片按鈕文字</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($k == 10 || $k == 11)
                <tr>
                    <td><img src="{{$v->banner_url}}" style="max-width: 350px;max-height: 100px"></td>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>{{$v->banner_content_four}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>第五層廣告標體大字</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>上標體大字</th>
                    <th>圖片按鈕文字</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($k == 12)
                <tr>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_four}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>送貨/活動/促銷/禮卷(由上往下)</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>標題</th>
                    <th>內容</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                @if($k >= 13 && $k <=16)
                <tr>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
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
            <h3>footer(公司資料請到公司配置內設置)</h3>
        </div>
    </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>左標題</th>
                    <th>右標題</th>
                    <th>左下標題</th>
                    <th>編輯廣告資訊</th>
                </tr>

                @foreach($data as $k => $v)
                 @if($k == 17)
                <tr>
                    <td>{{$v->banner_content_one}}</td>
                    <td>{{$v->banner_content_two}}</td>
                    <td>{{$v->banner_content_three}}</td>
                    <td>
                        <a href="{{url('admin/banner/'.$v->id.'/edit')}}">修改</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</form>
@endsection
