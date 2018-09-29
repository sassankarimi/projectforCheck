<?php

use Illuminate\Database\Seeder;
use App\Card;
class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Card::truncate();
        factory(Card::Class,5)->create();
    }
}
