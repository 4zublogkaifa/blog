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
        <img src="{{url('index/img/logo.png')}}">
      </a>
    </h1>
   <!--  <div class="nav" style="text-align:center">
      <a href="index.html" class="active">文章</a>
      <a href="about.html">关于</a>
    </div>
    <ul class="layui-nav header-down-nav">
      <li class="layui-nav-item"><a href="index.html" class="active">文章</a></li>
      <li class="layui-nav-item"><a href="whisper.html">微语</a></li>
      <li class="layui-nav-item"><a href="leacots.html">留言</a></li>
      <li class="layui-nav-item"><a href="album.html">相册</a></li>
      <li class="layui-nav-item"><a href="about.html">关于</a></li>
    </ul> -->
    <p class="welcome-text">
      欢迎来到<span class="name">好文章分享</span>博客
    </p>
  </div>

  <div class="banner">
    <div class="cont w1000">
      <div class="title">
        <h3>MY<br />BLOG</h3>
        <h4>well-balanced heart</h4>
      </div>
    </div>
  </div>
  <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
  <div class="content">
    <div class="cont w1000">
      <div class="title">
        <span class="layui-breadcrumb">
          <a href="javascript:;" class="active">推荐文章</a>
        </span>
      </div>
      <div class="list-item">
        <div class="item">
          <div class="layui-fluid">
            @foreach($data as $v)
            <div class="layui-row">

              <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                <div class="img"><img src="{{url('index/img/sy_img3.jpg')}}" alt=""></div>
              </div>
              <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                <div class="item-cont">
                  <h3>{{$v->title_name}}<button class="layui-btn layui-btn-danger new-icon">new</button></h3>
                  <h5>设计文章</h5>
                  <p>{{$v->title_content}}</p>
                  <a href="{{url('index/details')}}" class="go-icon"></a>
                </div>
            </div>
            </div>
            @endforeach
           </div>
        </div>
      </div>
      <div id="demo" style="text-align: center;"></div>
    </div>
  </div>

  <div class="footer-wrap">
    <div class="footer w1000">
      <div class="qrcode">
        <img src="{{url('index/img/erweima.jpg')}}">
      </div>
      <div class="practice-mode">
        <img src="{{url('index/img/down_img.jpg')}}">
        <div class="text">
          <h4 class="title">我的联系方式</h4>
          <p>微信<span class="WeChat">8888888</span></p>
          <p>邮箱<span class="email">1557409122@qq.com</span></p>
          <p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{url('index/layui/layui.js')}}"></script>
  <script type="text/javascript">
    layui.config({
      base: '../res/js/util/'
    }).use(['element','laypage','jquery','menu'],function(){
      element = layui.element,laypage = layui.laypage,$ = layui.$,menu = layui.menu;
      laypage.render({
        elem: 'demo'
        ,count: 70 //数据总数，从服务端得到
      });
      menu.init();
    })
  </script>
</body>
</html>