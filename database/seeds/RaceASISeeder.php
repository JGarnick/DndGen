<?php

use Illuminate\Database\Seeder;
use App\Models\Race;
use App\Models\Subrace;
use App\Models\Attribute;

class RaceASISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $races = [
			"Dwarf" => [
				"stats" => [
					"Con" => 2
				],
				"subraces" => [
					"Hill Dwarf" => [
						"Wis" => 1
					],
					"Mountain Dwarf" => [
						"Str" => 2
					]
				]
			]
		];
		
		foreach($races AS $race_name => $data)
		{						
			$race = Race::where("name", $race_name)->first();
			foreach($data AS $level2_key => $level2_val){				
				if($level2_key === "stats"){
					foreach($level2_val AS $stat => $amount)
					{
						$attribute = Attribute::where("abbr", $stat)->first();
						$race->race_asi()->attach($attribute, ["amount" => $amount]);
					}
				}
				
				if($level2_key === "subraces")
				{
					foreach($level2_val AS $subrace_name => $subrace_data){
						$subrace = Subrace::where("name", $subrace_name)->first();
						foreach($subrace_data AS $stat => $amount){
							$attribute = Attribute::where("abbr", $stat)->first();
							$subrace->race_asi()->attach($attribute, ["amount" => $amount]);
						}
					}
				}
			}
		}
    }
}

