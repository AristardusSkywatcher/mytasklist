<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_participants')->delete();

        DB::table('project_participants')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('project_participants')->insert([
            'user_id' => '2',
            'project_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('project_participants')->insert([
            'user_id' => '1',
            'project_id' => '2',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $this->command->info("project_participants table seeded.");
    }
}
