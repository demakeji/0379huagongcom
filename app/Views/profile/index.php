{{include file='../header.inc.html'}}
<div id="container" class="page-wrap">
  <div id="content" class="fr">
    <div class="crumb-nav">当前位置：<a href="index.html">首页</a><em>></em>产品供应<em>></em>供货供应</div>
    <div class="inner-main">
      <h3 class="title-bar"><strong class="fl">公司简介</strong><span class="fr"></span></h3>
      <div class="control-box">
        <ul class="img-list">
        	{{foreach item=pro from=$result}}
          <li><span class="pic"><a href="honor_detail_{{$pro.Pid}}.html"><img src="{{$pro.PhotoUrl}}" width="138" height="138" alt="此处显示图片名称" title="此处显示图片名称"/></a></span>
            <p class="title"><a href="honor_detail_{{$pro.Pid}}.html">{{$pro.PhotoTitle}}</a></p>
          </li>
          {{/foreach}}
        <div class="clear"></div>
        </ul>
        <p class="pagination">{{$page_tip_bottom}}</p>
      </div>
      <div class="control-box entry-body aboutus">
        <p>洛阳德玛化工经营品种涉及选矿、陶瓷、耐材、电镀、农业。如：草酸、EDTA、硫酸钾、硫酸锰、硫酸铜、硫酸锌、氯化锌、片碱、磷酸二氢钾、进口硼酸、硼钙石等。地址位于中原腹地美丽古都牡丹花城-洛阳市。单位在郑州市航海西路和洛阳市龙门大道牡丹宫两地设有大型仓库，地理位置优越，交通便利。
本公司经过多年的诚信经营，已在豫西地区享有盛誉和广泛的影响力。公司于2008年加入洛阳市化工商会，现属化工商会“常务会长单位”。
区政协委员、公司董事长裴耀郎同志秉承 “以诚筑基、立信为本”的企业宗旨和“质量第一、服务一流”的经营理念带领全体员工竭诚为新老客户服务，欢迎您的光临，我们愿诚心与您合作共赢，共创伟业！</p>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
{{include file='../footer.inc.html'}}