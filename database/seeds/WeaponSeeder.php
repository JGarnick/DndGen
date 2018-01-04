<?php

use Illuminate\Database\Seeder;
use App\Models\Weapon;

class WeaponSeeder extends Seeder
{
	private $weapons = [
		 "types"	=> [
			 "simple melee weapon"	=> [
				[
					"name"			=> "Club",
					"damage"		=> "1d4",
					"cost"			=> "1 sp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Dagger",
					"damage"		=> "1d4",
					"cost"			=> "1 gp",
					"weight"		=> "1 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Greatclub",
					"damage"		=> "1d8",
					"cost"			=> "2 sp",
					"weight"		=> "10 lb.",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Handaxe",
					"damage"		=> "1d6",
					"cost"			=> "5 gp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "slashing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Javeline",
					"damage"		=> "1d6",
					"cost"			=> "5 sp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Light Hammer",
					"damage"		=> "1d4",
					"cost"			=> "2 gp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Mace",
					"damage"		=> "1d6",
					"cost"			=> "5 gp",
					"weight"		=> "4 lb.",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Quarterstaff",
					"damage"		=> "1d6",
					"cost"			=> "2 sp",
					"weight"		=> "4 lb.",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Sickle",
					"damage"		=> "1d4",
					"cost"			=> "1 gp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "slashing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Spear",
					"damage"		=> "1d6",
					"cost"			=> "1 gp",
					"weight"		=> "3 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Unarmed Strike",
					"damage"		=> "1",
					"cost"			=> "--",
					"weight"		=> "--",
					"dmg_type"		=> "bludgeoning",
					"weapon_type"	=> "",
				],
			],
			"martial melee weapon"	=> [
				[
					"name"			=> "Battleaxe",
					"damage"		=> "1d8",
					"cost"			=> "10 gp",
					"weight"		=> "4 lb.",
					"dmg_type"		=> "slashing",
					"weapon_type"	=> "",
				],
			],
			"simple ranged weapon"	=> [
				[
					"name"			=> "Crossbow, light",
					"damage"		=> "1d8",
					"cost"			=> "25 gp",
					"weight"		=> "5 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Dart",
					"damage"		=> "1d4",
					"cost"			=> "5 cp",
					"weight"		=> "1/4 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Shortbow",
					"damage"		=> "1d6",
					"cost"			=> "25 gp",
					"weight"		=> "2 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
				[
					"name"			=> "Sling",
					"damage"		=> "1d4",
					"cost"			=> "1 sp",
					"weight"		=> "--",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
			],
			"martial ranged weapon"	=> [
				[
					"name"			=> "Blowgun",
					"damage"		=> "1",
					"cost"			=> "10 gp",
					"weight"		=> "1 lb.",
					"dmg_type"		=> "piercing",
					"weapon_type"	=> "",
				],
			]
		]
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
        foreach($this->weapons AS $types)
		{
			foreach($types AS $type => $weaponArray)
			{
				foreach($weaponArray AS $weapon)
				{
					$weapon = Weapon::create($weapon);
					$weapon->weapon_type = $type;
					$weapon->save();
				}
			}
		}
    }
}
