<?php
/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 17-4-2019
 * Time: 12:54
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('profile.edit')->with($data);
    }
}