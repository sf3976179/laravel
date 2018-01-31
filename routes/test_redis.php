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