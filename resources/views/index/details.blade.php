<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="{{url('index/layui/css/layui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('index/css/main.css')}}">
<!--加载meta IE兼容文件-->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <div class="header">
    <div class="menu-btn">
      <div class="menu"></div>
    </div>
    <h1 class="logo">
      <a href="index.html">
        <span>MYBLOG</span>
        <img src="../index/img/logo.png">
      </a>
    </h1>
   <!--  <div class="nav">
      <a href="index.html">文章</a>
      <a href="whisper.html">微语</a>
      <a href="leacots.html">留言</a>
      <a href="album.html">相册</a>
      <a href="about.html"  class="active">关于</a>
    </div>
    <ul class="layui-nav header-down-nav">
      <li class="layui-nav-item"><a href="index.html" class="active">文章</a></li>
      <li class="layui-nav-item"><a href="whisper.html">微语</a></li>
      <li class="layui-nav-item"><a href="leacots.html">留言</a></li>
      <li class="layui-nav-item"><a href="album.html">相册</a></li>
      <li class="layui-nav-item"><a href="about.html"  class="active">关于</a></li>
    </ul> -->
    <p class="welcome-text">
      欢迎来到<span class="name">好文章分享</span>的博客~
    </p>
  </div>
  <div class="content whisper-content leacots-content details-content">
    <div class="cont w1000">
      <div class="whisper-list">
        <div class="item-box">
          <div class="review-version">

              <div class="form-box">
                <div class="article-cont">
                  <div class="title">
                    <h3>{{$data['title_name']}}</h3>
                    <p class="cont-info"><span class="data">2018/08/08</span></p>
                  </div>
                  <p>{{$data['title_content']}}</p>
                  <img src="../index/img/wz_img1.jpg">

                  <div class="btn-box">
                    <button class="layui-btn layui-btn-primary">上一篇</button>
                    <button class="layui-btn layui-btn-primary">下一篇</button>
                    <button class="layui-btn layui-btn-primary" id="btn">点赞</button>
                  </div>
                </div>

                <div class="form">
                    <div class="layui-form-item layui-form-text">
                      <div class="layui-input-block">
                        <textarea name="desc"  placeholder="既然来了，就说几句" class="desc layui-textarea"></textarea>
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <div class="layui-input-block" style="text-align: right;">
                        <button id="content" class="layui-btn definite">确定</button>
                      </div>
                    </div>
                </div>
              </div>

              <div class="volume">
                全部留言 <span>{{$count}}</span>
              </div>
              <div class="list-cont">
                @foreach($arr as $v)
                <div class="cont">
                  <div class="img">
                    <img src="../index/img/header.png" alt="">
                  </div>
                  <div class="text">

                    <p class="tit"><span class="name">{{$v->cm_user}}</span></p>
                    <p class="ct">{{$v->cm_content}}</p>
                  </div>
                </div>
                  @endforeach
              </div>
          </div>
        </div>
      </div>
      <div id="demo" style="text-align: center;"></div>
    </div>
  </div>
  <script type="text/html" id="laytplCont">

  </script>
  <div class="footer-wrap">
    <div class="footer w1000">
      <div class="qrcode">
        <img src="../index/img/erweima.jpg">
      </div>
      <div class="practice-mode">
        <img src="../index/img/down_img.jpg">
        <div class="text">
          <h4 class="title">我的联系方式</h4>
          <p>微信<span class="WeChat">1234567890</span></p>
          <p>手机<span class="iphone">1234567890</span></p>
          <p>邮箱<span class="email">1234567890@qq.com</span></p>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../index/layui/layui.js"></script>
  <script src="{{url('js/jquery.min.js')}}"></script>
  <script>
    $(function(){
        layui.use('layer',function(){
            //点赞
            $('#btn').click(function(){
                if('{{$user_id==''}}'){
                    $.post(
                        "{{url('index/getuser')}}",
                        {'_token':'{{csrf_token()}}'},
                        function(res){
                            layer.confirm("系统检测到您还未登录,请登录后再来发炎, 是否跳转？", {
                                btn: ["确定","取消"] //按钮
                            }, function(){
                                location.href="{{url('index/register')}}";  //跳转到登录页面 登录后再回到该页面
                            }, function(){
                                //用户点击取消的操作
                            });

                        }
                    )
                    return false;
                }else{
                    var user_id='{{$user_id}}';
                    var title_id="{{$data['title_id']}}";

                    ;
                    $.post(
                        "{{url('index/details')}}",
                        {user_id:user_id,title_id:title_id,'_token':'{{csrf_token()}}'},
                        function(res){
                            if(res==1){
                                $('#btn').html('已点赞');
                            }else{
                                layer.msg('请先登录在点赞',{icon:3});
                            }
                        }
                    )
                }
            });
            //评论
            $('#content').click(function(){
                if('{{$user_id==''}}'){
                    $.post(
                        "{{url('index/getuser')}}",
                        {'_token':'{{csrf_token()}}'},
                        function(res){
                            layer.confirm("系统检测到您还未登录,请登录后再来发炎, 是否跳转？", {
                                btn: ["确定","取消"] //按钮
                            }, function(){
                                location.href="{{url('index/register')}}";  //跳转到登录页面 登录后再回到该页面
                            }, function(){
                                //用户点击取消的操作
                            });

                        }
                    )
                    return false;
                }else{
                    var desc=$('.desc').val();
                    var user_id='{{$user_id}}';
                    var title_id="{{$data['title_id']}}";
                    $.post(
                        "{{url('index/comment')}}",
                        {desc:desc,user_id:user_id,title_id:title_id,'_token':'{{csrf_token()}}'},
                        function(res){
                            if(res==1){
                                layer.msg('评论成功',{icon:1});
                            }else{
                                layer.msg('评论失败',{icon:2});
                            }
                        }
                    );
                }
            })
        })
    });
  </script>
  <script type="text/javascript">
    layui.config({
      base: '../res/js/util/'
    }).use(['element','laypage','form','menu'],function(){
      element = layui.element,laypage = layui.laypage,form = layui.form,menu = layui.menu;
      laypage.render({
        elem: 'demo'
        ,count: 70 //数据总数，从服务端得到
      });
      menu.init();
      menu.submit();
    })
  </script>
</body>
</html>