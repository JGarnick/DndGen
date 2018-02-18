<?php

use Illuminate\Database\Seeder;
use App\Models\Race;
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
					"Hill" => [
						"Wis" => 1
					],
					"Mountain" => [
						"Str" => 2
					]
				]
			]
		];
		
		foreach($races AS $race_name => $data)
		{
			//dd($data, $data["stats"]);			
			$race = Race::where("name", $race_name)->first();
			foreach($data AS $level2_key => $level2_val){
				//$key = "stats", $value = "Con" => 2
				if($level2_key === "stats"){
					foreach($level2_val AS $stat => $amount)
					{
						$attribute = Attribute::where("abbr", $stat)->first();
					}
				}
				
				if($level2_key === "subraces")
				{
					foreach($level2_val AS $subrace_name => $subrace_data){
						
					}
				}
			}
		}
    }
}
