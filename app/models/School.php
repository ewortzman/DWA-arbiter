<?php

class School extends \Eloquent {
	protected $table = "schools";

	public $name; ## string
	public $address; ## string

	public function AD(){ ## fk(users.id)
		return this->hasOne('User', 'AD');
	}
}