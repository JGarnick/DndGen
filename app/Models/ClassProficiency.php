<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassProficiency extends Model
{
    protected $table = "class_proficiencies";
	protected $fillable = ["type", "class_id", "attribute_id", "skill_id", "weapon_id", "armor_id", "tool_id"];
}
