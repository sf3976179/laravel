<?php
/**
 * Created by SF.
 * User: SF
 * 后台接口调用
 * Date: 2017/10/18
 * Time: 9:57
 */
Route::group(['middleware' => 'admin'], function () {
    Route::get('/interface_menu/{id}', 'Admin\InterfaceMenuController@menu')->name('interface_menu'); //接口信息详情

    Route::post('/interface_send','Admin\InterfaceMenuController@interfaceSend'); //接口数据发送

});
