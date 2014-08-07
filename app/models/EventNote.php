<?php

class EventNote extends \Eloquent {
	protected $table = "event_notes";
	protected $guarded = [];

	public function event(){ ## fk(events.id)
		return $this->belongsTo('Models\\Event');
	}

	public function user(){ ## fk(users.id)
		return $this->belongsTo('User');
	}
}