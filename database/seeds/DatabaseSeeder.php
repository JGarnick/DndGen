<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
	
	private $attributes = [
		"Strength" => "Str",
		"Dextrerity" => "Dex",
		"Constitution" => "Con",
		"Wisdom" => "Wis",
		"Intelligence" => "Int",
		"Charisma" => "Cha",
	];
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		foreach($this->races AS $race)
		{
			DB::table('races')->insert([
			'name' => $race,
			'description' => '',
			'speed' => 0,
			'age' => '',
			'size' => '',
			]);
		}
		
		foreach($this->classes AS $class)
		{
			DB::table('classes')->insert(['name' => $class]);
		}
		
		foreach($this->skills AS $skill => $stat)
		{
			DB::table('skills')->insert([
				"name" => $skill,
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
		
		foreach($this->hit_die AS $dice)
		{
			DB::table('hit_die')->insert(['die' => $dice]);
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
