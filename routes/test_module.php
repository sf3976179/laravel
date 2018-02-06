<?php
/**
 * Created by PhpStorm.
 * User: SF
 * Date: 2018/1/22
 * 模块练习-redis模块
 */
//Route::get('/article_add','Admin\IndexController@add_article');
//Route::post('/article_add','Admin\IndexController@add_article1')->name('article_submit');
Route::get('/redis','Test\RedisController@index');
Route::post('/youxu_redis','Test\RedisController@youxu_redis');

//并发模块
Route::get('/bingfa','Test\BingfaController@index')->name('bingfa_index'); //首页
Route::post('/bingfa_add','Test\BingfaController@bingfa')->name('bingfa_add1'); //批量插入
