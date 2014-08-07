<?php

class Block extends \Eloquent {
	protected $table = "blocks";
	protected $guarded = [];

	public function user(){ ## fk(users.id)
		return $this->belongsTo('User');
	}
}