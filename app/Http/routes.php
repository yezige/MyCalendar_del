<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//其实被下边覆盖了
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//自动映射/auth和/password下的方法，如auth/create => AuthController@getCreate/postCreate/anyCreate
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//此组需要验证权限
Route::group(['middleware' => 'auth'], function(){
    //定义认证成功后跳转到根目录，默认是/home目录(如果不写这行，就跳转到/home了)
    Route::get('/', 'Home\ListController@index');
    
    //在这个组里边可以省略Home文件夹，定义网站根目录，所在的文件在Home文件件下，且需要认证
    Route::group(['namespace' => 'Home'], function(){
        Route::get('/', 'ListController@index');
    });
    
    //在这个组里边可以省略home访问前缀，可以省略Home文件夹
    Route::group(['prefix' => 'home', 'namespace' => 'Home'], function(){
        //自动映射/home/auth下的资源(类似于controller)，如/home/auth/create => AuthController@create，除index/create/store/show/edit/update/destory需要先自行定义
        Route::get('auth/oauth2callback', 'AuthController@oauth2callback');
        Route::resource('auth', 'AuthController');
    });
});

