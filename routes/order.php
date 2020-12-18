<?php
/**
 * open.php 2020年03月17日 3:40 下午
 * @author chenqionghe
 */

Route::group(['middleware' => ['order']], function () {
    Route::resource('order','orderController');


});

// Route::get('/order','orderController@index');