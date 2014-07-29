<?php

class Event extends \Eloquent {
	protected $table = "events";

	public function sport(){ ## fk(sports.id)
		return $this->belongsTo('Sport');
	}

	public function notes(){ ## Owner: event_note.event_id
		return $this->hasMany('EventNote', 'event_id');
	}

	public function teams(){ ## Pivot table: event_teams.event_id
		return $this->belongsToMany('Team', 'event_teams')->withPivot('home');
	}
}