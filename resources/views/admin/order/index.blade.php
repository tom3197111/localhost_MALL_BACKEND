@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('bootstrap-4.5.3-dist/css/bootstrap.min.css')}}">
<style type="text/css">
  #testDiv{  width: 100%;  
    height: auto;  
    word-wrap:break-word;  
    word-break:break-all;  
    overflow: hidden;  }

  </style>


  @section('content')
  <div class="modal" tabindex="-1" role="dialog" id="asd">
    <div class=" modal-dialog modal-lg" role="document"> 
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
        </div>
        <div class="modal-body">

        </div>

      </div>
    </div>
  </div>
  <!--面包屑导航 开始-->
  <div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 訂單列表
  </div>
  <!--搜索结果页面 列表 开始-->
  <div class="result_wrap">
<!--         <div class="result_title">
            <h3>分類列表</h3>
          </div> -->
          <!--快捷导航 开始-->
          <div class="result_content">
            <div class="short_wrap">
              <input type="text" id="search_order_id" ><i class="fa fa-search"></i>
              <input type="button"  onclick="search_order('search_order_id')" value="搜尋訂單"> <br><br>
              <input type="text" id="search_shshopping_cart_order"><i class="fa fa-search"></i>
              <input type="button"  onclick="search_order('search_shshopping_cart_order')" value="搜尋會員歷史訂單">
            </div>
          </div>
          <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
          <div class="result_content">
            <table class=" table_A table table-hover" style="width: 1500px;">
              <tr>
                <th  width="5%">訂單編號</th>
                <th  width="5%">購物車編號</th>
                <th class="tc" width="5%">買家ID</th>
                <th class="tc" width="5%">支付類型</th>
                <th class="tc" width="5%">狀態</th>
                <th class="tc" width="5%">付款時間</th>




              </tr>
              @foreach($order_data as $v)
              <tr>

                <td >
                  <input  style="width:190px;height:50px;border:2px blue none;" type="button"   onclick="search_order('{{$v->payment_number}}')" value="{{$v->payment_number}}">
                </td>

                <td ><a id="order_commodity_item" onclick="search_order(this)" data-value='{{$v->order_id}}' tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-html="true" data-content="
                 <h4>購物車編號:</h4>{{$v->order_id}}<br>
                 @foreach($order_commodity_item as $a)
                 @if($v->order_id ==$a->order_id)
                 ________________________________<br>
                 商品編號:{{$a->commodity_id}}<br>
                 商品名:{{$a->commodity_name}}<br>
                 購買數量:{{$a->commodity_num}}<br>
                 商品單價:{{$a->price}}<br>
                 該品項總金額:{{$a->total_fee}}<br>
                 總價:{{$v->payment}}<br>
                 @endif
                 @endforeach
                 ">{{$v->order_id}}</a></td>





                 <td class="tc" width="5%">{{$v->user_id}}</td> 
                 @if($v->payment_type=='1')
                 <td class="tc">線上支付</td>
                 @elseif($v->payment_type=='0')
                 <td class="tc">貨到付款</td>
                 @endif

                 @if($v->status==1)
                 <td class="tc">未付款</td>
                 @elseif($v->status==2)
                 <td class="tc">已付款</td>
                 @elseif($v->status==3)
                 <td class="tc">未出貨</td>
                 @elseif($v->status==4)  
                 <td class="tc">已出貨</td>
                 @elseif($v->status==5)
                 <td class="tc">交易成功</td>
                 @elseif($v->status==6)
                 <td class="tc">交易取消</td>
                 @elseif($v->status==7)
                 <td class="tc" >缺貨</td>
                 @endif   
                 <td class="tc" >{{$v->end_time}}</td>  
               </tr>
               @endforeach
             </table>
             <DIV style="position: absolute; right:10PX;top:50PX;"><table class="list_tab table_B" ></table></DIV>


           </div>
         </div>



         <!--搜索结果页面 列 结束-->
         <script type="text/javascript">
          $(function () 
          { 
            $("[data-toggle='popover']").popover(); 
          });
    //  function showModal() {
    //      $('#asd').modal('show'); 
    // }
