@extends('layouts.admin') @section('title','这是文章展示页面') @section('content')
<div class="tpl-block">
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="/article/create" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                    
                    <a href="/article" type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</a>
                </div>
            </div>
        </div>
        <form action="/article" method="get">
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" name="keyword" value="{{request()->keyword}}" class="am-form-field">
                    <span class="am-input-group-btn">
		            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" ></button>
		        </span>
                </div>
            </div>
        </form>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
           
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                        <tr>
                            <th class="table-check">
                                <input type="checkbox" class="tpl-table-fz-check">
                            </th>
                            <th class="table-id">ID</th>
                            <th class="table-title">文章名</th>
                            <th class="table-title">主图</th>
                            <th class="table-title">分类</th>
                            <th class="table-title">浏览数</th>
                            <th class="table-set">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($article as $v)
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>{{$v['id']}}</td>
                            <td><a href="#">{{$v['title']}}</a></td>
                            <td><img src="{{$v['image']}}" width="80"></td>
                            <td><a href="#">{{$v->cate->name}}</a></td>
                            <td><a href="#">{{$v['views']}}</a></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a  href="/article/{{$v['id']}}/edit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                        <form style="float:left" action="/article/{{$v['id']}}" method="post">
                                        	{{method_field('DELETE')}}
                                        	{{csrf_field()}}
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" ><span class="am-icon-trash-o"></span> 删除</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
@endsection