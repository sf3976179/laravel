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
* 定义路由 用来访问控制器 例：http://localhost/laravel/public/home
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/create', 'PostController@create');

Route::get('test/{id}', 'UserController@purchasePodcast');

Route::post('post', 'PostController@store');

// 后台注册页面路由
Route::get('/user_register', 'Register\HomeController@register')->name('user_register');
// 后台注册数据提交路由
Route::post('/user_register','Register\HomeController@register_submit')->name('user_register');
// 登录提交路由
Route::post('/login_in', 'Register\HomeController@loginin')->name('login_in');


// 验证报错路由
Route::get('post/error','HomeController@create');


/******************************************此下面为新路由***********************************************************/

require_once __DIR__ . '/admin_login.php'; //后台登录路由
require_once __DIR__ . '/admin_interface.php'; //后台接口调用
require_once __DIR__ . '/role.php'; //后台管理员分配
require_once __DIR__ . '/home.php'; //前台路由





















Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{id}', 'Register\UserController@show');



// Route::resource('photo', 'PhotoController', ['only' => [
//     'index', 'show'
// ]]);

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
