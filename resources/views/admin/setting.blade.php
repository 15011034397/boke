@extends('layouts.admin')

 @section('title')
              这是网站的设置
@endsection

@section('title','网站设置')

@section('content')
 <div class="tpl-content-wrapper">
            @if(Session::has('success'))
            <div class="am-u-sm-12" style="padding:0px;margin:0px">
                <div class="dashboard-stat purple">
                    <div class="number" style="text-align:center;font-size: 50px"> {{Session::get('success')}} </div>
                </div>
            </div>
            @endif

            @if(Session::has('error'))
            <div class="am-u-sm-12" style="padding:0px;margin:0px">
                <div class="dashboard-stat purple">
                    <div class="number" style="text-align:center;font-size: 50px"> {{Session::get('error')}}</div>
                </div>
            </div>
            @endif

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                            <form class="am-form tpl-form-line-form" action="/admin/settings" method="post" enctype="multipart/form-data">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">作者的名字 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="name" value="{{$setting ? $setting->name : ''}}" id="user-name" placeholder="请输入标题文字">
                                        
                                    </div>
                                </div>

                               

                                 <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">简介 </label>
                        <div class="am-u-sm-9">
                            <textarea class="" rows="5" value="{{$setting ? $setting->intro : ''}}" name="intro" placeholder="输入个人简介"></textarea>
                           
                        </div>
                    </div>


                    <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站的域名 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" value="{{$setting ? $setting->domain : ''}}" name="domain" id="user-name" placeholder="请输入标题文字">
                                        
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">二维码 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="file" class="tpl-form-input" value="{{$setting ? $setting->qrcode : ''}}"  name="qrcode" id="user-name" placeholder="请输入标题文字">
                                        
                                    </div>
                                </div>

                                 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站标题 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" value="{{$setting ? $setting->title : ''}}" name="title" id="user-name" placeholder="请输入标题文字">
                                        
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站关键字 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" value="{{$setting ? $setting->keywords : ''}}" name="keywords" id="user-name" placeholder="请输入标题文字">
                                        
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站开关 <span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input type="radio" class="tpl-form-input" value="1"  name="sopen" id="user-name"  @if($setting->sopen=='1') 'selected' @endif>网站开启
                                         <input type="radio" class="tpl-form-input" value="0"  name="sopen" id="user-name" @if($setting->sopen=='0') 'selected' @endif>网站关闭
                                        
                                    </div>
                                </div>



                                 <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">描述 </label>
                        <div class="am-u-sm-9">
                            <textarea class="" rows="5" value="{{$setting ? $setting->description : ''}}" name="description" placeholder="输入个人简介"></textarea>
                           
                        </div>
                    </div>


                     <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">作者的详细介绍</label>
                        <div class="am-u-sm-9">
                            
                            <script id="editor" type="text/plain"  name="content" value="{{$setting ? $setting->content : ''}}" style="width:100%;height:700px;"></script>
                        </div>
                    </div>

 								{{csrf_field()}}
                                

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                    </div>
                                </div>
                            </form>
                             <script > var ue = UE.getEditor('editor');
</script>>
                        </div>
                    </div>
                </div>


            </div>
 @endsection