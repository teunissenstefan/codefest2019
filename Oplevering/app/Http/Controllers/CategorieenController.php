<?php
/**
 * Created by PhpStorm.
 * User: thomas van minnen
 * Date: 4/17/19
 * Time: 16:56 AM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class CategorieenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = User::Wherehas('roles', function ($query) {
            $query->where('slug', '=', 'organizer');
        })->get();
        $data = [
            'organizers' => $categories
        ];
        return view('admin.categorieen.index')->with($data);
    }

    public function edit(User $user, Request $request)
    {
        $data = [
            'organizer' => $user
        ];
        return view('admin.categorieen.edit')->with($data);
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->all());
        $user->save();
        $data = [
            'organizer' => $user
        ];
        $request->session()->flash('status', 'Categorieen aangepast!');
        return redirect(route('categorieen.show'));
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('status', 'Categorieen verwijderd!');
        return redirect(route('categorieen.show'));
    }
}