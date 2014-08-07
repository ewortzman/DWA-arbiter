<?php

class Association extends \Eloquent {
	protected $table = "associations";
	protected $guarded = [];

	public function sport(){ ## fk(sports.id)
		return $this->belongsTo('Sport');
	}

	public function events(){
		return $this->hasMany('Models\\Event');
	}

	public function members(){ ## Pivot table: user_roles.association_id
		return $this->belongsToMany('User', 'user_roles')->withPivot('role'); ## role = enum('AD', 'coach', 'official', 'commissioner')
	}
}