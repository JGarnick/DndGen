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
		$character = Character::find($id);
		$races = Race::all();
		$skills = Skill::all();
		$classes = CharacterClass::all();
		$backgrounds = Background::all();
		$subraces = Subrace::all();
		
		
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
		$character = new Character();
		$skills = Skill::all();
		$races = Race::all();
		$classes = CharacterClass::all();
		$backgrounds = Background::all();
		$subraces = Subrace::all();
		$character->strength = 10;
		$character->dexterity = 10;
		$character->constitution = 10;
		$character->wisdom = 10;
		$character->intelligence = 10;
		$character->charisma = 10;
		$character->level = 1;
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
		$character = Character::find($id);
		$character->class = $request->input('class', 0);
		$character->background = $request->input('background', 0);
		$character->strength = $request->input('strength', 10);
		$character->dexterity = $request->input('dexterity', 10);
		$character->constitution = $request->input('constitution', 10);
		$character->wisdom = $request->input('wisdom', 10);
		$character->intelligence = $request->input('intelligence', 10);
		$character->charisma = $request->input('charisma', 10);
		
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
