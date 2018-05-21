<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('projects')->delete();

        DB::table('projects')->insert([
            'name' => 'The Very Big Project',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('projects')->insert([
            'name' => 'Bigger Project',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('projects')->insert([
            'name' => 'Tiny Project',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $this->command->info("projects table seeded.");
    }
    
}
