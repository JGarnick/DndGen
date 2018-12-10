<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      'UserSeeder',
      'GenericSeeder',
      'WeaponSeeder',
      'RaceASISeeder',
      //'SpellSeeder_API' //Only used initially to grab data from API
      "SpellsTableSeeder",
      'ClassProficiencySeeder',
    ]);
      $this->call(SpellsTableSeeder::class);
    }
}
