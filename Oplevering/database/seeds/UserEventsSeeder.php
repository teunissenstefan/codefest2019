<?php

use Illuminate\Database\Seeder;

class UserEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_events')->insert([
            'user_id' => '1',
            'event_id' => '1',
        ]);
        DB::table('user_events')->insert([
            'user_id' => '2',
            'event_id' => '2',
        ]);
    }
}
