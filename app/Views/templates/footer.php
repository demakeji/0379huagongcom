<div id="footer" class="mt10">
    <div class="main-im">
        <div id="open_im" class="open-im">&nbsp;</div>
        <div class="im_main" id="im_main">
            <div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭">&nbsp;</a></div>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=363486841&site=qq&menu=yes" target="_blank" class="im-qq qq-a" title="在线QQ客服">
                <div class="qq-container"></div>
                <div class="qq-hover-c"><img class="img-qq" src="/images/qq.png"></div>
                <span> QQ在线咨询</span>
            </a>
            <div class="im-tel">
                <div>咨询热线1</div>
                <div class="tel-num">15303858325</div>
                <div>咨询热线2</div>
                <div class="tel-num">15303866852</div>
                <!--<div>咨询热线3</div>
                <div class="tel-num">15303858325</div>
            --></div>
            <div class="im-footer" style="position:relative">
                <div class="weixing-container">
                    <div class="weixing-show">
                        <div class="weixing-txt">微信扫一扫<br>直接和老总谈谈~</div>
                        <img class="weixing-ma" src="images/wx_ppf.jpg">
                        <div class="weixing-sanjiao"></div>
                        <div class="weixing-sanjiao-big"></div>
                    </div>
                </div>
                <div class="go-top"><a href="javascript:;" title="返回顶部"></a> </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('#close_im').bind('click',function(){
                $('#main-im').css("height","0");
                $('#im_main').hide();
                $('#open_im').show();
            });
            $('#open_im').bind('click',function(e){
                $('#main-im').css("height","272");
                $('#im_main').show();
                $(this).hide();
            });
            $('.go-top').bind('click',function(){
                $(window).scrollTop(0);
            });
            $(".weixing-container").bind('mouseenter',function(){
                $('.weixing-show').show();
            })
            $(".weixing-container").bind('mouseleave',function(){
                $('.weixing-show').hide();
            });
        });
    </script>
    <div class="contact-us boder" style="position: fixed; top: 123px; left: 30px; width:9%; height:175px; filter:alpha(opacity=100); -moz-opacity:100; opacity:100; background:#f9fafb; z-index:999; color:#f60; font-size:14px; font-family:'宋体';}">
        <h3 style="border-bottom:1px solid #dddddd; line-height: 40px; text-align:center;"><a href="#" title="联系我们">专题分类</a></h3>
        <ul>
            <li style="text-align:center; border-bottom:1px solid #dddddd;"><strong><a href="products_list_1_prodcate_14.html" style="color:#f60;">农业专用</a></strong></li>
            <li style="text-align:center; border-bottom:1px solid #dddddd;"><strong><a href="products_list_1_prodcate_15.html" style="color:#f60;">选矿专用</a></strong></li>
            <li style="text-align:center; border-bottom:1px solid #dddddd;"><strong><a href="products_list_1_prodcate_16.html" style="color:#f60;">耐材专用</a></strong></li>
            <li style="text-align:center; border-bottom:1px solid #dddddd;"><strong><a href="products_list_1_prodcate_19.html" style="color:#f60;">电镀专用</a></strong></li>
            <li style="text-align:center;"><strong><a href="products_list_1_prodcate_18.html" style="color:#f60;">其他</a></strong></li>
        </ul>
    </div>
    <p>地址：河南省洛阳市洛龙区龙门大道331号鑫华化工市场&nbsp;&nbsp;&nbsp;&nbsp;联系电话：15303866852</p>
    <p>洛阳德玛化工&nbsp;&nbsp;版权所有©2019 &nbsp;&nbsp;All Rights Reserved&nbsp;&nbsp;豫ICP备19009829号. </p>
    <!--<p><a href="http://www.miitbeian.gov.cn" target="_blank">豫ICP备102041**</a> &nbsp;&nbsp; 数据仓库支持：<a href="http://www.topoyo.com" target="_blank" title="太平洋门户网">太平洋门户网</a><span class="admin"><a href="#" target="_blank">网站管理</a></span></p>
  --></div>
</body>
</html>