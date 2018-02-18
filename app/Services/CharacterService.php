<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Character;
use \App\Models\CharacterClass;
use \App\Models\Race;
use \App\Models\Skill;
use \App\Models\Subrace;
use \App\Models\Background;
use Illuminate\Http\Request;

class CharacterService
{
    public function show($id)
	{
		$character 		= Character::find($id);
		$races 			= Race::all();
		$skills 		= Skill::all();
		$classes 		= CharacterClass::all();
		$backgrounds 	= Background::all();
		$subraces 		= Subrace::all();
		
		return [
			"character" 	=> $character,
			"races"			=> $races,
			"classes"		=> $classes,
			"backgrounds"	=> $backgrounds,
			"subraces"		=> $subraces,
			"skills"		=> $skills,
		];
	}
	
	public function create()
	{
		$character 		= new Character();
		$skills 		= Skill::all();
		$races 			= Race::all();
		$classes 		= CharacterClass::all();
		$backgrounds 	= Background::all();
		$subraces 		= Subrace::all();
		$character->strength 		= 8;
		$character->dexterity 		= 8;
		$character->constitution 	= 8;
		$character->wisdom 			= 8;
		$character->intelligence	= 8;
		$character->charisma 		= 8;
		$character->level 			= 1;
		$character->race_id			= 1;
		$character->class_id		= 1;
		$character->hp_max			= 12;
		$character->hp_current		= 12;

		return [
			"character" 	=> $character,
			"races"			=> $races,
			"classes"		=> $classes,
			"backgrounds"	=> $backgrounds,
			"subraces"		=> $subraces,
			"skills"		=> $skills,
		];
	}
	
	public function update(Request $request, $id)
	{
		$character 					= Character::find($id);
		$character->class 			= $request->input('class', 0);
		$character->background 		= $request->input('background', 0);
		$character->strength 		= $request->input('strength', 10);
		$character->dexterity 		= $request->input('dexterity', 10);
		$character->constitution 	= $request->input('constitution', 10);
		$character->wisdom 			= $request->input('wisdom', 10);
		$character->intelligence 	= $request->input('intelligence', 10);
		$character->charisma 		= $request->input('charisma', 10);
		
		//attach bonuses to skills
		if($request->has('skills'))
		{
			foreach($request->skills AS $skill)
			{
				$character->updateExistingPivot($skill->id, [
					'bonus' => $skill->bonus,
					'proficient' => $skill->proficient,
				]);
			}
		}
		
	}
}
