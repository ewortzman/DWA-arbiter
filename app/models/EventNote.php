<?php

class EventNote extends \Eloquent {
	protected $table = "event_notes";

	public $note; ## text

	public function event(){ ## fk(events.id)
		return this->belongsTo('Event');
	}

	public function user(){ ## fk(users.id)
		return this->belongsTo('User');
	}
}