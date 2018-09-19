<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cate;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::orderBy('id','desc')->where('name','like','%'.request()->keyword.'%')->paginate(5);
        return view('admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
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
      // dd($request->all());
        $user=new User;
        //$res=$user->all();
       // dd($request->username);
        $user->name=$request->username;
        $user->password=Hash::make($request->password);
       
        if($user->save()){
            return redirect('/user')->with('success','添加成功');
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
        //接值
        $user=User::findOrfail($id);
        //dd($user);
        //把值返回给页面
        return view('admin.user.edit',['user'=>$user]);
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
        //接值 然后把数据写到数据库中
        $user=User::findOrfail($id);
        $user->name=$request->username;
        if($user->save()){
            return redirect('/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //接值 删除并返回到页面
        $user=User::findOrfail($id);
        if($user->delete()){
            return redirect('/user')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
        
    }

//关于我
    public function me(){
        //读取设置数据s
        $settings = Setting::first();

        //读取分类
        $cates = Cate::all();

       // $recoms = Article::all();




        return view('home.me', compact('settings', 'cates'));
    }




    /*
        实现三级联动
    */

        public function weihu()
        {
            return '网站维护中';
        }
   
}
