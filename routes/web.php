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
route::any('/',"IndexController@index");
route::prefix('index')->group(function(){
//    文章详情
    route::any('details',"IndexController@details");
    //检测用户是否存在
    route::any('getuser',"IndexController@getUser");
    //评论
    route::any('comment',"IndexController@Comment");
});
//登录
route::any('index/register',"IndexController@Register");
//注册
route::any('index/registerto',"IndexController@RegitserTo");
route::any('registeradd','IndexController@RegisterAdd');
route::any('successful','IndexController@Successful');
route::any('index/updatelist','IndexController@UpdateList');

