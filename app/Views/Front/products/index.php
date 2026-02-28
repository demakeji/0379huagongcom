{{include file='../header.inc.html'}}
<div id="container" class="page-wrap">
    <div id="content" class="fl">
        <!--<div class="side fl">
         <div class="cm-album mb10">
            <h3 class="side-title"><strong class="fl">厂区展示</strong><span class="fr"><a href="factory.html">更多>></a></span></h3>
            <ul class="slides">
              <li><img src="images/sild_img01.jpg" width="250" height="170" alt="图片名称" /></li>
              <li><img src="images/sild_img01.jpg" width="250" height="170" alt="图片名称" /></li>
            </ul>
            <p><a href="#">此处为图片名称</a></p>
          </div>
          <div class="company-list">
            <h3 class="side-title"><strong class="fl">最新入驻</strong><span class="fr"><a href="company_list.html">更多>></a></span></h3>
            <div class="in-bg">
              <ul>
                <li><a href="e-shop/index.html">此处为商户名称</a></li>
                <li><a href="e-shop/index.html">此处为商户名称</a></li>
                <li><a href="e-shop/index.html">此处为商户名称</a></li>
                <li><a href="e-shop/index.html">此处为商户名称</a></li>
                <li><a href="e-shop/index.html">此处为商户名称</a></li>
              </ul>
            </div>
          </div>
        </div>-->
        <div class="main fr">
            <!--<div class="aboutus boder">
              <h3 class="mian-title"><strong class="fl"><a href="aboutus.html">关于我们</a></strong><span class="fr"><a href="aboutus.html">更多</a></span></h3>
              <div class="text">
                <p><img src="images/aboutus.jpg" width="180" height="120" alt="公司简介" title="公司简介" />洛阳金财资产管理有限公司成立于2008年12月25日，现注册资本金300万元，为全资国营企业。股东分别为：洛阳城市发展投资集团有限公司持股占总股份的98.33%；洛阳市市政建设投资有限公司持股占总股份1.67%。公司的经营范围主要是：企业资产管理服务，场地租赁，房屋租赁，金属材料（不含国家专控产品）的销售。公司地理位置优越，交通便利，北连310国道和连霍高速公路，南接春都路，与洛阳火车站毗邻，铁路专用线直达库区...<a href="aboutus.html">查看详情>></a></p>
              </div>
            </div>
            --><div class="text-list boder">
                <h3 class="mian-title"><strong class="fl"><a href="notice.html">新闻咨询</a></strong><span class="fr"><a href="notice.html">更多</a></span></h3>
                <ul>
                    {{foreach item=new from=$news}}
                    <li><a href="notice_detail_{{$new.Tid}}.html">{{$new.Title}}</a><span>{{$new.PostTime|date_format:"%Y-%m-%d"}}</span></li>
                    <!--<li><a href="notice_detail.html">此处为通知公告标题</a><span>2013-01-15</span></li>
                    <li><a href="notice_detail.html">此处为通知公告标题</a><span>2013-01-15</span></li>
                    <li><a href="notice_detail.html">此处为通知公告标题</a><span>2013-01-15</span></li>
                    <li class="last"><a href="notice_detail.html">此处为通知公告标题</a><span>2013-01-15</span></li>-->
                    {{/foreach}}
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="products-list">
            <table>
                <!--<tr class="title">
                  <th>专注</th>
                  <th>专业</th>
                  <th>诚信</th>
                  <th>务实</th>
                  <th>其他</th>
                  <th>联系方式</th>
                </tr>--><!--
        {{assign var=flag value=''}}
        {{foreach item=pro from=$prods name=foo}}
	        {{if $pro.Cid neq $flag}}
	        	{{if !$smarty.foreach.foo.first}}</tr>{{/if}}
		        <tr class="list">
	          	  <td style="font-weight:bold; font-size:16px; color:#0000ff;">{{if isset($pro.Cname)}}{{$pro.Cname}}{{else}}其&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;他{{/if}}</td>  
	        	</tr>
	        	<tr class="list">
	    	{{/if}}
	          	<td style="font-weight:bold; font-size:14px;"><a href="http://0379huagong.com/product_detail_44.html">{{$pro.title}}</a></td>
	    	{{if $smarty.foreach.foo.last}}</tr>{{/if}}
	    	{{assign var=flag value=$pro.Cid}}
        {{/foreach}}
		--><tr class="list">
                    <td style="font-weight:bold; font-size:16px; color:#0000ff;">农业推荐</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/44">硫酸钾</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/47">硫酸锰</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/54">硫酸锌</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/53">硫酸铜</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/48">硫酸镁</a></td>
                    <td style="font-weight:bold; font-size:14px;">硫酸铵</td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/55">硫酸亚铁</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/39">氯化钾</a></td>
                    <td style="font-weight:bold; font-size:14px;">尿&nbsp;&nbsp;&nbsp;&nbsp;素</td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/43">磷酸二氢钾</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/60">硼&nbsp;&nbsp;&nbsp;&nbsp;砂</a></td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:16px; color:#0000ff;">选矿推荐</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/71">纯&nbsp;&nbsp;&nbsp;&nbsp;碱</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/66">片&nbsp;&nbsp;&nbsp;&nbsp;碱</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/41">硫化钠</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/53">硫酸铜</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/73">亚硫酸钠</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/58">PAC</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/37">聚丙烯酰胺</a></td>
                    <td style="font-weight:bold; font-size:14px;">活性炭</td>
                    <td style="font-weight:bold; font-size:14px;">乙硫氮</td>
                    <td style="font-weight:bold; font-size:14px;">乙硫铵脂</td>
                    <td style="font-weight:bold; font-size:14px;">丁胺黑药</td>
                    <td style="font-weight:bold; font-size:14px;">丁胺黄药</td>
                    <td style="font-weight:bold; font-size:14px;">BK-301</td>
                    <td style="font-weight:bold; font-size:14px;">2＃油</td>
                    <td style="font-weight:bold; font-size:14px;">漂白粉</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:16px; color:#0000ff;">耐材推荐</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/62">硼&nbsp;&nbsp;&nbsp;&nbsp;酸</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/60">硼&nbsp;&nbsp;&nbsp;&nbsp;砂</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/67">三聚磷酸钠</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/42">六偏磷酸钠</a></td>
                    <td style="font-weight:bold; font-size:14px;">木质素</td>
                    <td style="font-weight:bold; font-size:14px;">纤维素</td>
                    <td style="font-weight:bold; font-size:14px;">氧化铬绿</td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/48">硫酸镁</a></td>
                    <td style="font-weight:bold; font-size:14px;">硅酸钠</td>
                    <td style="font-weight:bold; font-size:14px;">六次四胺</td>
                    <td style="font-weight:bold; font-size:14px;">糊&nbsp;&nbsp;&nbsp;&nbsp;精</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:16px; color:#0000ff;">电镀推荐</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/54">硫酸锌</a></td>
                    <td style="font-weight:bold; font-size:14px;">氯化锌</td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/39">氯化钾</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/68">明&nbsp;&nbsp;&nbsp;&nbsp;矾</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/46">硫酸铝</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/53">硫酸铜</a></td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:16px; color:#0000ff;">其&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;他</td>
                </tr>
                <tr class="list">
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/31">草&nbsp;&nbsp;&nbsp;&nbsp;酸</a></td>
                    <td style="font-weight:bold; font-size:14px;">氟硅酸钠</td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/30">重铬酸钾</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/33">EDTA</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/34">EDTA-2Na</a></td>
                    <td style="font-weight:bold; font-size:14px;"><a href="hproducts/detail/35">EDTA-4Na</a></td>
                </tr>
            </table>
        </div>
        <h1 style="color:#0000FF;">包装展示</h1>
        <div id=demo style="overflow:hidden;width:750;" align=center>
            <table border=0 align=center cellpadding=1 cellspacing=1 cellspace=0 >
                <tr>
                    <td valign=top bgcolor=ffffff id=marquePic1>
                        <table width='100%' border='0' cellspacing='0'>
                            <tr>
                                {{foreach item=prod from=$prods}}
                                <td align=center><a href='http://0379huagong.com/product_detail_{{$prod.Hpid}}.html'><img src="{{$prod.image}}" width="196px" height="196px" border="0"><br><br></a>{{$prod.title}}</td>
                                {{/foreach}}
                                <!--<td align=center><a href='http://0379huagong.com/product_detail_30.html'><img src="/upload/hproduct/1/1/20161116103158_607.jpg" width="196px" height="196px" border="0"><br><br></a>重铬酸钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_31.html'><img src="/upload/hproduct/1/1/20161116103537_037.jpg" width="196px" height="196px" border="0"><br><br>草酸</a></td>
                                <td align=center><a href='http://0379huagong.com/product_detail_32.html'><img src="/upload/hproduct/1/1/20161116103802_404.jpg" width="196px" height="196px" border="0"><br><br>草酸(山西)</a></td>
                                <td align=center><a href='http://0379huagong.com/product_detail_33.html'><img src="/upload/hproduct/1/1/20161116103942_788.jpg" width="196px" height="196px" border="0"><br><br></a>EDTA</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_34.html'><img src="/upload/hproduct/1/1/20161116104038_852.jpg" width="196px" height="196px" border="0"><br><br></a>EDTA-2Na</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_35.html'><img src="/upload/hproduct/1/1/20161116104148_609.jpg" width="196px" height="196px" border="0"><br><br></a>EDTA-4Na</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_36.html'><img src="/upload/hproduct/1/1/20161116105039_742.jpg" width="196px" height="196px" border="0"><br><br></a>黄血盐</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_37.html'><img src="/upload/hproduct/1/1/20161116105139_732.jpg" width="196px" height="196px" border="0"><br><br></a>聚丙烯酰胺</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_38.html'><img src="/upload/hproduct/20161116/20161116173008_489.jpg" width="196px" height="196px" border="0"><br><br></a>工业用氯化铵</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_39.html'><img src="/upload/hproduct/1/1/20161116105434_093.jpg" width="196px" height="196px" border="0"><br><br></a>氯化钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_40.html'><img src="/upload/hproduct/1/1/20161116105713_987.jpg" width="196px" height="196px" border="0"><br><br></a>硫化钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_41.html'><img src="/upload/hproduct/1/1/20161116110038_287.jpg" width="196px" height="196px" border="0"><br><br></a>硫化钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_42.html'><img src="/upload/hproduct/1/1/20161116111408_754.jpg" width="196px" height="196px" border="0"><br><br></a>六偏磷酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_43.html'><img src="/upload/hproduct/1/1/20161116111514_821.jpg" width="196px" height="196px" border="0"><br><br></a>磷酸二氢钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_44.html'><img src="/upload/hproduct/1/1/20161116111820_843.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_45.html'><img src="/upload/hproduct/1/1/20161116112505_725.jpg" width="196px" height="196px" border="0"><br><br></a>农用硫酸钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_46.html'><img src="/upload/hproduct/1/1/20161116112612_608.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸铝</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_47.html'><img src="/upload/hproduct/1/1/20161116112805_241.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸锰</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_48.html'><img src="/upload/hproduct/1/1/20161116113023_573.jpg" width="196px" height="196px" border="0"><br><br></a>七水硫酸镁</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_49.html'><img src="/upload/hproduct/1/1/20161116113418_487.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_50.html'><img src="/upload/hproduct/20161116/20161116114149_353.jpg" width="196px" height="196px" border="0"><br><br></a>磷酸三钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_51.html'><img src="/upload/hproduct/1/1/20161116114221_406.jpg" width="196px" height="196px" border="0"><br><br></a>磷酸三钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_52.html'><img src="/upload/hproduct/1/1/20161116114318_732.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸铜</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_53.html'><img src="/upload/hproduct/1/1/20161116114522_075.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸铜</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_54.html'><img src="/upload/hproduct/1/1/20161116114657_741.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸锌</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_55.html'><img src="/upload/hproduct/1/1/20161116114731_771.jpg" width="196px" height="196px" border="0"><br><br></a>硫酸亚铁</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_56.html'><img src="/upload/hproduct/1/1/20161116114916_460.jpg" width="196px" height="196px" border="0"><br><br></a>柠檬酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_57.html'><img src="/upload/hproduct/1/1/20161116115110_319.jpg" width="196px" height="196px" border="0"><br><br></a>聚合氯化铝(PAC)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_58.html'><img src="/upload/hproduct/1/1/20161116115209_545.jpg" width="196px" height="196px" border="0"><br><br></a>聚合氯化铝(PAC)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_59.html'><img src="/upload/hproduct/1/1/20161116115632_311.jpg" width="196px" height="196px" border="0"><br><br></a>硼酐</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_60.html'><img src="/upload/hproduct/1/1/20161116115911_119.jpg" width="196px" height="196px" border="0"><br><br></a>硼砂</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_61.html'><img src="/upload/hproduct/1/1/20161116120111_201.jpg" width="196px" height="196px" border="0"><br><br></a>硼酸(俄罗斯)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_62.html'><img src="/upload/hproduct/1/1/20161116120332_188.jpg" width="196px" height="196px" border="0"><br><br></a>硼酸(智利)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_63.html'><img src="/upload/hproduct/1/1/20161116120900_763.jpg" width="196px" height="196px" border="0"><br><br></a>氢氧化钾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_64.html'><img src="/upload/hproduct/1/1/20161116121031_631.jpg" width="196px" height="196px" border="0"><br><br></a>氢氧化钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_65.html'><img src="/upload/hproduct/1/1/20161116121119_733.jpg" width="196px" height="196px" border="0"><br><br></a>氢氧化钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_66.html'><img src="/upload/hproduct/1/1/20161116121222_824.jpg" width="196px" height="196px" border="0"><br><br></a>氢氧化钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_67.html'><img src="/upload/hproduct/1/1/20161116121337_619.jpg" width="196px" height="196px" border="0"><br><br></a>三聚磷酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_68.html'><img src="/upload/hproduct/1/1/20161116121435_632.jpg" width="196px" height="196px" border="0"><br><br></a>食用明矾</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_69.html'><img src="/upload/hproduct/1/1/20161116121536_463.jpg" width="196px" height="196px" border="0"><br><br></a>碳酸锂</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_70.html'><img src="/upload/hproduct/1/1/20161116121705_943.jpg" width="196px" height="196px" border="0"><br><br></a>纯碱(碳酸钠)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_71.html'><img src="/upload/hproduct/1/1/20161116121818_401.jpg" width="196px" height="196px" border="0"><br><br></a>纯碱(碳酸钠)</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_72.html'><img src="/upload/hproduct/1/1/20161116121909_253.jpg" width="196px" height="196px" border="0"><br><br></a>食用纯碱</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_73.html'><img src="/upload/hproduct/1/1/20161116122106_658.jpg" width="196px" height="196px" border="0"><br><br></a>亚硫酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_74.html'><img src="/upload/hproduct/20161116/20161116122320_837.jpg" width="196px" height="196px" border="0"><br><br></a>工业亚硝酸钠</td>
                                <td align=center><a href='http://0379huagong.com/product_detail_75.html'><img src="/upload/hproduct/1/1/20161116122244_118.jpg" width="196px" height="196px" border="0"><br><br></a>工业亚硝酸钠</td>
                              --></tr>
                        </table>
                    </td>
                    <td id=marquePic2 valign=top></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
            var speed=10
            marquePic2.innerHTML=marquePic1.innerHTML
            function Marquee(){
                if(demo.scrollLeft>=marquePic1.scrollWidth){
                    demo.scrollLeft=0
                }else{
                    demo.scrollLeft++
                }
            }
            var MyMar=setInterval(Marquee,speed)
            demo.onmouseover=function() {clearInterval(MyMar)}
            demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
        </script>
        <!--<div class="pro-imglist boder">
          <h3 class="mian-title"><strong class="fl"><a href="products.html">推荐产品</a></strong><span class="fr"><a href="products.html">更多</a></span></h3>
          <ul>
           <marquee>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product01.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product02.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product03.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product01.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product02.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product03.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product01.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product02.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product03.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product01.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product02.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <li title="产品名称的title在这里提示"><span class="pic"><a href="product_detail.html"><img src="images/product03.jpg" alt="图片名称" /></a></span><a href="product_detail.html" class="title">此处为产品名称</a></li>
            <div class="clear"></div>
            </marquee>
          </ul>
        </div>-->
    </div>
    <div id="sidebar" class="fr">
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
                    <div>咨询热线3</div>
                    <div class="tel-num">15303858325</div>
                    <div>咨询热线1</div>
                    <div class="tel-num">18137956325</div>
                </div>
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
                <li style="text-align:center; border-bottom:1px solid #dddddd;"><strong><a href="products_list_1_prodcate_17.html" style="color:#f60;">电镀专用</a></strong></li>
                <li style="text-align:center;"><strong><a href="products_list_1_prodcate_19.html" style="color:#f60;">其他</a></strong></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--<div id="friendlink" class="page-wrap tl boder">
  <h3><strong class="fl">友情链接</strong></h3>
  <ul>
    <li><a href="#" target="_blank">太平洋门户网</a></li>
    <li><a href="#" target="_blank">网购网</a></li>
    <li><a href="#" target="_blank">我游天下</a></li>
    <li><a href="#" target="_blank">开门红</a></li>
    <li><a href="#" target="_blank">太平洋门户网</a></li>
    <li><a href="#" target="_blank">网购网</a></li>
    <li><a href="#" target="_blank">我游天下</a></li>
    <li><a href="#" target="_blank">开门红</a></li>
    <li><a href="#" target="_blank">太平洋门户网</a></li>
    <li><a href="#" target="_blank">网购网</a></li>
    <li><a href="#" target="_blank">我游天下</a></li>
    <li><a href="#" target="_blank">开门红</a></li>
    <li><a href="#" target="_blank">太平洋门户网</a></li>
    <li><a href="#" target="_blank">网购网</a></li>
    <li><a href="#" target="_blank">我游天下</a></li>
    <li><a href="#" target="_blank">开门红</a></li>
    <div class="clear"></div>
  </ul>
</div>-->

</div>
<div class="clear"></div>
</div>
{{include file='../footer.inc.html'}}