//搜尋訂單
function search_order(ojbect){
  if(ojbect=='search_order_id'){
    var search = $('#search_order_id').val()
    var search_type = ojbect
  }else if(ojbect=='search_shshopping_cart_order'){
    var search = $('#search_shshopping_cart_order').val()
    var search_type = ojbect
  }else{
    var search = ojbect
    var search_type = 'payment_number'
  }
  var data_html=''
  if(ojbect=='search_order_id'||ojbect=='search_shshopping_cart_order'){
    $.ajax({
      url: "{{url('order')}}/"+search,
      type: "GET",
      dataType: 'json',
      data:{search_type:search_type},
      success: function(data) {
        console.log(data)
        data_html='<tr> <th class="tc" width="5%">訂單編號</th> <th class="tc" width="5%">購物車編號</th> <th>支付類型</th> <th>狀態</th> <th>買家ID</th> <th>買家留言</th> </tr>'

        $.each(data, function(index,$v) {
          data_html+='<tr> <td ><input style="width:190px;height:20px;border:2px blue none;" type="button"   onclick=search_order("'+$v.payment_number+'") value="'+$v.payment_number+'"></td> <td >'+$v.order_id+'</td>'

          if($v.payment_type == "1") {
            data_html+= '<td >線上支付</td>' 
          } else if($v.payment_type=="0") { 
            data_html+='<td >貨到付款</td>'
          } if($v.status==1) {
            data_html+='<td >未付款</td>' 
          } else if($v.status==2) {
            data_html+='<td >已付款</td> '
          } else if($v.status==3) {
            data_html+='<td >未出貨</td>' 
          } else if($v.status==4) {
            data_html+='<td >已出貨</td>' 
          } else if($v.status==5) {
            data_html+='<td >交易成功</td>' 
          } else if($v.status==6) {
            data_html+='<td >交易取消</td>' 
          } else if($v.status==7) {
            data_html+='<td >缺貨</td>' 
          } 
          data_html+='<td class="tc" width="5%">'+$v.user_id+'</td> <td class="tc" >'+$v.buy_message+'</td> </tr> }'

        });                         
        $('.table_A').html(data_html)

      }
    });

  }else{
    var data_html=''
    var total_fee=''
    var total_fee_b=''

    $.ajax({
      url: "{{url('order')}}/"+search,
      type: "GET",
      dataType: 'json',
      data:{search_type:search_type},
      success: function(data) {
        $('.modal-title').text('訂單資料')
        if(data[0].payment_type=='1'){
          payment_type='線上支付'
        }
        if(data[0].status=='2'){
          status='已付款'
        }
        data_html='<table class="table table-hover">'+
        '<tbody>'+
        '<tr><th><i class="require">*</i>訂單編號：<td>'+data[0].payment_number+'</tr>'+
        '<tr><th>收件人姓名:</th><td>'+data[1].receiver_name+'</td></td> <th>收件人電話:</th><td>'+data[1].receiver_mobile+'</td></th></tr><th>收件人Email:</th><td>'+data[1].receiver_email+'</td>'+
        '<tr></td> </tr>'+
        '<tr><th><i class="require">*</i>買家ID：</th><td>'+data[0].user_id+ '</td></tr>'+
        '<tr><th><i class="require">*</i>買家留言：</th><td><span id="testDiv" style=" width:280PX;height:80px;word-break:normal;display:block;white-space:pre-wrap;overflow:hidden;color:#0066CC;overflow-y:auto;">'+data[0].buy_message+'</span></th></tr>'+
        '<tr><th>物流類型:</th><td>'+data[1].LogisticsType+'</td></td><th>物流子類型:</th><td>'+data[1].LogisticsSubType+'</td></tr>'+
        '<tr><th>付款金額：</th><td>'+data[0].payment+'</td><th>支付類型：</th> <td>'+payment_type+'</td></tr>'+
        '<tr><th><i class="require">*</i>運費：</th><td>'+data[0].post_fee+'</td></td></tr>'+
        '<tr><th><i class="require">*</i>目前狀態：</th> <td>'+status+'</td><th><i class="require">*</i>交易完成時間：</th> <td>'+data[0].end_time+'</td> </tr>'

        data_html+='<th class="tc" colspan="4"><h4>購物車編號：'+data[2].order_id+'<h4></th>'
        $.each(data, function(i,val){  

          if(i>1){
            data_html+='<tr><th>商品編號:</th><td>'+data[i].commodity_id+'</td></td></th><th>商品名:</th><td>'+data[i].commodity_name+'</td></td></th></tr> <tr><th>購買數量:</th><td>'+data[i].commodity_num+'</td></td></th><th>商品單價:</th><td>$'+data[i].price+'</td></td></th></tr> <th colspan="4"><h4>單項商品總金額:$'+data[i].total_fee+'<h4></th></tr>'
            total_fee +=parseInt(data[i].total_fee)
            total_fee=parseInt(total_fee)

          }

        }); 
        var total=parseInt(total_fee)+parseInt(data[0].post_fee)
        data_html+='<th></ht><th class="tc" colspan="4"><h4>小計:$'+data[0].payment+'<h4></th>'
        +'</tbody><th></ht><th class="tc" colspan="4"><h4>運費:$'+data[0].post_fee+'<h4></th>'
        +'</tbody><th></ht><th class="tc" colspan="4"><h4>總價格:$'+total+'<h4></th></tbody></table>'               
        $('.modal-body').html(data_html)
        $('#asd').modal('show'); 
      }
    });    
  }




} 

</script>
@endsection


