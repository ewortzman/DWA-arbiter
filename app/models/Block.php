<?php

class Block extends \Eloquent {
	protected $table = "blocks";

	public $start; ## datetime
	public $end; ## datetime
	public $note; ## text nullable

	public function user(){ ## fk(users.id)
		return this->belongsTo('User');
	}
}