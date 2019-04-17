<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  \App\User::create([
            'firstname' => 'Adminus',
            'infix' => '',
            'lastname' => 'Administratus',
            'postal_code' => '6660 HD',
            'house_number' => '666',
            'street' => 'Adminstraat',
            'city' => 'Teststad',
            'birthdate' => '1969-04-17',
            'email' => 'admin@admin.admin',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $admin->roles()->attach(\App\Role::where('slug','admin')->first());

        $testOrganizer =  \App\User::create([
            'firstname' => 'Organizer',
            'infix' => '',
            'lastname' => 'Test',
            'postal_code' => '6660 HD',
            'house_number' => '666',
            'street' => 'Adminstraat',
            'city' => 'Teststad',
            'birthdate' => '1969-04-17',
            'email' => 'test@bedrijf.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $company = \App\Company::create([
            'name' => 'Environment.Exit(1);',
            'email' => 'info@environment.exit',
            'postal_code' => '1234 AB',
            'city' => 'Arnhem',
            'house_number' => '1',
            'street' => 'Csharpstraat',
            'user_id' => $testOrganizer->id,
        ]);
        $testOrganizer->roles()->attach(\App\Role::where('slug','organizer-pre-accept')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Participant',
            'infix' => '',
            'lastname' => 'Test',
            'postal_code' => '6660 HD',
            'house_number' => '666',
            'street' => 'Adminstraat',
            'city' => 'Teststad',
            'birthdate' => '1969-04-17',
            'email' => 'test@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());
    }
}
