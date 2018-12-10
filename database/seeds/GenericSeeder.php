<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GenericSeeder extends Seeder
{
	private $races = [
		[
			"id" => 1,
			"name" => "Dwarf",
			"speed" => 25,
			"description" => "",
			"age" => 350,
			"size" => "Small",
			"darkvision" => 60
		],
		[
			"id" => 2,
			"name" => "Elf",
			"speed" => 30,
			"description" => "",
			"age" => 750,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 3,
			"name" => "Halfling",
			"speed" => 25,
			"description" => "",
			"age" => 150,
			"size" => "Small",
		],
		[
			"id" => 4,
			"name" => "Human",
			"speed" => 30,
			"description" => "",
			"age" => 80,
			"size" => "Medium"
		],
		[
			"id" => 5,
			"name" => "Dragonborn",
			"speed" => 30,
			"description" => "",
			"age" => 80,
			"size" => "Medium"
		],
		[
			"id" => 6,
			"name" => "Gnome",
			"speed" => 25,
			"description" => "",
			"age" => 500,
			"size" => "Small",
			"darkvision" => 60
		],
		[
			"id" => 7,
			"name" => "Half-Elf",
			"speed" => 30,
			"description" => "",
			"age" => 200,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 8,
			"name" => "Half-Orc",
			"speed" => 30,
			"description" => "",
			"age" => 75,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 9,
			"name" => "Tiefling",
			"speed" => 30,
			"description" => "",
			"age" => 90,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 10,
			"name" => "Aasimar",
			"speed" => 30,
			"description" => "",
			"age" => 160,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 11,
			"name" => "Firbolg",
			"speed" => 30,
			"description" => "",
			"age" => 500,
			"size" => "Medium",
		],
		[
			"id" => 12,
			"name" => "Goliath",
			"speed" => 30,
			"description" => "",
			"age" => 80,
			"size" => "Medium",
		],
		[
			"id" => 13,
			"name" => "Kenku",
			"speed" => 30,
			"description" => "",
			"age" => 60,
			"size" => "Medium",
		],
		[
			"id" => 14,
			"name" => "Lizardfolk",
			"speed" => 30,
			"description" => "",
			"age" => 60,
			"size" => "Medium",
		],
		[
			"id" => 15,
			"name" => "Tabaxi",
			"speed" => 30,
			"description" => "",
			"age" => 80,
			"size" => "Medium",
			"darkvision" => 60
		],
		[
			"id" => 16,
			"name" => "Triton",
			"speed" => 30,
			"description" => "",
			"age" => 200,
			"size" => "Medium",
		],
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
		"Choice" => "Choice"
	];

	private $attributes = [
		"Strength" => "Str",
		"Dexterity" => "Dex",
		"Constitution" => "Con",
		"Wisdom" => "Wis",
		"Intelligence" => "Int",
		"Charisma" => "Cha",
		"Choice" => "Choice"
	];

	private $proficiencies = [
		"Light Armor",
		"Medium Armor",
		"Heavy Armor",
		"Simple Weapons",
		"Martial Weapons",
		"Shields",
	];

	private $subraces = [
		["name" => "Lightfoot", "parent_race_id" => 3],
		["name" => "Stout", "parent_race_id" => 3],
		["name" => "High Elf", "parent_race_id" => 2],
		["name" => "Wood Elf", "parent_race_id" => 2],
		["name" => "Dark Elf (Drow)", "parent_race_id" => 2],
		["name" => "Hill Dwarf", "parent_race_id" => 1],
		["name" => "Mountain Dwarf", "parent_race_id" => 1],
		["name" => "Variant Human", "parent_race_id" => 4],
		["name" => "Forest", "parent_race_id" => 6],
		["name" => "Rock", "parent_race_id" => 6],
		["name" => "Protector", "parent_race_id" => 10],
		["name" => "Scourge", "parent_race_id" => 10],
		["name" => "Fallen", "parent_race_id" => 10],
	];

	private $tools = [
		[
			"name" => "Alchemist's supplies",
			"type" => "Artisan's tools",
			"cost" => "50 gp",
			"weight" => "8 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Brewer's supplies",
			"type" => "Artisan's tools",
			"cost" => "20 gp",
			"weight" => "9 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Calligrapher's supplies",
			"type" => "Artisan's tools",
			"cost" => "10 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Cartographer's tools",
			"type" => "Artisan's tools",
			"cost" => "15 gp",
			"weight" => "6 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Cobbler's tools",
			"type" => "Artisan's tools",
			"cost" => "5 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Cook's utensils",
			"type" => "Artisan's tools",
			"cost" => "1 gp",
			"weight" => "8 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Glassblower's tools",
			"type" => "Artisan's tools",
			"cost" => "30 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Jeweler's tools",
			"type" => "Artisan's tools",
			"cost" => "25 gp",
			"weight" => "2 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Leatherworker's tools",
			"type" => "Artisan's tools",
			"cost" => "5 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Mason's tools",
			"type" => "Artisan's tools",
			"cost" => "10 gp",
			"weight" => "8 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Painter's supplies",
			"type" => "Artisan's tools",
			"cost" => "10 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Potter's tools",
			"type" => "Artisan's tools",
			"cost" => "10 gp",
			"weight" => "3 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Smith's tools",
			"type" => "Artisan's tools",
			"cost" => "20 gp",
			"weight" => "8 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Tinker's tools",
			"type" => "Artisan's tools",
			"cost" => "50 gp",
			"weight" => "10 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Weaver's tools",
			"type" => "Artisan's tools",
			"cost" => "1 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Woodcarver's tools",
			"type" => "Artisan's tools",
			"cost" => "1 gp",
			"weight" => "5 lb.",
			"desc" => "These special tools include the items needed to pursue a craft or trade. Proficiency with a set of artisan's tools lets you add your proficiency bonus to any ability checks you make using the tools in your craft. Each type of artisan's tools requires a separate proficiency."
		],
		[
			"name" => "Disguise kit",
			"type" => "Kit",
			"cost" => "25 gp",
			"weight" => "3 lb.",
			"desc" => "This poush of cosmetics, hair dye, and small props lets you create disguises that change your physical appearance. Proficiency with this kit lets you add your proficiency bonus to any ability checks you make to create a visual disguise."
		],
		[
			"name" => "Forgery kit",
			"type" => "Kit",
			"cost" => "15 gp",
			"weight" => "5 lb.",
			"desc" => "This small box contains a variety of papers and parchments, pens and inks, seals and sealing wax, gold and silver leaf, and other supplies necessary to create convincing forgeries of physical documents. Proficiency with this kit lets you add your proficiency bonus to any ability checks you make to create a physical forgery of a document."
		],
		[
			"name" => "Dice set",
			"type" => "Gaming set",
			"cost" => "1 sp",
			"weight" => "0 lb.",
			"desc" => "If you are proficient with a gaming set, you can add your proficiency bonus to ability checks you make to play a game with that set. Each type of gaming set requires a separate proficiency."
		],
		[
			"name" => "Dragonchess set",
			"type" => "Gaming set",
			"cost" => "1 gp",
			"weight" => "1/2 lb.",
			"desc" => "If you are proficient with a gaming set, you can add your proficiency bonus to ability checks you make to play a game with that set. Each type of gaming set requires a separate proficiency."
		],
		[
			"name" => "Playing card set",
			"type" => "Gaming set",
			"cost" => "5 sp",
			"weight" => "0 lb.",
			"desc" => "If you are proficient with a gaming set, you can add your proficiency bonus to ability checks you make to play a game with that set. Each type of gaming set requires a separate proficiency."
		],
		[
			"name" => "Three-Dragon Ante set",
			"type" => "Gaming set",
			"cost" => "1 gp",
			"weight" => "0 lb.",
			"desc" => "If you are proficient with a gaming set, you can add your proficiency bonus to ability checks you make to play a game with that set. Each type of gaming set requires a separate proficiency."
		],
		[
			"name" => "Herbalism kit",
			"type" => "Kit",
			"cost" => "5 gp",
			"weight" => "3 lb.",
			"desc" => "This kit contains a variety of instruments such as clippers, mortar and pestle, and pouches and vials used by herbalists to create remedies and potions. Proficiency with this kit lets you add your proficiency bonus to any ability checks you make to identify or apply herbs. Also, proficiency with this kit is required to create antitoxin and any potions of healing."
		],
		[
			"name" => "Bagpipes",
			"type" => "Musical instrument",
			"cost" => "30 gp",
			"weight" => "6 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Drum",
			"type" => "Musical instrument",
			"cost" => "6 gp",
			"weight" => "3 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Dulcimer",
			"type" => "Musical instrument",
			"cost" => "25 gp",
			"weight" => "10 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Flute",
			"type" => "Musical instrument",
			"cost" => "2 gp",
			"weight" => "1 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Lute",
			"type" => "Musical instrument",
			"cost" => "35 gp",
			"weight" => "2 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Lyre",
			"type" => "Musical instrument",
			"cost" => "30 gp",
			"weight" => "2 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Horn",
			"type" => "Musical instrument",
			"cost" => "3 gp",
			"weight" => "2 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Pan flute",
			"type" => "Musical instrument",
			"cost" => "12 gp",
			"weight" => "2 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Shawm",
			"type" => "Musical instrument",
			"cost" => "2 gp",
			"weight" => "1 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Viol",
			"type" => "Musical instrument",
			"cost" => "30 gp",
			"weight" => "1 lb.",
			"desc" => "If you have proficiency with a given musical instrument, you can add your proficiency bonus to any ability checks you make to play music with the instrument. A bard can use bagpipes as a spellcasting focus. Each type of musical instrument requires a separate proficiency."
		],
		[
			"name" => "Navigator's tools",
			"type" => "Other",
			"cost" => "25 gp",
			"weight" => "2 lb. ",
			"desc" => "This set of instruments is used for navigation at sea. Proficiency with navigator's tools lets you chart a ship's course and follow navigation charts. In addition, these tools allow you to add your proficiency bonus to any ability check you make to avoid getting lost at sea."
		],
		[
			"name" => "Poisoner's kit",
			"type" => "Kit",
			"cost" => "50 gp",
			"weight" => "2 lb.",
			"desc" => "A poisoner's kit includes the vials, chemicals, and other equipment necessary for the creation of poisons. Proficiency with this kit lets you add your proficiency bonus to any ability checks you make to craft or use poisons."
		],
		[
			"name" => "Thieves' tools",
			"type" => "Other",
			"cost" => "25 gp",
			"weight" => "1 lb.",
			"desc" => "This set of tools includes a small file, a set of lock picks, a small mirror mounted on a metal handle, a set of narrow-bladed scissors, and a pair of pliers. Proficiency with these tools lets you add your proficiency bonus to any ability checks you make to disarm traps or open locks."
		],
		[
			"name" => "Choose 1 musical instrument or 1 artisan's tools",
			"type" => "Choice",
			"cost" => "",
			"weight" => "",
			"desc" => "Choose 1 musical instrument or 1 artisan's tools"
		],
	];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		foreach ($this->proficiencies as $p) {
			DB::table('weapon_armor_types')->insert(["name" => $p]);
		}

		foreach ($this->races as $race) {
			DB::table('races')->insert($race);
		}

		foreach ($this->classes as $class => $hit_die) {
			DB::table('classes')->insert([
				'name' => $class,
				'hit_die' => $hit_die
			]);
		}

		foreach ($this->skills as $skill => $stat) {
			DB::table('skills')->insert([
				"name" => $skill,
				"attribute" => $stat,
			]);
		}

		foreach ($this->monies as $money => $abbr) {
			DB::table('monies')->insert([
				"name" => $money,
				"abbr" => $abbr,
			]);
		}


		foreach ($this->attributes as $attribute => $abbr) {
			DB::table('attributes')->insert([
				'name' => $attribute,
				'abbr' => $abbr,
			]);
		}

		foreach ($this->subraces as $data) {
			DB::table("subraces")->insert($data);
		}

		foreach($this->tools as $tool){
			DB::table("tools")->insert($tool);
		}
	}
}
