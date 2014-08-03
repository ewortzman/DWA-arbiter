<?php

namespace Models;

class Event extends \Eloquent {
	protected $table = "events";

	public function association(){ ## fk(sports.id)
		return $this->belongsTo('Association');
	}

	public function notes(){ ## Owner: event_note.event_id
		return $this->hasMany('EventNote', 'event_id');
	}

	public function teams(){ ## Pivot table: event_teams.event_id
		return $this->belongsToMany('Team', 'event_teams')->withPivot('home');
	}

	public function officials(){
		return $this->belongsToMany('User', 'user_events');
	}
}