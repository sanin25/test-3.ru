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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/admin', 'adminController@index');

Route::group(["" => "admin"], function(){
    Route::get("addpage", [
        "as" => "addPage",
        "uses" => "AdminController@addpage",
    ]);
    Route::post("/savepage",["as" => "savePage", "uses" => "adminController@savepage"]);
    Route::get("/getpage",["as" => "getPage", "uses" => "adminController@getpage"]);
});
