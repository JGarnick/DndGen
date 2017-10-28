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
			DB:table('races')->insert($race);
		}
		
		foreach($classes AS $class)
		{
			DB:table('classes')->insert($class);
		}
    }
}
