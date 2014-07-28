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

Route::get('/', array('before'=>'reverse-auth', function()
{
	return View::make('index');
}));

Route::get('/login', array('before'=>'reverse-auth', function(){
	return View::make('login');
}));

Route::post('/login', array('before'=>'reverse-auth', function(){
	$data = Input::all();

	if(Auth::attempt(array('email'=>$data['email'], 'password'=>$data['password']), isset($data['remember']))){
		return Redirect::intended('/dashboard');
	}
	return Redirect::to('/login');
}));

Route::get('/register', array('before'=>'reverse-auth', function(){
	return View::make('register');
}));

Route::post('/register', array('before'=>'reverse-auth', function(){
	$data=Input::all();

	if ($data['password'] != $data['confirm-password']){
		return Redirect::to('/register');
	}

	$user = new User;

	$user->email=$data['email'];
	$user->password=Hash::make($data['password']);
	$user->first=$data['first'];
	$user->last=$data['last'];
	$user->address=$data['street'].", ".$data['city'].", ".$data['state']." ".$data['zip'];
	$user->phone=$data['phone'];

	$user->save();

	Auth::login($user);

	return Redirect::intended('/dashboard');
}));

Route::get('/logout', function(){
	Auth::logout();

	return Redirect::to('/');
});

Route::get('/dashboard', array('before'=>'auth', function(){
	return View::make('dashboard');
}));

Route::get('/association/{id}', function($id){
	return "association $id placeholder";
});

Route::post('/association/{id}', function($id){
	return "association $id POST placeholder";
});

Route::get('/association/{id}/members', function($id){
	return "association $id member list placeholder";
});

Route::get('/association/{id}/schedule', function($id){
	return "association $id master schedule placeholder";
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
	return "user $id placeholder";
});

Route::get('/event/{id}', function($id){
	return "event $id placeholder";
});

Route::post('/event/{id}', function($id){
	return "event $id POST placeholder";
});

Route::get('/event/add', function(){
	return "add event placeholder";
});

Route::post('/event/add', function(){
	return "add event POST placeholder";
});

Route::get('/school/{id}', function($id){
	return "school $id placeholder";
});

Route::post('/school/{id}', function($id){
	return "school $id POST placeholder";
});

Route::get('/team/{id}', function($id){
	return "team $id placeholder";
});

Route::post('/team/{id}', function($id){
	return "team $id POST placeholder";
});

Route::get('/blocks', function(){
	return "blocks placeholder";
});

Route::post('/blocks', function(){
	return "blocks POST placeholder";
});