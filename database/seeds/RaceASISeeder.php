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
					[
						"race_id" => Race::where("name", "Dwarf")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 2
					],
				],
				"subraces" => [
					"Hill Dwarf" => [
						[
							"subrace_id" => Subrace::where("name", "Hill Dwarf")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
							"amount" => 1
						],
					],
					"Mountain Dwarf" => [
						[
							"subrace_id" => Subrace::where("name", "Mountain Dwarf")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
							"amount" => 2
						],
					]
				]
			],
			"Elf" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Elf")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
						"amount" => 2
					],
				],
				"subraces" => [
					"High Elf" => [
						[
							"subrace_id" => Subrace::where("name", "High Elf")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Int")->first()->id,
							"amount" => 1
						],
					],
					"Wood Elf" => [
						[
							"subrace_id" => Subrace::where("name", "Wood Elf")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
							"amount" => 1
						],
					],
					"Dark Elf (Drow)" => [
						[
							"subrace_id" => Subrace::where("name", "Dark Elf (Drow)")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
							"amount" => 1
						],
					]
				]
			],
			"Halfling" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Halfling")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
						"amount" => 2
					],
				],
				"subraces" => [
					"Lightfoot" => [
						[
							"subrace_id" => Subrace::where("name", "Lightfoot")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
							"amount" => 1
						],
					],
					"Stout" => [
						[
							"subrace_id" => Subrace::where("name", "Stout")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
							"amount" => 1
						],
					]
				]
			],
			"Human" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Int")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Human")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 1
					]
				],
				"subraces" => [
					"Variant Human" => [
						[
							"subrace_id" => Subrace::where("name", "Variant Human")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Choice")->first()->id,
							"amount" => 1
						],
						[
							"subrace_id" => Subrace::where("name", "Variant Human")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Choice")->first()->id,
							"amount" => 1
						]
					]
				]
			],
			"Dragonborn" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Dragonborn")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Dragonborn")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 1
					],
				]
			],

			"Gnome" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Gnome")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Int")->first()->id,
						"amount" => 2
					]
				],
				"subraces" => [
					"Forest" => [
						[
							"subrace_id" => Subrace::where("name", "Forest")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
							"amount" => 1
						]
					],
					"Rock" => [
						[
							"subrace_id" => Subrace::where("name", "Rock")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
							"amount" => 1
						]
					]
				]
			],

			"Half-Elf" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Half-Elf")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Half-Elf")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Choice")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Half-Elf")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Choice")->first()->id,
						"amount" => 1
					],
				]
			],

			"Half-Orc" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Half-Orc")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Half-Orc")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 1
					]

				]
			],

			"Tiefling" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Tiefling")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Int")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Tiefling")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 2
					]

				]
			],

			"Aasimar" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Aasimar")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 2
					]
				],
				"subraces" => [
					"Fallen" => [
						[
							"subrace_id" => Subrace::where("name", "Fallen")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
							"amount" => 1
						]
					],
					"Scourge" => [
						[
							"subrace_id" => Subrace::where("name", "Scourge")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
							"amount" => 1
						]
					],
					"Protector" => [
						[
							"subrace_id" => Subrace::where("name", "Protector")->first()->id,
							"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
							"amount" => 1
						]
					]
				]
			],

			"Firbolg" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Firbolg")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Firbolg")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 1
					]

				]
			],

			"Goliath" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Goliath")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Goliath")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 1
					]

				]
			],

			"Kenku" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Kenku")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Kenku")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
						"amount" => 1
					]

				]
			],

			"Lizardfolk" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Lizardfolk")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Lizardfolk")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Wis")->first()->id,
						"amount" => 1
					]

				]
			],

			"Tabaxi" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Tabaxi")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Dex")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Tabaxi")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 1
					]

				]
			],

			"Triton" => [
				"stats" => [
					[
						"race_id" => Race::where("name", "Triton")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Str")->first()->id,
						"amount" => 2
					],
					[
						"race_id" => Race::where("name", "Triton")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Cha")->first()->id,
						"amount" => 1
					],
					[
						"race_id" => Race::where("name", "Triton")->first()->id,
						"attribute_id" => Attribute::where("abbr", "Con")->first()->id,
						"amount" => 1
					]
				]
			],
		];
		
		foreach ($races as $level1) {
			foreach ($level1 as $key => $data) {
				if ($key === "stats") {
					DB::table("racial_asi")->insert($data);
				}

				if ($key === "subraces") {
					foreach ($data as $subrace_data) {
						DB::table("racial_asi")->insert($subrace_data);
					}
				}
			}
		}
	}
}

