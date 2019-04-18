<?php

use Illuminate\Database\Seeder;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Role::create([
            'user_id' => '1',
            'category_id' => '3',
        ]);
        $participant = \App\Role::create([
            'user_id' => '2',
            'category_id' => '1',
        ]);
        $editor = \App\Role::create([
            'user_id' => '3',
            'category_id' => '2',
        ]);

    }
}
