<?php
/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 17-4-2019
 * Time: 12:54
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
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

    public function update(User $user, Request $request)
    {
        $user->fill($request->except('password'));
        $user->save();
        $data = [
            'user' => $user
        ];
        $request->session()->flash('status', 'Gegevens aangepast!');
        return redirect(route('profile'));
    }



}