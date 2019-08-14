<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Race;

class Subrace extends Model
{
    public function parentRace()
	{
		return $this->belongsTo(Race::class, "parent_race_id");
	}
	
	public function asi()
	{
		return $this->belongsToMany(Attribute::class, "racial_asi")->withPivot("amount", "attribute_id");
	}

	public function addBonus($payload){
		return $this->attributes["bonuses"][] = $payload;
	}

	public function getBonusesAttribute(){
		return $this->attributes["bonuses"];
	}
}
