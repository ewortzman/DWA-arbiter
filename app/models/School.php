<?php

class School extends \Eloquent {
	protected $table = "schools";
	protected $appends = array('address');

	public function AD(){ ## fk(users.id)
		return $this->hasOne('User', 'AD');
	}

	public function getAddressAttribute(){
    return $this->street.", ".$this->city.", ".$this->state." ".$this->zip;
  }

  public function setAddressAttribute($value){
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