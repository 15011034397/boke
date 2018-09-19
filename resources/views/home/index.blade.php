@extends('layouts.home')
@section('left')
<aside class="l_box" style="position: relative; left: auto; width: 30%;">
       <div class="about_me">
      <h2>关于我</h2>
      <ul>
        <i><img src="{{$settings->qrcode}}"></i>
        <p><b>{{$settings->name}}</b>{{$settings->intro}}</p>
      </ul>
    </div>
      
      <div class="search">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
          <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
          <input name="show" value="title" type="hidden">
          <input name="tempid" value="1" type="hidden">
          <input name="tbname" value="news" type="hidden">
          <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
      </div>
       <div class="fenlei">
      <h2>文章分类</h2>
      <ul>
        @foreach($cates as $v)
        <li><a href="/articles?cate_id={{$v->id}}">{{$v->name}}（{{$v->articles()->count()}}）</a></li>
        @endforeach
       
      </ul>
    </div>
      <div class="tuijian">
        <h2>站长推荐</h2>
        <ul>
        	@foreach(\App\Article::getRecommend(5) as $v)
          <li><a href="/{{$v->id}}.html">{{$v->title}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="links">
        <h2>友情链接</h2>
        <ul>
        	@foreach($links as $v)
          <a href="{{$v->url}}">{{$v->name}}</a> 
          @endforeach
        </ul>
      </div>
      <div class="guanzhu">
        <h2>关注我 么么哒</h2>
        <ul>
          <img src="{{$settings->qrcode}}">
        </ul>
      </div>
  </aside>
@endsection

@section('content')
<main class="r_box">
   @if($articles->count() >0)
	@foreach($articles as $v)
    <li><i><a href="/{{$v->id}}.html"><img ta-src="{{$v->image}}"></a></i>
      <h3><a href="/{{$v->id}}.html">{{$v->title}}</a></h3>
      <p>{{$v->intro}}</p>
    </li>
    @endforeach
    @else
    <li>
    	暂无数据
    </li>

    @endif

    <div class="am-cf">
                    <div class="am-fr">
                        <style>
                        .pagination {
                            padding-left: 0;
                            margin: 1.5rem 0;
                            list-style: none;
                            color: #999;
                            text-align: left;
                        }

                        .pagination li {
                            display: inline-block;
                        }

                        .pagination li a,
                        .pagination li span {
                            color: #23abf0;
                            border-radius: 3px;
                            padding: 6px 12px;
                            position: relative;
                            display: block;

                            text-decoration: none;
                            line-height: 1.2;
                            background-color: #fff;
                            border: 1px solid #ddd;
                            border-radius: 0;
                        }

                        .pagination .active span {
                            color: #23abf0;
                            border-radius: 3px;
                            padding: 6px 12px;
                            position: relative;
                            display: block;

                            text-decoration: none;
                            line-height: 1.2;
                            background-color: #fff;
                            border: 1px solid #ddd;
                            border-radius: 0;
                            margin-bottom: 5px;
                            margin-right: 5px;

                            background: #23abf0;
                            color: #fff;
                            border: 1px solid #23abf0;
                            padding: 6px 12px;
                        }

                        .pagination span .active {
                            background: #23abf0;
                            color: #fff;
                            border: 1px solid #23abf0;
                            padding: 6px 12px;
                        }
                        </style>
                        {{ $articles->appends(request()->all())->links() }}
                    </div>
                </div>
                <hr>
          
        </div>
    </div>
</div>
  </main>
@endsection