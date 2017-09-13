<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => "hawaker",
            'email' => 'hawaker@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }

}
