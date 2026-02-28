<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$meta_title}}</title>
    <meta content="app-id=660653351" name="apple-itunes-app"></meta>
    <meta content={{$meta_keywords}} name="Keywords"></meta>
    <meta content={{$meta_description}} name="description"></meta>
    <script type="text/javascript">
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0bb6dcc754d23ef5f6df8d866e6efe7c' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/banner.js"></script>

    <link href="/css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
    <link href="/css/lovey-lib.css" rel="stylesheet" type="text/css" />
    <link href="/css/global.css" rel="stylesheet" type="text/css" />
    <link href="/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="/css/banner.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
    <div class="top page-wrap">
        <h1 class="fl"><a href="index.html">洛阳化工网</a></h1>
        <p class="top-links fr"><a href="#">加入收藏</a>|<a href="contact.html">联系我们</a>|<a href="#">会员登陆</a></p>
        <p class="tel fr">咨询客服：<strong>15303858325</strong>&nbsp;&nbsp;&nbsp;&nbsp;咨询客服：<strong>15303866852</strong></p>
    </div>
    <ul id="nav" class="page-wrap">
        <li class="home"><a href="/">首  页</a></li>
        <li><a href="/hproducts" {{if $currentequ}}class="current"{{/if}}>产品展示</a></li>
        <li><a href="/news" {{if $currenthon}}class="current"{{/if}}>新闻行情</a></li>
        <li><a href="/profile" {{if $currentabo}}class="current"{{/if}}>公司简介</a></li>
        <li><a href="/feedback" {{if $currentfee}}class="current"{{/if}}>在线留言</a></li>
        <li class="last"><a href="/contact" {{if $currentcon}}class="current"{{/if}}>联系我们</a></li>
    </ul>
</div>
<div class="banner" id="banner" >
    <a href="#" class="d1" style="background:url(images/banner1.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(images/banner2.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(images/banner3.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(images/banner4.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(images/banner5.jpg) center no-repeat;"></a>
    <div class="d2" id="banner_id">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<script type="text/javascript">banner()</script>