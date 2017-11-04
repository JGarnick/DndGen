<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Character;
use \App\Models\CharacterClass;
use \App\Models\Race;
use \App\Models\Subrace;
use \App\Models\Background;

class CharacterService
{
    public function characterShow($id)
	{
		$character = Character::find($id);
		$races = Race::all();
		$classes = CharacterClass::all();
		$backgrounds = Background::all();
		$subraces = Subrace::all();
		// foreach($races AS $race)
		// {
			// print_r($race->name);
			// print_r($race->subraces->count());
		// }
		// dd();
		
		return [
			"character" 	=> $character,
			"races"			=> $races,
			"classes"		=> $classes,
			"backgrounds"	=> $backgrounds,
			"subraces"		=> $subraces,
		];
	}
}
