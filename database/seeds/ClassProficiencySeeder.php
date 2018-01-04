<?php

use Illuminate\Database\Seeder;
use App\Models\Classproficiency;

class ClassProficiencySeeder extends Seeder
{
	//types = saving throw, weapon, armor, skill
	private $proficiencies = [
		'classes' => [
			1 => [
				'types' => [
					"attributes"	=> [1, 3],
					"saving throw" 	=> [1, 2],
					"armors"		=> ["Light", "Medium", "Shields"],
					"weapons"		=> ["Simple", "Martial"],
					"skills"		=> [10, 1, 16, 8, 13, 14]
				],
				"num_skills_granted" => 2
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
		foreach($this->proficiencies AS $cl)
		{
			//$cl = 1
			foreach($cl AS $el)
			{				
				foreach($el AS $key => $val)
				{
					//$key = "types" or "num_skills_granted"
					if($key === "types")
					{
						
					}
					elseif($key === "num_skills_granted")
					{
						dd("num skills granted");
					}
				}
			}
		}
    }
}
