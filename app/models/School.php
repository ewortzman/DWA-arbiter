<?php

class School extends \Eloquent {
	protected $table = "schools";

	public function AD(){ ## fk(users.id)
		return $this->hasOne('User', 'AD');
	}
}