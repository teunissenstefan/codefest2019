<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);


        $admin = \App\Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        $participant = \App\Role::create([
            'name' => 'Participant',
            'slug' => 'participant',
        ]);
        $editor = \App\Role::create([
            'name' => 'Organizer',
            'slug' => 'organizer',
        ]);

        $type = ['admin_action', 'participant_action', 'organizer_action'];

        foreach($type as $value)
        {
            \Illuminate\Support\Facades\DB::table('permissions')->insert([
                'name' => $value,
                'label' => $value ,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }

        foreach(\App\Permission::all() as $value)
        {
            \Illuminate\Support\Facades\DB::table('permission_roles')->insert([
                'permission_id' => $value->id,
                'role_id' => 1
            ]);
        }

        \Illuminate\Support\Facades\DB::table('permission_roles')->insert([
            'permission_id' => \App\Permission::where('label','participant_action')->first()->id,
            'role_id' => \App\Role::where('slug','participant')->first()->id
        ]);
        \Illuminate\Support\Facades\DB::table('permission_roles')->insert([
            'permission_id' => \App\Permission::where('label','organizer_action')->first()->id,
            'role_id' => \App\Role::where('slug','organizer')->first()->id
        ]);
        \Illuminate\Support\Facades\DB::table('permission_roles')->insert([
            'permission_id' => \App\Permission::where('label','participant_action')->first()->id,
            'role_id' => \App\Role::where('slug','organizer')->first()->id
        ]);


        $this->call(UserSeeder::class);
    }
}
