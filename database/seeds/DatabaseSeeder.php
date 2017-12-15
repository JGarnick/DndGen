<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	private $races = [
		[
			"id"			=> 1,
			"name"			=> "Dwarf",
			"speed" 		=> 25, 
			"description" 	=> "",
			"age" 			=> 350, 
			"size" 			=> "Small",
			"darkvision"	=> 60
		],
		[
			"id"			=> 2,
			"name" 			=> "Elf",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 750, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 3,
			"name" 			=> "Halfling",
			"speed" 		=> 25, 
			"description" 	=> "", 
			"age" 			=> 150, 
			"size" 			=> "Small",
		],
		[
			"id"			=> 4,
			"name" 			=> "Human",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 80, 
			"size" 			=> "Medium"
		],
		[
			"id"			=> 5,
			"name" 			=> "Dragonborn",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 80, 
			"size" 			=> "Medium"
		],
		[
			"id"			=> 6,
			"name" 			=> "Gnome",
			"speed" 		=> 25, 
			"description" 	=> "", 
			"age" 			=> 500, 
			"size" 			=> "Small",
			"darkvision"	=> 60
		],
		[
			"id"			=> 7,
			"name" 			=> "Half-Elf",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 200, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 8,
			"name" 			=> "Half-Orc",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 75, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 9,
			"name" 			=> "Tiefling",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 90, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 10,
			"name" 			=> "Aasimar",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 160, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 11,
			"name" 			=> "Firbolg",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 500, 
			"size" 			=> "Medium",
		],
		[
			"id"			=> 12,
			"name" 			=> "Goliath",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 80, 
			"size" 			=> "Medium",
		],
		[
			"id"			=> 13,
			"name" 			=> "Kenku",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 60, 
			"size" 			=> "Medium",
		],
		[
			"id"			=> 14,
			"name" 			=> "Lizardfolk",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 60,
			"size" 			=> "Medium",
		],
		[
			"id"			=> 15,
			"name" 			=> "Tabaxi",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 80, 
			"size" 			=> "Medium",
			"darkvision"	=> 60
		],
		[
			"id"			=> 16,
			"name" 			=> "Triton",
			"speed" 		=> 30, 
			"description" 	=> "", 
			"age" 			=> 200, 
			"size" 			=> "Medium",
		],
	];
	
	private $classes = [
		"Barbarian" => 'd12',
		"Bard" 		=> 'd8',
		"Cleric" 	=> 'd8',
		"Druid" 	=> 'd8',
		"Fighter" 	=> 'd10',
		"Monk" 		=> 'd8',
		"Paladin" 	=> 'd10',
		"Ranger" 	=> 'd10',
		"Rogue" 	=> 'd8',
		"Sorcerer" 	=> 'd6',
		"Warlock" 	=> 'd8',
		"Wizard" 	=> 'd6',
	];
	
	private $monies = [
		"Copper" 	=> "cp",
		"Silver" 	=> "sp",
		"Electrum" 	=> "ep",
		"Gold" 		=> "gp",
		"Platinum" 	=> "pp",
	];
	
	private $skills = [
		"Athletics" 		=> "Strength",
		"Acrobatics" 		=> "Dexterity",
		"Sleight of Hand" 	=> "Dexterity",
		"Stealth" 			=> "Dexterity",
		"Arcana" 			=> "Intelligence",
		"History" 			=> "Intelligence",
		"Investigation" 	=> "Intelligence",
		"Nature" 			=> "Intelligence",
		"Religion" 			=> "Intelligence",
		"Animal Handling" 	=> "Wisdom",
		"Insight" 			=> "Wisdom",
		"Medicine" 			=> "Wisdom",
		"Perception" 		=> "Wisdom",
		"Survival" 			=> "Wisdom",
		"Deception" 		=> "Charisma",
		"Intimidation" 		=> "Charisma",
		"Performance" 		=> "Charisma",
		"Persuasion" 		=> "Charisma",
	];
	
	private $attributes = [
		"Strength" 		=> "Str",
		"Dextrerity" 	=> "Dex",
		"Constitution" 	=> "Con",
		"Wisdom" 		=> "Wis",
		"Intelligence" 	=> "Int",
		"Charisma" 		=> "Cha",
	];
	
	private $racial_ASI = [
		[
			"race_id"	=> 1,
			"stat"		=> 'Constitution',
			"amount"	=> 2,
		],
		[
			"race_id"	=> 2,
			"stat"		=> 'Dexterity',
			"amount"	=> 2,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Strength',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Dexterity',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Constitution',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Wisdom',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Intelligence',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 4,
			"stat"		=> 'Charisma',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 5,
			"stat"		=> 'Strength',
			"amount"	=> 2,
		],
		[
			"race_id"	=> 5,
			"stat"		=> 'Charisma',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 6,
			"stat"		=> 'Intelligence',
			"amount"	=> 2,
		],
		[
			"race_id"	=> 7,
			"stat"		=> 'Charisma',
			"amount"	=> 2,
		],
		[
			"race_id"	=> 7,
			"stat"		=> 'Choice',
			"amount"	=> 1,
		],
		[
			"race_id"	=> 7,
			"stat"		=> 'Choice',
			"amount"	=> 1,
		],
	];
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\App\Models\Race::truncate();
        // $this->call(UsersTableSeeder::class);
		foreach($this->races AS $race)
		{
			DB::table('races')->insert($race);
		}
		dd();
		foreach($this->classes AS $class => $hit_die)
		{
			DB::table('classes')->insert([
				'name' 		=> $class,
				'hit_die' 	=> $hit_die
			]);
		}
		
		foreach($this->skills AS $skill => $stat)
		{
			DB::table('skills')->insert([
				"name" 		=> $skill,
				"attribute" => $stat,
			]);
		}
		
		foreach($this->monies AS $money => $abbr)
		{
			DB::table('monies')->insert([
				"name" => $money,
				"abbr" => $abbr,
			]);
		}
		
		
		foreach($this->attributes AS $attribute => $abbr)
		{
			DB::table('attributes')->insert([
			'name' => $attribute,
			'abbr' => $abbr,
			]);
		}
    }
}
