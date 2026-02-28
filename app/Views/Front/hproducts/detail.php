<div id="container" class="page-wrap">
    <div id="content" class="fr">
        <div class="crumb-nav">当前位置：<a href="index.html">首页</a><em>></em><a href="products.html">供货信息</a><em>></em>此处为产品名称</div>
        <div class="inner-main">
            <h3 class="title-bar"><strong class="fl">供货信息</strong><span class="fr"></span></h3>
            <div class="control-box pro-info">
                <div class="pro-img fl"><span><img width="250px" height="250px" src="<?= esc($Hproduct['image'])?>" alt="此处显示产品名称" title="此处显示产品名称"/></span></div>
                <div class="pro-summary fl">
                    <h3>{{$prod.title}}</h3>
                    <ul>
                        <!--<li><strong>最小起订：</strong>不限</li>
                        <li><strong>供货总量：</strong>10000千克</li>
                        <li><strong>价　　格：</strong><em class="price">70.00</em>元/千克</li>-->
                        <li><strong>产&nbsp;&nbsp;地：</strong>{{$prod.chandi}}</li>
                    </ul>
                    <!--<p class="button"><a href="order.html" class="current">我要订购</a></p>-->
                    <p class="more"><a href="#" class="favorite fl">收藏本信息</a><a href="contact.html" class="contact-us fl">联系我们</a></p>
                </div>
                <div class="clear"></div>
                <div class="pro-details mt10">
                    <h3><strong>产品详情</strong></h3>
                    <dl class="description">
                        <dt class="header4">详细参数</dt>
                        <dd class="content">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="parameter">
                                <tr>
                                    <th scope="row">规格：</th>
                                    <td>{{$prod.guige}}</td>
                                    <th>含量：</th>
                                    <td>{{$prod.hanliang}}</td>
                                </tr>
                                <!--<tr>
                                  <th scope="row">品牌：</th>
                                  <td>现货</td>
                                  <th>型号：</th>
                                  <td>进口</td>
                                </tr>
                                <tr>
                                  <th scope="row">材质：</th>
                                  <td>&nbsp;</td>
                                  <th>电源电压：</th>
                                  <td>&nbsp;</td>
                                </tr>-->
                            </table>
                        </dd>
                        <dt class="header4 mt10">产品简介</dt>
                        <dd class="content f14">{{$prod.content}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <!--<div id="sidebar" class="fl">
      <div class="side-nav mb10">
        <h2>货品分类</h2>
        <ul class="category">
          <li><a href="products.html">全部供货信息</a></li>
          <li><a href="#">螺旋钢</a></li>
          <li><a href="#">圆钢</a></li>
          <li><a href="#">型材</a></li>
          <li><a href="#">板材</a></li>
          <li class="last"><a href="#">管材</a></li>
        </ul>
        <span class="bottom"></span> </div>
      <div class="search-bar mb10">
        <form>
          <input name="textfield" type="text" class="text" id="textfield" value="请输入产品名称" />
          <input name="button2" type="submit" class="btn" id="button2" value="搜索" />
        </form>
      </div>
      <div class="feedback boder mb10">
        <a href="feedback.html"><img src="images/feedback.jpg" width="218" height="70" alt="在线留言" title="在线留言"/></a>
      </div>
      <div class="contact-us boder">
        <h3><a href="contact.html" title="联系我们">联系我们</a></h3>
        <ul>
          <li><strong>地址：</strong>河南省洛阳市洛龙区龙门大道鑫华化工市场5排19-20号</li>
          <li><strong>电话：</strong>0379-65236168<br /></li>
          <li><strong>传真：</strong>0379-65236166</li>
          <li><strong>邮编：</strong>471000</li>
        </ul>
      </div>
    </div>-->
    <div class="clear"></div>
</div>