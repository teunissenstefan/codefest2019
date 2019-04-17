<?php
/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 17-4-2019
 * Time: 12:54
 */

namespace App\Http\Controllers;


use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $data = [
            'user' => Auth::user(),
            'categories' => Category::pluck('category','id'),
            'favorite_category' => Auth::user()->favorite_category
        ];
        return view('profile.edit')->with($data);
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->except('password','category'));
        $user->save();
        if(count($user->categories)>0){
            $user->categories()->detach();
        }
        $category = Category::find(Input::get('category'));
        $user->categories()->attach($category);
        $data = [
            'user' => $user
        ];
        $request->session()->flash('status', 'Gegevens aangepast!');
        return redirect(route('profile'));
    }



}