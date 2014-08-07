<?php

class Team extends \Eloquent {
	protected $table = "teams";
	protected $guarded = [];


	public function coach(){ ## fk(User.id)
		return $this->hasOne('User', 'coach');
	}

	public function sport(){ ## fk(sports.id)
		return $this->belongsTo('Sport');
	}

	public function school(){ ## fk(schools.id)
		return $this->belongsTo('School');
	}

	public function events(){ ## Pivot table: event_teams.team_id
		return $this->belongsToMany('Models\\Event', 'event_teams')->withPivot('home');
	}
}