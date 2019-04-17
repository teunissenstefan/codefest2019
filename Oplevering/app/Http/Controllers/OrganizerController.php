<?php
/**
 * Created by PhpStorm.
 * User: teunissenstefan
 * Date: 4/17/19
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $organizers = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'organizer');
        })->get();
        $data = [
            'organizers' => $organizers
        ];
        return view('admin.organizers.index')->with($data);
    }

    public function edit(User $user, Request $request)
    {
        $data = [
            'organizer' => $user
        ];
        return view('admin.organizers.edit')->with($data);
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->all());
        $user->save();
        $data = [
            'organizer' => $user
        ];
        $request->session()->flash('status', 'Organisator aangepast!');
        return redirect(route('organizers.show'));
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('status', 'Organisator verwijderd!');
        return redirect(route('organizers.show'));
    }
}