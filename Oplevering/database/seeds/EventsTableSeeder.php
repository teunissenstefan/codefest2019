<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('go_vadis_events')->insert([
            'name' => 'Test Event',
            'description' => 'Test Event Description',
            'orginazor' => '666',
            'category' => 'Test Category(NTF)',
            'date' => '02-03-2000(NTF)',
            'postal_number' => '6666 NTF',
            'house_number' => '666',
            'street' => 'NeedToFix street',
            'signed_up' => '666',
            'max_signed_up' => '6666',
            'finished' => '0',
            'place_points' => '66/666, 1',
        ]);
    }
}
