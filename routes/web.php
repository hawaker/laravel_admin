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
Route::get("/",function(){
    return view("welcome");
});
    Route::any("{file}.html", function($file) {
        return view($file);
    });
    Route::any("{folder}/{file}.html", function($folder, $file) {
        return view($folder . "/" . $file);
    });
    Route::any("{dict}/{folder}/{file}.html", function($dict, $folder, $file) {
        return view($dict . "/" . $folder . "/" . $file);
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("permission")->group(function(){
    $c="PermissionController@";
    Route::get("index",$c."index");
    Route::get("groups",$c."groups");
});