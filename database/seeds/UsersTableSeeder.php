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
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Tardu Demirel',
            'email' => 'tardu.demirel@live.com',
            'password' => bcrypt('password'),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Guiseppe Pegac',
            'email' => 'lind.otis@creamer.com',
            'password' => bcrypt('password'),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('password'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $this->command->info("users table seeded.");
    }
}
