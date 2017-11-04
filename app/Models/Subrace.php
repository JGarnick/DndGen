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
}
