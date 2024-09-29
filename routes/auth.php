<?php

use Illuminate\Support\Facades\Route;

Route::group(["as"=>"login.", "prefix"=>"login"], function(){
    Route::get("/", "LoginController@index")->name("index");
    Route::post("/", "LoginController@post")->name("post");
});

Route::get("/logout", "LogoutController@post")->name("logout");
