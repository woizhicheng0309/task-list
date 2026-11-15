<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Main Page";
});

Route::get("/xxx", function () { # /xxx is a URL here
    return "Hello";
})->name('helloRoute'); # helloRoute is a route name here

Route::get("/greet/{name}", function($name){
    return "Hello " . $name . "!";
});

Route::get("/frontdesk/{name}", function($name){
    return "How can I help you " . $name . " ?";
})->name('frontddesk');

Route::get("hallo",function(){
    return redirect()->route('helloRoute');
});

Route::fallback(function(){ # all route that does not exist still go to fallback
    return "still got somewhere!";
});
