<?php

namespace Models;

class Event extends \Eloquent {
	protected $table = "events";
	protected $guarded = [];
	protected $appends = array('location');

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

	public function getHomeAttribute(){
		return $this->teams->filter(
			function($team){
				return $team->pivot->home;
			})->first();
	}

	public function getVisitorsAttribute(){
		return $this->teams->filter(
			function($team){
				return !$team->pivot->home;
			});
	}

	public function getLocationAttribute(){
    return $this->street.", ".$this->city.", ".$this->state." ".$this->zip;
  }

  public function setLocationAttribute($value){
		$parsed['street'] = strtok($value, ",");
		$parsed['city'] = trim(strtok(","));
		$stateZip = explode(" ", strtok(","));
		$parsed['state'] = trim($stateZip[0]);
		$parsed['zip'] = trim($stateZip[1]);

    $this->street = $parsed['street'];
    $this->city = $parsed['city'];
    $this->state = $parsed['state'];
    $this->zip = $parsed['zip'];        
	}
}