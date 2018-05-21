<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        DB::table('tasks')->insert([
            'project_id' => '1',
            'body' => 'The important task',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('tasks')->insert([
            'project_id' => '1',
            'body' => 'The first task',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        DB::table('tasks')->insert([
            'project_id' => '1',
            'body' => 'First project task',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tasks')->insert([
            'project_id' => '2',
            'body' => 'Second project task',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tasks')->insert([
            'project_id' => '2',
            'body' => 'Medium importance task',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tasks')->insert([
            'project_id' => '3',
            'body' => 'Tiny project task',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('tasks')->insert([
            'project_id' => '4',
            'body' => 'Mini task',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $this->command->info("tasks table seeded.");
    }
}
