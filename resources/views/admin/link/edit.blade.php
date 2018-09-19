@extends('layouts.admin')

 @section('title')
              这是友情链接的添加
@endsection

@section('title','链接的添加')

@section('content')
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 表单
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>


                </div>

                <div class="tpl-block">

                    <div class="am-g">
                        <div class="tpl-form-body tpl-form-line">
                            <form class="am-form tpl-form-line-form" action="/link/{{$link['id']}}" method="post">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">分类名 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" value="{{$link['name']}}" name="username" id="user-name" placeholder="请输入标题文字">
                                        <small>6-18位数字字母下划线</small>
                                    </div>
                                </div>

                               <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">域名 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="url" value="{{$link['url']}}" id="user-name" placeholder="请输入标题文字">
                                        <small>6-18非空白</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">排序 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input"  value="{{$link['order']}}" name="order" id="user-name" placeholder="请输入标题文字">
                                        <small>数字</small>
                                    </div>
                                </div>

                               

 								{{csrf_field()}}
                                {{method_field('PUT')}}
                                

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
 @endsection