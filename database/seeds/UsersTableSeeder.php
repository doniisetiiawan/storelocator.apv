<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashed = Hash::make('secret');

        DB::table('users')->insert(
            ['name' => 'James', 'email' => 'james@gmail.com', 'password' => $hashed]
        );
        DB::table('users')->insert(
            ['name' => 'Steve', 'email' => 'stever@yahoo.com', 'password' => $hashed]
        );
    }
}
