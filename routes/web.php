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
*/


Route::group(['middleware'=>['web']],function(){
Route::any('/', 'Admin\LoginController@login');
//亂碼驗證
// Route::get('admin/code', 'Admin\LoginController@code');

});
//新增一個中間件要到app\Http\kernel.php 內的protected $routeMiddleware 來新增

Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){
   /*
    //原本未加prcfix 和namespace
    //         prcfix/info     namespace\IndexController@info
    Route::any('admin/info', 'Admin\IndexController@info');
    Route::any('admin/index', 'Admin\IndexController@index');
    Route::any('admin/quit', 'Admin\LoginController@quit');
 */
    Route::get('info', 'IndexController@info');
    Route::get('/', 'IndexController@index');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');
    Route::resource('Companyinfo','CompanyinfoController');
    Route::resource('banner','BannerController');
    Route::resource('client_Login_System','client_Login_SystemController');
    Route::post('cate/changeorder', 'CategoryController@changeorder');
    Route::resource('category','CategoryController');
    Route::any('upload', 'CommonController@upload');
    Route::resource('Commodity','CommodityController');

    Route::resource('links','LinksController');
    Route::post('links/changeorder', 'linksController@changeorder');

    Route::resource('navs','NavsController');
    Route::post('navs/changeorder', 'navsController@changeorder');

    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changeorder', 'ConfigController@changeorder');
    Route::post('config/changecontent', 'ConfigController@changecontent');
    Route::resource('config','ConfigController');



});
