@extends('layouts.home')
@section('content')
<main class="r_box">
	@if($article->count() >0)
	@foreach($article as $v)
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
                        {{ $article->appends(request()->all())->links() }}
                    </div>
                </div>
                <hr>
          
        </div>
    </div>
</div>
  </main>



@endsection

@section('left')
    @include('layouts.home._left')
@endsection