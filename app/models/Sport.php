<?php

class Sport extends \Eloquent {
	protected $table = "sports";
	protected $guarded = [];

	public function teams(){ ## Owner: teams.sport_id
		return $this->hasMany('Team');
	}

	public function events(){ ## Owner: events.sport_id
		return $this->hasMany('Models\\Event');
	}
}