<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CardsTableSeeder::class);
         $this->call(NotesTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(RolesTableSeeder::class);


    }
}
