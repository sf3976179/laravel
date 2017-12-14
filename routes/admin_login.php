<?php
/**
 * Created by PhpStorm.
 * User: SF
 * Date: 2017/12/8
 * 后台登录路由
 */
// 后台路由组
Route::get('/admin', 'Login\IndexController@index')->name('admin'); //后台首页登录
Route::post('is_login', 'Login\IndexController@is_login'); //登录
Route::group(['middleware' => 'admin'], function () {
    // 后台登录页面路由（后台首页）
    Route::get('/admin1', 'Register\HomeController@index')->name('login_user');

    Route::get('/admin_index','Admin\IndexController@index')->name('admin_index');
    // 文章管理
    Route::get('/article_list','Admin\IndexController@article_list');
    // 文章增加
    Route::get('/article_add','Admin\IndexController@add_article');
    Route::post('/article_add','Admin\IndexController@add_article1')->name('article_submit');

    //文章编辑
    Route::get('/article_edit/{id}','Admin\IndexController@article_edit');

    // 图片上传
    Route::post('/file_upload','Admin\IndexController@ajaxfileupload')->name('file_upload');

    // 会员组（查看会员）
    Route::get('/users','Admin\IndexController@users_list')->name('users');
    // 编辑会员
    Route::get('/user_edit/{user_id}','Admin\IndexController@user_edit');
    Route::post('/user_edit','Admin\IndexController@user_info_edit')->name('user_editok');

    // 首页设置（说说、轮播图、链接）
    Route::get('/home_edit','Admin\IndexController@index_setting');

});