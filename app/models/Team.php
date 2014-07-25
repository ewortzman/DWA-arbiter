<?php

class Team extends \Eloquent {
	protected $table = "teams";

	public $name; ## string
	public $level; ## string
	public $gender; ## enum('boys', 'girls', 'coed')

	public function sport(){ ## fk(sports.id)
		return this->belongsTo('Sport');
	}

	public function school(){ ## fk(schools.id)
		return this->belongsTo('School');
	}

	public function events(){ ## Pivot table: event_teams.team_id
		return this->belongsToMany('Event', 'event_teams')->withPivot('home');
	}
}