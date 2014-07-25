<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $email; ## string (used as username)
	public $name; ## string
	public $address; ## string
	public $phone; ## string nullable
	public $experience; ## integer nullable

	public function notes(){ ## Owner: event_notes.user_id
		return this->hasMany('EventNote');
	}

	public function roles(){ ## Pivot table: user_roles.user_id
		return this->belongsToMany('Association', 'user_roles')->withPivot('role');
	}
}
