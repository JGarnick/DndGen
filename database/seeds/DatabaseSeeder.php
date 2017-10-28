<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facade\DB;

class DatabaseSeeder extends Seeder
{
	private $races = [
		"Dwarf",
		"Elf",
		"Halfling",
		"Human",
		"Dragonborn",
		"Gnome",
		"Half-Elf",
		"Half-Orc",
		"Tiefling",
		"Aasimar",
		"Firbolg",
		"Goliath",
		"Kenku",
		"Lizardfolk",
		"Tabaxi",
		"Triton",
	];
	
	private $classes = [
		"Barbarian",
		"Bard",
		"Cleric",
		"Druid",
		"Fighter",
		"Monk",
		"Paladin",
		"Ranger",
		"Rogue",
		"Sorcerer",
		"Warlock",
		"Wizard",
	];
	
	private $monies = [
		"Copper" => "cp",
		"Silver" => "sp",
		"Electrum" => "ep",
		"Gold" => "gp",
		"Platinum" => "pp",
	];
	
	private $skills = [
		"Athletics" => "Strength",
		"Acrobatics" => "Dexterity",
		"Sleight of Hand" => "Dexterity",
		"Stealth" => "Dexterity",
		"Arcana" => "Intelligence",
		"History" => "Intelligence",
		"Investigation" => "Intelligence",
		"Nature" => "Intelligence",
		"Religion" => "Intelligence",
		"Animal Handling" => "Wisdom",
		"Insight" => "Wisdom",
		"Medicine" => "Wisdom",
		"Perception" => "Wisdom",
		"Survival" => "Wisdom",
		"Deception" => "Charisma",
		"Intimidation" => "Charisma",
		"Performance" => "Charisma",
		"Persuasion" => "Charisma",
	];
	
	private $hit_die = [
		"d4",
		"d6",
		"d8",
		"d10",
		"d12",
	];
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		foreach($races AS $race)
		{
			DB::table('races')->insert($race);
		}
		
		foreach($classes AS $class)
		{
			DB::table('classes')->insert($class);
		}
		
		foreach($skills AS $skill => $stat)
		{
			DB::table('skills')->insert([
				"name" => $skill,
				"attribute" => $stat,
			]);
		}
		
		foreach($monies AS $money => $abbr)
		{
			DB::table('skills')->insert([
				"name" => $money,
				"abbr" => $abbr,
			]);
		}
		
		foreach($hit_die AS $dice)
		{
			DB::table('hit_die')->insert($dice);
		}
    }
}
