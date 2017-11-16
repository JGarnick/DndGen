<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subrace;

class Race extends Model
{
    public function subraces()
	{
		return $this->hasMany(Subrace::class, 'parent_race_id', 'id');
	}
}
