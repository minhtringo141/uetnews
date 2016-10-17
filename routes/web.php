<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
  return view('admin.layout.index');
});

Route::group(['prefix'=>'admin'], function(){
  Route::group(['prefix'=>'theloai'], function(){
    Route::get('danhsach', 'TheLoaiController@getDanhSach');

    Route::get('sua/{id}', 'TheLoaiController@getSua');
    Route::post('sua/{id}', 'TheLoaiController@postSua');

    Route::get('them', 'TheLoaiController@getThem');
    Route::post('them', 'TheLoaiController@postThem');

    Route::get('xoa/{id}', 'TheLoaiController@getXoa');
  });


  Route::group(['prefix'=>'loaitin'], function(){
    Route::get('danhsach', 'LoaiTinController@getDanhSach');

    Route::get('sua/{id}', 'LoaiTinController@getSua');
    Route::post('sua/{id}', 'LoaiTinController@postSua');

    Route::get('them', 'LoaiTinController@getThem');
    Route::post('them', 'LoaiTinController@postThem');

    Route::get('xoa/{id}', 'LoaiTinController@getXoa');
  });

  Route::group(['prefix'=>'tintuc'], function(){
    Route::get('danhsach', 'TinTucController@getDanhSach');
    Route::get('sua', 'TinTucController@getSua');
    Route::get('them', 'TinTucController@getThem');
    Route::post('them','TinTucController@postThem');
  });

  Route::group(['prefix'=>'ajax'], function(){
    Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
  });

});
