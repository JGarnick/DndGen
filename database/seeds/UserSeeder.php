<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $admins = [
        [
            "name" => "Josh",
            "email" => "garnick.josh@gmail.com",
            "password" => ''
        ],
        [
            "name" => "Dave",
            "email" => "davegarnick@gmail.com",
            "password" => ''
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->admins as $admin) {
            $admin["password"] = Hash::make(123456);
            DB::table("users")->insert($admin);
        }
    }
}
