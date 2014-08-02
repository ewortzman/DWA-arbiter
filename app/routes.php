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

/**
 **********************************
 * ROUTE: index
 **********************************
 */
Route::get('/', array('before'=>'reverse-auth', function()
{
	return View::make('index');
}));

/**
 **********************************
 * ROUTE: login
 **********************************
 */
Route::get('/login', array('before'=>'reverse-auth', function(){
	return View::make('login');
}));

/**
 **********************************
 * ROUTE: login POST
 **********************************
 */
Route::post('/login', array('before'=>'reverse-auth', function(){
	$data = Input::all();

	$user=array(
		'email'=>$data['email'],
		'password'=>$data['password'],
		'confirmed'=>1
	);

	if(Auth::attempt($user, isset($data['remember']))){
		return Redirect::intended('/dashboard');
	}
	return Redirect::to('/login');
}));

/**
 **********************************
 * ROUTE: register
 **********************************
 */
Route::get('/register', array('before'=>'reverse-auth', function(){
	return View::make('register');
}));

/**
 **********************************
 * ROUTE: register POST
 **********************************
 */
Route::post('/register', array('before'=>'reverse-auth', function(){
	$data=Input::all();

	if ($data['password'] != $data['confirm-password']){
		return Redirect::to('/register');
	}

	$user = new User;

	$user->email=$data['email'];
	$user->password=Hash::make($data['password']);
	$user->first=ucfirst($data['first']);
	$user->last=ucfirst($data['last']);
	$user->address=$data['street'].", ".$data['city'].", ".$data['state']." ".$data['zip'];
	$user->phone=$data['phone'];
	$user->confirmation=Str::random(32);
	$user->confirmed=0;

	$user->save();

	Mail::send('emails.verify', array('code' => $user->confirmation), function($message) use ($user){
    $message->to($user->email, $user->first." ".$user->last);
    $message->from('noreply@localhost', 'Do Not Reply');
    $message->subject('Thank you for registering!');
  });

	return View::make('post-reg')->with('user', $user);
}));

/**
 **********************************
 * ROUTE: verify
 **********************************
 */
Route::get('/verify/{code}', function($code){
	$user = User::where('confirmation', '=', $code)->first();

	if ($user){
		$user->confirmed=1;
		$user->save();
	} else {
		return Redirect::to('/')->with('flash-message', 'No matching user was found');
	}

	Auth::login($user);

	return Redirect::to('/dashboard');
});

/**
 **********************************
 * ROUTE: logout
 **********************************
 */
Route::get('/logout', function(){
	Auth::logout();

	return Redirect::to('/');
});

/**
 **********************************
 * ROUTE: dashboard
 **********************************
 */
Route::get('/dashboard', array('before'=>'auth', function(){
	$user = Auth::user();
	$user_roles = $user->roles;

	foreach ($user_roles as $role){
		$roles[$role->pivot->role][] = $role->pivot->association_id;
		$assoc_lookup[$role->pivot->association_id] = Association::find($role->pivot->association_id)->name;
	}

	return View::make('dashboard')
		->with('roles', $roles)
		->with('assoc_lookup', $assoc_lookup);
}));

/**
 **********************************
 * ROUTE: commissioner
 **********************************
 */
Route::get('/commissioner', function(){
	return 'Commissioner';
});

/**
 **********************************
 * ROUTE: official
 **********************************
 */
Route::get('/official', function(){
	return View::make("official");
});

/**
 **********************************
 * ROUTE: AD
 **********************************
 */
Route::get('/athletic_director', function(){
	return 'Athletic Director';
});

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
	$events = Auth::user()->events();

	return View::make("schedule")
		->with("events", $events);
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