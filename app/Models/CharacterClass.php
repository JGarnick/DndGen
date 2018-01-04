<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClassProficiency;

class CharacterClass extends Model
{
    protected $table = "classes";
	
	public classProficiencies()
	{
		return $this->hasMany(ClassProficiency::class);
	}
}
