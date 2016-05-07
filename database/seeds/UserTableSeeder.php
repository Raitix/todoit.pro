<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Todo::create([
             "username" => "test",
             "email" => "test@test.com"
             "password" => "test"
         ]);
    }

}