<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\belongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model


{

	//在这里使用软删除 县引入 再转化日期
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    //
    //和标签建立关系
    public function tag(){
    	return $this->belongsToMany('App\Tag');
    }

    //文章和类的关系是属于
    public function cate(){
    	return $this->belongsTo('App\Cate');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    //关于上一页 下一页
    public function prev(){
         return Article::where('id','<',$this->id)->orderBy('id','desc')->first();
    }

    public function next(){
       return  Article::where('id','>',$this->id)->orderBy('id','asc')->first();

    }


    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public static function getRecommend($num){
        //读取推荐文章内容
        return self::where('recom','1')->take($num)->orderBy('id','desc')->get();
    }




    public static function getPaiHang($num){
        return self::orderBy('views','desc')->take($num)->get();
    }
}
