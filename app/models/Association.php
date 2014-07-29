<?php

class Association extends \Eloquent {
	protected $table = "associations";

	public function sport(){ ## fk(sports.id)
		return $this->belongsTo('Sport');
	}

	public function members(){ ## Pivot table: user_roles.association_id
		return $this->belongsToMany('User', 'user_roles')->withPivot('role'); ## role = enum('AD', 'coach', 'official', 'commissioner')
	}
}