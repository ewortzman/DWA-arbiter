<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return "homepage placeholder";
});

Route::get('/login', function(){
	return "login placeholder";
});

Route::post('/login', function(){
	return "login POST placeholder";
});

Route::get('/dashboard', function(){
	return "dashboard placeholder";
});

Route::get('/association/{id}', function($id){
	return "association placeholder";
});

Route::post('/association/{id}', function($id){
	return "association POST placeholder";
});

Route::get('/association/{id}/members', function($id){
	return "association member list placeholder";
});

Route::get('/association/{id}/schedule', function($id){
	return "association master schedule placeholder";
});

Route::get('/schedule', function(){
	return "schedule placeholder";
});

Route::get('/profile', function(){
	return "profile placeholder";
});

Route::post('/profile', function(){
	return "profile POST placeholder";
});

Route::get('/user/{id}', function($id){
	return "user page placeholder";
});

Route::get('/event/{id}', function($id){
	return "event page placeholder";
});

Route::post('/event/{id}', function($id){
	return "event page POST placeholder";
});

Route::get('/event/add', function(){
	return "add event placeholder";
})

Route::post('/event/add', function(){
	return "add event POST placeholder";
})

Route::get('/school/{id}', function($id){
	return "school page placeholder";
});

Route::post('/school/{id}', function($id){
	return "school page POST placeholder";
});

Route::get('/team/{id}', function($id){
	return "team page placeholder";
});

Route::post('/team/{id}', function($id){
	return "team page POST placeholder";
});

Route::get('/blocks', function(){
	return "blocks placeholder";
});

Route::post('/blocks', function(){
	return "blocks POST placeholder";
});