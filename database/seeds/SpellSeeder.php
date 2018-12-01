<?php

use Illuminate\Database\Seeder;
use Ixudra\Curl\Facades\Curl;

class SpellSeeder extends Seeder
{
    public $api_base;

    function get_spell_api_urls()
    {
        $response = Curl::to($this->api_base . "spells")->get();
        dd($response);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->api_base = "http://dnd5eapi.co/api/";
        $this->get_spell_api_urls();
    }
}
