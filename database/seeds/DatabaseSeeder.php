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
      'ClassProficiencySeeder',
      'WeaponSeeder',
      'RaceASISeeder',
      //'SpellSeeder_API' //Only used initially to grab data from API
      "SpellsTableSeeder"
    ]);
      $this->call(SpellsTableSeeder::class);
    }
}
