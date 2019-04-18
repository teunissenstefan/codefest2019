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
        $event1 = new \App\GoVadisEvent();
        $event1->name = "Test Event";
        $event1->description = "Test Event Description";
        $event1->orginazor = 1;
        $event1->category = "Test Category(NTF)";
        $event1->date = "02-03-2000(NTF)";
        $event1->postal_number = "6666 NTF";
        $event1->house_number = "666";
        $event1->street = "Street";
        $event1->signed_up = "666";
        $event1->max_signed_up = "6666";
        $event1->finished = "0";
        $event1->place_points = "66/666, 1";
        $event1->save();

        $event1->categories()->attach(\App\Category::first());

        $event2 = new \App\GoVadisEvent();
        $event2->name = "Test Event 2";
        $event2->description = "Test Event 2 Description";
        $event2->orginazor = 1;
        $event2->category = "Test Category(NTF)";
        $event2->date = "02-03-2000(NTF)";
        $event2->postal_number = "6666 NTF";
        $event2->house_number = "666";
        $event2->street = "Street";
        $event2->signed_up = "666";
        $event2->max_signed_up = "6666";
        $event2->finished = "0";
        $event2->place_points = "66/666, 1";
        $event2->save();

        $event2->categories()->attach(\App\Category::first());
    }
}
