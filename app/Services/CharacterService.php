<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Character;
use \App\Models\CharacterClass;
use \App\Models\Race;
use \App\Models\Skill;
use \App\Models\Subrace;
use \App\Models\Background;
use \App\Models\Proficiency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $character->subrace_id      = 0;
		$character->hp_max			= 12;
		$character->class_id		= 1;
		$character->hp_current		= 12;
		$classData = $this->constructClassesInfo();

		return [
			"character" 	=> $character,
			"races"			=> $races,
			"classes"		=> $classes,
			"backgrounds"	=> $backgrounds,
			"subraces"		=> $subraces,
			"skills"		=> $skills,
			"race_data"		=> $this->constructRacesInfo(),
			"class_data"	=> $classData,
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
					'bonus'		 => $skill->bonus,
					'proficient' => $skill->proficient,
				]);
			}
		}

	}

	public function constructRacesInfo()
	{
		$races = Race::all();
		$race_data = [];

		//Process the races
		foreach($races AS $race){
			$race_data[$race->name]["id"] 			= $race->id;
			$race_data[$race->name]["has_subraces"] = $race->subraces->count() > 0;

			//Process the subraces
			if($race->subraces->isNotEmpty()){
				foreach($race->subraces AS $subrace){
					$race_data[$race->name]["subraces"][$subrace->name] = [
						"id" => $subrace->id,
						"parent_race_id" => $subrace->parent_race_id
					];
					$asi_index = 1;
					 //Process the subrace ASI
					foreach($subrace->asi AS $att){
						$key = $att->name;
						if($att->name === "Choice")
						{
							$key = $att->name . "_" . $asi_index;
							$asi_index++;
						}

						$race_data[$race->name]["subraces"][$subrace->name]["subrace_asi"][$key] = [
							"att_id" => $att->id,
							"amount" => $att->pivot->amount,
						];
					}
				}
			}

			foreach($race->asi AS $att){
				$race_data[$race->name]["race_asi"][$att->name] = [
					"att_id" => $att->id,
					"amount" => $att->pivot->amount,
				];
			}
		}

		return $race_data;
	}
	
	public function constructClassesInfo(){
		$classes = CharacterClass::all();
		$class_data = [];
		
		foreach($classes AS $class){
			$class_data[$class->name] = $class->general_info();
		}
		
		return $class_data;
	}
}
