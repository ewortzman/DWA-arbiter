<?php

class UserRole extends \Eloquent {
	protected $table = "user_roles";
	protected $guarded = [];

	public $timestamps = false;

	public function user(){
		return $this->belongsTo('User');
	}

	public function association(){
		return $this->belongsTo('Association');
	}
}