@extends('layouts.home')

@section('content')
  <main>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{$article->title}}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：<a href="/">{{$article->user->name}}</a></li>
            <li class="lmname"><a href="/articles?cate_id={{$article->cate->id}}">{{$article->cate->name}}</a></li>
            <li class="timer">时间：{{substr($article->created_at,0,10)}}</li>
            <li class="view">{{$article->views}}人已阅读</li>
          </ul>
        </div>
        <div class="tags">
          @foreach($article->tag as $v)
          <a href="/articles?tag_id={{$v->id}}" target="_blank">{{$v->name}}</a> &nbsp; 
          @endforeach
        </div>
        <div class="news_about"><strong>简介</strong>{{$article->intro}}</div>
        <div class="news_con"> {!!$article->content!!}
          &nbsp; </div>
        
      </div>
     <hr>
      <div style="float:right">
       <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

      </div>
      <div class="nextinfo">
        @if($article->prev())
        <p>上一篇：<a href="/{{$article->prev()->id}}.html">{{$article->prev()->title}}</a></p>
        @endif
        @if($article->next())
        <p>下一篇：<a href="/{{$article->next()->id}}.html">{{$article->next()->title}}</a></p>
        @endif
      </div>
      <div class="news_pl">
        <h2>文章评论</h2>
        <div class="gbko"> 
          <script src="/e/pl/more/?classid=77&amp;id=106&amp;num=20"></script>
          @foreach($article->comments as $v)
          <div class="fb">
            <ul style="background:url({{getAvatarProfile($v->email)}}) no-repeat top 20px left 10px;background-size:60px 60px">
              <p class="fbtime"><span>{{$v->created_at}}</span>{{$v->username}}</p>
              <p class="fbinfo">{{$v->content}}</p>
            </ul>
          </div>
          @endforeach
          <div class="fb">
            <ul>
              <p class="fbtime"><span>2018-07-24 08:52:48</span> 卜野</p>
              <p class="fbinfo"></p>
              <div class="ecomment"><span class="ecommentauthor">网友 家蚂蚁 的原文：</span>
                <p class="ecommenttext">坚持哟!看你每天都有写，请继续加油，再接再厉哦</p>
              </div>
            </ul>
          </div>
          
          <script>
      function CheckPl(obj)
      {
      if(obj.saytext.value=="")
      {
      alert("您没什么话要说吗？");
      obj.saytext.focus();
      return false;
      }
      return true;
      }
      </script>
          <form action="/comment" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
            <div id="plpost">
              <p class="saying"><span><a href="/e/pl/?classid=77&amp;id=106">共有<script type="text/javascript" src="/e/public/ViewClick/?classid=77&amp;id=106&amp;down=2"></script>2条评论</a></span>来说两句吧...</p>
              <p class="yname"><span>用户名:</span>
                <input name="username" type="text" class="inputText" id="username" value="" size="16">
              </p>
              <p class="yzm"><span>邮箱:</span>
                <input name="email" type="email" class="inputText" size="16">
              </p>
              {{csrf_field()}}
              <input name="nomember" type="hidden" id="nomember" value="1" checked="checked">
              <input type="hidden" name="article_id" value="{{$article->id}}">
              <textarea name="content" rows="6" id="saytext"></textarea>
              <input name="imageField" type="submit" value="提交">
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  @endsection

  @section('left')
    @include('layouts.home._left')
@endsection