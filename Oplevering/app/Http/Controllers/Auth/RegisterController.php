<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'firstname' => ['required', 'string', 'max:255'],
            'infix' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        if($data['role']=="organizer")
        {
            $rules['company.name'] = ['required','string','max:255'];
            $rules['company.email'] = ['required','string', 'email','max:255'];
            $rules['company.postal_code'] = ['required','string','max:255'];
            $rules['company.house_number'] = ['required','string','max:255'];
            $rules['company.city'] = ['required','string','max:255'];
            $rules['company.street'] = ['required','string','max:255'];
        }
        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'infix' => $data['infix'],
            'lastname' => $data['lastname'],
            'postal_code' => $data['postal_code'],
            'house_number' => $data['house_number'],
            'street' => $data['street'],
            'city' => $data['city'],
            'birthdate' => Carbon::parse($data['birthdate']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if($data['role']=="organizer")
        {
            $company = Company::create([
                'name' => $data['company']['name'],
                'email' => $data['company']['email'],
                'postal_code' => $data['company']['postal_code'],
                'city' => $data['company']['city'],
                'house_number' => $data['company']['house_number'],
                'street' => $data['company']['street'],
                'user_id' => $user->id,
            ]);
            $user->roles()->attach(\App\Role::where('slug','organizer-pre-accept')->first());
        }else{
            $user->roles()->attach(\App\Role::where('slug',$data['role'])->first());
        }
        return $user;
    }
}
