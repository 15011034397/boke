<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session; 

class AdminController extends Controller
{
    //
    /*
		后台首页
    */
    public function index(){
    	return view('admin');
    }


    /**
		后台设置页
    */

	



    public function update(Request $req){
        $setting=Setting::first();
        if(!$setting){
            $setting=new Setting;
     
        $setting->name=$req->name;
        $setting->intro=$req->intro;
        $setting->content=$req->content;
        $setting->keywords=$req->keywords;
        $setting->domain=$req->domain;
        $setting->description=$req->description;
        $setting->title=$req->title;
        $setting->sopen=$req->sopen;
       // $setting->qrcode=$req->input('qrcode','https://picsum.photos/400/300?image=2');

         if ($req->hasFile('qrcode')) {
            $setting->qrcode = '/'.$req->qrcode->store('uploads');
        }


        if($setting->save()){
            return back()->with('success','设置成功');
        }else{
            return back()->with('error','设置失败');
        }
    }

  //dd($req->all());

}


public function settings(){
        //return '后台设置页';
        $setting=Setting::first();
        return view('admin.setting',compact('setting'));
    }


    public function login(){
        return view('admin.login');
    }


    public function dologin(Request $req){


        //根据用户名读数据库
        $user=User::where('name',$req->name)->first();
        
        $userInput = \Request::get('captcha');
        
    // if(!$user){
        //     return back()->with('error','登录失败');
        // }
        // //校验密码
        // if(Hash::check($req->password,$user->password)){
        //     //写入session
        //     session(['name'=>$user->name,'id'=>$user->id]);
        //     return redirect('/admin')->with('success','登陆成功');
        // }else{
        //     return back()->with('error','登录失败');
        // }

        $password=Hash::check($req->password,$user->password); 
        if(Session::get('milkcaptcha') == $userInput){
            if($user && $password){
                session(['name'=>$user->name,'id'=>$user->id]);
                return redirect('/admin')->with('success','登陆成功');
            }else{
                return back()->with('error','用户名或密码错误');
            }
         }else{
        //     //echo '验证码错误';
            return back()->with('error','验证码错误');
         }
        }



    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/admin/login')->with('success','退出成功');
    }


    //生成验证码方法
public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
 
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //dd($a);

        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

    }


   
}
