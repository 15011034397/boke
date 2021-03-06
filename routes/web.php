<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//登录
Route::get('/admin/login','AdminController@login');
Route::post('/admin/login','AdminController@dologin');
Route::get('/captcha/{tmp}','AdminController@captcha');


//后台路由
Route::group(['middleware'=>'admin'],function(){

//退出登录
Route::get('/admin/logout','AdminController@logout');
//后台首页
Route::get('/admin','AdminController@index');


//后台设置
Route::get('/admin/settings','AdminController@settings');
Route::post('/admin/settings','AdminController@update');



//用户管理
Route::resource('user','UserController');

//文章
Route::resource('article','ArticleController');


//标签
Route::resource('tag','TagController');


//分类
Route::resource('cate','CateController');


//友情链接
Route::resource('link','LinkController');

});





//前台的
//前台首页
Route::group(['middleware'=>'as'],function(){
Route::get('/','HomeController@index');

//文章列表
Route::get('/articles','ArticleController@list');

//关于作者
Route::get('/aboutme','UserController@me');

//详情页
Route::get('/{id}.html','ArticleController@show');


Route::resource('dizi','DiziController');


//留言管理
Route::resource('comment','CommentController');

});

Route::get('/weihu','UserController@weihu');

//实现三级联动


