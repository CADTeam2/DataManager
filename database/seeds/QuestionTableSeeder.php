<?php

use Question;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	echo("Creating questions...");
        factory(Question::class, 1000)->create();
        echo("Questions created succesfully!");
    }
}
