<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClassProficiency;
use App\Models\Attribute;

class CharacterClass extends Model
{
    protected $table = "classes";
	
	public function proficiencies()
	{
		return $this->hasMany(ClassProficiency::class, "class_id");
	}
	
	public function saving_throws()
	{
		$attIDs = $this->proficiencies->where('type', 'saving throw')->pluck('attribute_id');
		$attArray = Attribute::whereIn('id', $attIDs)->pluck("name");
		return $attArray;
	}
}
