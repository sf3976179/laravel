<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2018/1/10
 */
// 前台路由组
Route::group(['middleware' => 'index'], function () {
    //前台首页
    Route::get('/index','Index\IndexController@index')->name('index');
    //文章查看
    Route::get('/index/article/{id}', 'Index\IndexController@article_info');
    //up主订阅
//    Route::post('upAdd','Index\IndexController@upSubscribe');

    Route::get('upAdd','Index\IndexController@upSubscribe');

//    Route::get('publish', function () {
//        // 路由逻辑...
//        Redis::publish('test-channel', json_encode(['foo' => 'bar']));
//    });
});