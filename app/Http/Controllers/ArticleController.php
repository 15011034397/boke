<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cate;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article=Article::orderBy('id','desc')->where('title','like','%'.request()->keyword.'%')->paginate(5);
        return view('admin.article.index',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate=Cate::all();
        $tag=Tag::all();
        return view('admin.article.create',compact('cate','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($);
        //dd($request->all());
        $article=new Article;
        $article->title=$request->title;
        $article->intro=$request->intro;
       
        $article->content=$request->content;
        $article->cate_id=$request->cate_id;
        $article->user_id=1;

        //在这里对于图片的处理 需要另行处理 使用文件上传
        //检测是否有文件上传
        if($request->hasFile('image')) {
    //
            $article->image= '/'.$request->image->store('uploads/'.date('Ymd'));
            //dd($path);
        }
       // $article->save();
        DB::beginTransaction();
        //插入文件
        if($article->save()){
            try{
            $res=$article->tag()->sync($request->tag_id);
            DB::commit();
            return redirect('/article')->with('success','添加成功');
            }catch(\Exception $e){
                DB::rollback();
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //读取文章内容
        $article=Article::findOrFail($id);
        // dd($article);

        //浏览数
        $article->views +=1;
        $article->save();

        //读取分类类容
        $cates=Cate::all();
        //读取标签内容
        $tags=Tag::all();
        //读取推荐文章内容
        $recoms=Article::where('recom',1)->take(8)->orderBy('id','desc')->get();
        //读取排行榜内容
        $views=Article::orderBy('id','desc')->take(8)->get();
        //上一篇文章
        //$prev=Article::where('id','<',$article->id)->orderBy('id','desc')->first();
        //下一篇文章
        //$next=Article::where('id','>',$article->id)->orderBy('id','asc')->first();

        //网站设置
        $settings=Setting::first();

        return view('home.article.show',compact('article','cates','tags','recoms','views','prev','next','settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article=Article::findOrFail($id);
        $tag=Tag::all();
        $cate=Cate::all();
        return view('admin.article.edit',compact('article','tag','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->intro=$request->intro;
       
        $article->content=$request->content;
        $article->cate_id=$request->cate_id;
        $article->user_id=1;

        //在这里对于图片的处理 需要另行处理 使用文件上传
        //检测是否有文件上传
        if($request->hasFile('image')) {
    //
            $article->image= '/'.$request->image->store('uploads/'.date('Ymd'));
            //dd($path);
        }
       // $article->save();
        DB::beginTransaction();
        //插入文件
        if($article->save()){
            try{
            $res=$article->tag()->sync($request->tag_id);
            DB::commit();
            return redirect('/article')->with('success','更新成功');
            }catch(\Exception $e){
                DB::rollback();
                return back()->with('error','更新失败');
            }
        }else{
            return back()->with('error','更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $article=Article::findOrFail($id);
         //先删除中间表里的id因为 他是个缓冲 如果把文章表里的id删掉的话 就没有依据了
         DB::table('article_tag')->where('article_id',$article->id)->delete();

         if($article->delete()){
            return redirect('/article')->with('success','删除成功');
         }else{
            return back()->with('error','删除失败');
         }
         

    }

/**
    文章列表
*/
    public function list(Request $request){
        //dd(111);
        $cates=Cate::all();
        $tags=Tag::all();
        //获取推荐
        $recoms=Article::getRecommend(8);
        //排行
        $views=Article::getPaiHang(8);

        //网站设置
        $settings=Setting::first();
        //dd($tags);

        //读取文章
       if(!empty($request->cate_id)){
        $article=Article::where('cate_id',$request->cate_id)->orderBy('id','desc')->paginate(10);
        }

        
       if(empty($article)){
            $article=Article::orderBy('id','desc')->paginate(10);
        }

        //判断标签id是否传递
         if(!empty($request->tag_id)){
             $tag=Tag::findOrFail($request->tag_id);
           $article=$tag->articles()->paginate(10);
         }

         


        //  if(!empty($request->tag_id)){
        //     $tag=Tag::findOrFail($request->tag_id);
        //     $article=$tag->articles()->paginate(10);
        // }

         
            // $article=Article::orderBy('id','desc')->paginate(10);
        

        return view('home.article.index',compact('cates','tags','recoms','views','settings','article'));
    }
}
