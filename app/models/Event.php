<?php

class Event extends \Eloquent {
	protected $table = "events";

	public $location; ## string
	public $type; ## string
	public $start; ## datetime
	public $end; ## datetime
	public $fee; ## float

	public function sport(){ ## fk(sports.id)
		return this->belongsTo('Sport');
	}

	public function notes(){ ## Owner: event_note.event_id
		return this->hasMany('EventNote', 'event_id');
	}

	public function teams(){ ## Pivot table: event_teams.event_id
		return this->belongsToMany('Team', 'event_teams')->withPivot('home');
	}
}