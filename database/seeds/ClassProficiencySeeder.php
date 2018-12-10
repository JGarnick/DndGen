<?php

use Illuminate\Database\Seeder;
use App\Models\ClassProficiency;
use App\Models\Skill;
use App\Models\Tool;

class ClassProficiencySeeder extends Seeder
{

	//types = saving throw, weapon, armor, skill
	private $proficiencies = [
		1 => [ //Barbarian
			'types' => [
				"attribute" 	=> [1, 3],
									//Proficiencies are for Light armor, Medium armor, etc. armorIDs are for specific armors, like breastplate
				"armor"			=> ["proficiencies" => [1, 2, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4, 5], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [ 1, 8, 10, 13, 14, 16 ],
			"num_skills_granted" => 2
		],
		2 => [ //Bard
			'types' => [
				"attribute" 	=> [2, 6],
				"armor"			=> ["proficiencies" => [1], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4], "weaponIds" => [19, 35, 23, 25]],
				"tools"			=> []
			],
			"starting_skills"	=> [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
			"num_skills_granted" => 3
		],
		3 => [ //Cleric
			'types' => [
				"attribute" 	=> [4, 6],
				"armor"			=> ["proficiencies" => [1, 2, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [6, 11, 12, 18, 9],
			"num_skills_granted" => 2
		],
		4 => [ //Druid
			'types' => [
				"attribute" 	=> [5, 4],
				"armor"			=> ["proficiencies" => [1, 2, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [], "weaponIds" => [1, 2, 31, 5, 7, 8, 24, 9, 33, 10]],
				"tools"			=> [ 23 ]
			],
			"starting_skills"	=> [5, 10, 11, 12, 8, 13, 9, 14],
			"num_skills_granted" => 2
		],
		5 => [ //Fighter
			'types' => [
				"attribute" 	=> [1, 3],
				"armor"			=> ["proficiencies" => [1, 2, 3, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4, 5], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [2, 10, 1, 6, 11, 16, 13, 14],
			"num_skills_granted" => 2
		],
		6 => [ //Monk
			'types' => [
				"attribute" 	=> [1, 2],
				"armor"			=> ["proficiencies" => [], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4], "weaponIds" => [25]],
				"tools"			=> [ 37 ] 
			],
			"starting_skills"	=> [2, 1, 6, 11, 9, 4],
			"num_skills_granted" => 2
		],
		7 => [ //Paladin
			'types' => [
				"attribute" 	=> [4, 6],
				"armor"			=> ["proficiencies" => [1, 2, 3, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4, 5], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [1, 11, 16, 12, 18, 9],
			"num_skills_granted" => 2
		],
		8 => [ //Ranger
			'types' => [
				"attribute" 	=> [1, 2],
				"armor"			=> ["proficiencies" => [1, 2, 6], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4, 5], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [10, 1, 11, 7, 8, 13, 4, 14],
			"num_skills_granted" => 3
		],
		9 => [ //Rogue
			'types' => [
				"attribute" 	=> [2, 5],
				"armor"			=> ["proficiencies" => [1], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4], "weaponIds" => [35, 19, 23, 25]],
				"tools"			=> [36]
			],
			"starting_skills"	=> [2, 1, 15, 11, 16, 7, 13, 17, 18, 3, 4],
			"num_skills_granted" => 4
		],
		10 => [ //Sorcerer
			'types' => [
				"attribute" 	=> [3, 6],
				"armor"			=> ["proficiencies" => [], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [], "weaponIds" => [2, 31, 33, 8, 30]],
				"tools"			=> []
			],
			"starting_skills"	=> [5, 15, 11, 16, 18, 9],
			"num_skills_granted" => 2
		],
		11 => [ //Warlock
			'types' => [
				"attribute" 	=> [4, 6],
				"armor"			=> ["proficiencies" => [1], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [4], "weaponIds" => []],
				"tools"			=> []
			],
			"starting_skills"	=> [5, 15, 6, 16, 7, 8, 9],
			"num_skills_granted" => 2
		],
		12 => [ //Wizard
			'types' => [
				"attribute" 	=> [5, 4],
				"armor"			=> ["proficiencies" => [], "armorIds" => []],
				"weapon"		=> ["proficiencies" => [], "weaponIds" => [2, 31, 33, 8, 30]],
				"tools"			=> []
			],
			"starting_skills"	=> [5, 6, 11, 7, 12, 9],
			"num_skills_granted" => 2
		]
	];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		foreach($this->proficiencies AS $clID => $clContent)
		{
			//$clID = 1
			foreach($clContent AS $el => $subEl)
			{
				//$el = "types" or "num_skills_granted"
				if($el === "types")
				{
					foreach($subEl AS $key => $valArray) //key = "saving throw" or "armor" etc.
					{
						if($key === "armor" OR $key === "weapon")
						{
							foreach($valArray AS $k => $newValArray)
							{
								if(!empty($newValArray))
								{
									if($k === "proficiencies")
									{
										foreach($newValArray AS $v)
										{
											ClassProficiency::create([
												"type"					=> $key,
												"class_id"				=> $clID,
												"weapon_armor_type_id"	=> $v
											]);
										}
									}
									
									if($k === "armorIds")
									{
										foreach($newValArray AS $v)
										{
											ClassProficiency::create([
												"type"		=> $key,
												"class_id"	=> $clID,
												"armor_id"	=> $v
											]);
										}
									}
									
									if($k === "weaponIds")
									{
										foreach($newValArray AS $v)
										{
											ClassProficiency::create([
												"type"		=> $key,
												"class_id"	=> $clID,
												"weapon_id"	=> $v
											]);
										}
									}
								}
							}
						}
						else
						{
							foreach($valArray AS $val)
							{
								$identifier = $key . "_id"; //attribute_id, skill_id, etc.
								if($key === "attribute")
								{
									$type = "saving throw";
									ClassProficiency::create([
										"type"		=> "saving throw",
										"class_id"	=> $clID,
										$identifier	=> $val
									]);
								}
								else //Tools
								{
									ClassProficiency::create([
										"type"		=> $key,
										"class_id"	=> $clID,
										"tool_id"	=> $val
									]);
								}
							}
						}
					}
				}
				if($el === "num_skills_granted")
				{
					ClassProficiency::create([
						"type"					=> "num_skills_granted",
						"class_id"				=> $clID,
						"num_skills_granted"	=> $subEl
					]);
				}
				if($el === "starting_skills"){
					ClassProficiency::create([
						"type"				=> "starting_skills",
						"class_id"			=> $clID,
						"starting_skills"	=> serialize($subEl)
					]);
				}
			}
		}
    }
}

