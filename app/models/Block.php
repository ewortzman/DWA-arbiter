<?php

class Block extends \Eloquent {
	protected $table = "blocks";

	public function user(){ ## fk(users.id)
		return $this->belongsTo('User');
	}
}