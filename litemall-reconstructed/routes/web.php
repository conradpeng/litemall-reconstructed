<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// 闭包路由
// Route::get('/user', function () {
//     //$collect = collect(['name'=>'jack', 'age'=>23, 'gender'=>'male']);
//     // $res = $collect->map(function($item){
//     //     return $item;
//     // });
//     // dd($res);
//     return 111;
// });

// method
// Route::get('users/{id}', "HomeController@getUser");
// Route::post('users/{id}', "HomeController@postUser");
// Route::delete('users/{id}', "HomeController@deleteUser");
// Route::put('users/{id}', "HomeController@putUser");

/* 重定向 */

// 301 重定向
// Route::get('there', function () {
//     return "重定向";
// });
// Route::redirect('here', 'there', 301);

// 302 重定向
// Route::redirect('here', 'there', 301);

/* 传参 */

// query参数
// Route::get('/user', function (Request $request) {
//     return $request;
// });

// request获取

// 参数名获取

// post参数

// url路径参数

// 参数默认值

// 参数正则匹配

// 全局设置参数正则匹配

/* 命名路由 */

// name

// 重定向

/* 路由分组 */




Route::get('/collection', "HomeController@testCollection");
Route::get('/cache', "HomeController@cacheTest");
