<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ict = \App\Category::create([
            'category' => 'ICT',
            'slug' => 'ict',
        ]);

        $sport = \App\Category::create([
            'category' => 'Sport',
            'slug' => 'sport',
        ]);

        $festival = \App\Category::create([
            'category' => 'Festival',
            'slug' => 'festival',
        ]);
    }
}
