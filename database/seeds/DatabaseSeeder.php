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
		"Barbarian" => 'd12',
		"Bard" => 'd8',
		"Cleric" => 'd8',
		"Druid" => 'd8',
		"Fighter" => 'd10',
		"Monk" => 'd8',
		"Paladin" => 'd10',
		"Ranger" => 'd10',
		"Rogue" => 'd8',
		"Sorcerer" => 'd6',
		"Warlock" => 'd8',
		"Wizard" => 'd6',
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
		
		foreach($this->classes AS $class => $hit_die)
		{
			DB::table('classes')->insert([
			'name' => $class,
			'hit_die' => $hit_die
			]);
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
		
		
		foreach($this->attributes AS $attribute => $abbr)
		{
			DB::table('attributes')->insert([
			'name' => $attribute,
			'abbr' => $abbr,
			]);
		}
    }
}
