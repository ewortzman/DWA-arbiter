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
	$user->street=$data['street'];
	$user->city=$data['city'];
	$user->state=$data['state'];
	$user->zip=$data['zip'];
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

	$roles = [];
	$assoc_lookup = [];

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

/**
 **********************************
 * ROUTE: Association member list (JSON)
 **********************************
 */
Route::get('/association/{id}/members', function($id){
	$members = Association::find($id)->members;
	return Response::json($members);
});

/**
 **********************************
 * ROUTE: Schedule
 **********************************
 */
Route::get('/schedule', function(){
	$role = Input::get("role");
	if($role == "official"){
		$events = Auth::user()->events;
	} else if($role == "commissioner"){
		$assoc = Association::find(Input::get("assoc"));
		$events = $assoc->events;
	}

	return View::make("schedule")
		->with("user", Auth::user())
		->with("events", $events)
		->with("role", Input::get('role'));
});

Route::get('/profile', function(){
	return "profile placeholder";
});

Route::post('/profile', function(){
	return "profile POST placeholder";
});

/**
 **********************************
 * ROUTE: View Event
 **********************************
 */
Route::get('/event/{id}', function($id){
	return View::make('event')
		->with('event', Models\Event::find($id))
		->with('role', Input::get('role'));
});

/**
 **********************************
 * ROUTE: Edit Event
 **********************************
 */
Route::post('/event/{id}', function($id){
	$intent = Input::get('intent');

	if ($intent == "addOfficial"){
		$newOfficial = User::find(Input::get('id'));
		if ($newOfficial){
			$event = Models\Event::find($id);
			$event->officials()->attach($newOfficial->id);

			Mail::send('emails.assignment', array('event' => $event), function($message) use ($newOfficial){
		    $message->to($newOfficial->email, $newOfficial->first." ".$newOfficial->last);
		    $message->from('noreply@localhost', 'Do Not Reply');
		    $message->subject('New Assignment');
		  });
		}
	}

	return $newOfficial;
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

Route::get('/new-association', array('before'=>'auth', function(){
	$sports = Sport::all();

	return View::make('new-association')
		->with('sports', $sports);
}));

Route::post('/new-association', function(){
	$data = Input::all();
	$user = Auth::user();

	$assoc = new Association();
	$assoc->name=$data['name'];
	$assoc->sport_id=$data['sport'];
	$assoc->save();

	$user->roles()->attach($assoc->id, ['role'=>'Commissioner']);

	return Redirect::to('/');
});

Route::get('/join-association', array('before'=>'auth', function(){
	$associations = Association::all();

	return View::make('join-association')
		->with('associations', $associations);
}));

Route::post('/join-association', function(){
	$data = Input::all();
	$user = Auth::user();

	$user->roles()->attach($data['association'], ['role'=>'Official']);
	return Redirect::to('/');
});

Route::get('/new-sport', array('before'=>'auth', function(){
	return View::make('new-sport');
}));

Route::post('/new-sport', function(){
	$data = Input::all();

	$sport = new Sport();
	$sport->name = $data['name'];
	$sport->save();

	return Redirect::to('/');
});

Route::get('/new-school', array('before'=>'auth', function(){
	return View::make('new-school');
}));

Route::post('/new-school', function(){
	$data = Input::all();
	$user = Auth::user();

	$school = new School();
	$school->name = $data['name'];
	$school->street = $data['street'];
	$school->city = $data['city'];
	$school->state = $data['state'];
	$school->zip = $data['zip'];
	$school->AD = $user->id;

	$user->roles()->attach(9999, ['role'=>'Athletic Director']);

	$school->save();

	return Redirect::to('/');
});

Route::get('/new-team', array('before'=>'auth', function(){
	$schools = School::all();
	$sports = Sport::all();

	return View::make('new-team')
		->with('schools', $schools)
		->with('sports', $sports);
}));

Route::post('/new-team', function(){
	$data = Input::all();

	Team::create([
		'school_id' => $data['school'],
		'sport_id' => $data['sport'],
		'name' => $data['name'],
		'level' => $data['level'],
		'gender' => $data['gender']
	]);

	return Redirect::to('/');
});