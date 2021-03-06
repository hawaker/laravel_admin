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
Route::get("/", function() {
    return view("welcome");
});
Route::any("{file}.html", function($file) {
    return view("demo/" . $file);
});
Route::any("{folder}/{file}.html", function($folder, $file) {
    return view($folder . "/" . $file);
});
Route::any("{dict}/{folder}/{file}.html", function($dict, $folder, $file) {
    return view($dict . "/" . $folder . "/" . $file);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("permission")->group(function() {
    $c = "PermissionController@";
    Route::any("index", $c . "index");
    Route::get("create", $c . "create");
    Route::post("create", $c . "store");
    Route::prefix("groups")->namespace("Group")->group(function() {
        $c = "PermissionController@";
        Route::get("create", $c . "create");
        Route::post("create", $c . "store");
        Route::post("del/{id}", $c . "destory");
        Route::get("edit/{id}", $c . "edit");
        Route::post("edit/{id}", $c . "edit");
        Route::any("/", $c . "index");
        Route::any("lookup", $c . "lookup");
    });
    Route::any("show/{id}", $c . "show");
});

Route::prefix("role")->group(function() {
    $c = "RoleController@";
    Route::prefix("groups")->namespace("Group")->group(function() {
        $c = "RoleController@";
        Route::match(['post', 'get'], '/', $c . "index");
        Route::get("create", $c . "create");
        Route::post("create", $c . "store");
    });
    Route::get("index", $c . "index");
});
Route::prefix("user")->group(function() {
    $c = "UserController@";
    Route::get("index", $c . "index");
});
