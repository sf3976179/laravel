<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/12/20
 * 后台管理员分配
 */

    Route::get('/role_list', 'Admin\RoleController@role_list'); //角色列表
    Route::get('/role_add', 'Admin\RoleController@role_add'); //添加角色
    Route::post('/role_add','Admin\RoleController@role_add_submit')->name('role_add_submit'); //添加角色(post提交)
    Route::get('/role_edit/{role_id}','Admin\RoleController@role_edit'); //编辑角色
    Route::post('/role_edit','Admin\RoleController@role_add_submit')->name('role_add_submit'); //编辑角色(post提交)

    Route::get('/admin_list', 'Admin\RoleController@admin_list')->name('admin_list'); //管理员列表
    Route::get('/admin_add','Admin\RoleController@admin_add'); //添加管理员
    Route::post('/admin_add','Admin\RoleController@admin_add_submit')->name('admin_add_submit'); //添加管理员(post提交)