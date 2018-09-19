@extends('layouts.admin') @section('title') 这是文章的修改 @endsection @section('title','文章的修改') @section('content')

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
                <form class="am-form tpl-form-line-form" action="/article/{{$article['id']}}" method="post" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" value="{{$article['title']}}" class="tpl-form-input" name="title" id="user-name" placeholder="请输入标题文字">
                            <small>6-18位数字字母下划线</small>
                        </div>
                    </div>


                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">标签 <span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            @foreach($tag as $v)
                           
                             <lable><input type="checkbox" name="tag_id[]" value="{{$v['id']}}"
                                @if(in_array($v->id,
                                $article->tag()->pluck('id')->toArray()
                                ))
                                checked
                                @endif
                                >{{$v['name']}}</lable>
                             
                             @endforeach
                         </div>
                    </div> 


                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">类型 <span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <select data-am-selected="{searchBox: 1}" name="cate_id" >
                                @foreach($cate as $v)
                                <option value="{{$v['id']}}" 
                                    @if($v['id']==$article['cate_id'])
                                    selected
                                    @endif 
                                >{{$v['name']}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">简介 </label>
                        <div class="am-u-sm-9">
                            <textarea class="" rows="5" name="intro" placeholder="输入个人简介">{{$article['intro']}}</textarea>
                            <small>250字以内写出你的一生...</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">主图 </label>
                        <div class="am-u-sm-9">
                            <img src="{{$article['image']}}">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <button class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 添加主图</button>
                                <input id="doc-form-file" type="file" name="image">
                            </div>
                        </div>
                    </div>


                     <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">内容 </label>
                        <div class="am-u-sm-9">
                            
                            <script id="editor" type="text/plain"  name="content" style="width:100%;height:700px;">{!!$article['content']!!}</script>
                        </div>
                    </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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