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
            'email_verified_at' => \Carbon\Carbon::now(),
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
            'email_verified_at' => \Carbon\Carbon::now(),
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
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'test@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Stefan',
            'infix' => '',
            'lastname' => 'Teunissen',
            'postal_code' => '1080 HD',
            'house_number' => '123',
            'street' => 'lianenstraat',
            'city' => 'Beukenootingen',
            'birthdate' => '2001-09-11',
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'stefan@gemailed.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Thomas',
            'infix' => 'Van',
            'lastname' => 'Minnen',
            'postal_code' => '6666 HB',
            'house_number' => '43',
            'street' => 'Lange Akkers',
            'city' => 'Heteren City',
            'birthdate' => '2000-09-26',
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'thomas@gemailed.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Levi',
            'infix' => 'Von',
            'lastname' => 'Doofenshmirtz',
            'postal_code' => '9281 RF',
            'house_number' => '123',
            'street' => 'Dierentuinstraat',
            'city' => 'Ergens klein dorp',
            'birthdate' => '2002-12-19',
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'levi@gemailed.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Nani',
            'infix' => '',
            'lastname' => 'Spitsmaters',
            'postal_code' => '5778 LN',
            'house_number' => '54',
            'street' => 'Straatstraat',
            'city' => 'Ergens klein dorp',
            'birthdate' => '1964-01-12',
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'nani@gemailed.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());

        $testParticipant =  \App\User::create([
            'firstname' => 'Berak',
            'infix' => '',
            'lastname' => 'Urduwe',
            'postal_code' => '91209 RH',
            'house_number' => '9123',
            'street' => 'Buylugiewigi',
            'city' => 'Antalya',
            'birthdate' => '1911-11-11',
            'email_verified_at' => \Carbon\Carbon::now(),
            'email' => 'berak@gemailed.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $testParticipant->roles()->attach(\App\Role::where('slug','participant')->first());
    }
}
