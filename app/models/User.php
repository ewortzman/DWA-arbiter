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
	protected $guarded = [];
	protected $appends = array('address', 'name');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function notes(){ ## Owner: event_notes.user_id
		return $this->hasMany('EventNote');
	}

	public function roles(){ ## Pivot table: user_roles.user_id
		return $this->belongsToMany('Association', 'user_roles')->withPivot('role');
	}

	public function events(){
		return $this->belongsToMany('Models\\Event', 'user_events');
	}

	public function getNameAttribute(){
		return $this->first." ".$this->last;
	}

  public function getAddressAttribute(){
      return $this->street.", ".$this->city.", ".$this->state." ".$this->zip;
  }

  public function setAddressAttribute($value){
		$parsed['street'] = strtok($value, ",");
		$parsed['city'] = trim(strtok(","));
		$stateZip = explode(" ", strtok(","));
		$parsed['state'] = trim($stateZip[0]);
		$parsed['zip'] = trim($stateZip[1]);

    $this->street = $parsed['street'];
    $this->city = $parsed['city'];
    $this->state = $parsed['state'];
    $this->zip = $parsed['zip'];        
	}
}
