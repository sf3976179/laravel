<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/12/20
 * 后台管理员分配
 */

    Route::get('/admin_list', 'Admin\RoleController@admin_list'); //管理员列表
    Route::get('/role_list', 'Admin\RoleController@role_list'); //角色列表
    Route::get('/role_add', 'Admin\RoleController@role_add'); //添加角色
    Route::post('/role_add','Admin\RoleController@role_add_submit')->name('role_add_submit'); //添加角色(post提交)
