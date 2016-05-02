<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Todo;

class TodoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Todo::create([
             "title" => "Test title",
             "text" => "Test text",
             "status" => 1
         ]);
    }

}