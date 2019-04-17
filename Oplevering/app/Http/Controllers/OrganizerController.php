<?php
/**
 * Created by PhpStorm.
 * User: teunissenstefan
 * Date: 4/17/19
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin_action');
    }

    public function index()
    {
        $organizers = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'organizer');
        })->whereHas('company', function ($query) {
            $query->where('accepted', '=', '1');
        })->get();

        $unaccepted_organizers = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'organizer-pre-accept');
        })->whereHas('company', function ($query) {
            $query->where('accepted', '=', '0');

        })->get();
        $data = [
            'organizers' => $organizers,
            'unaccepted_organizers' => $unaccepted_organizers
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

    public function accept(User $user, Request $request)
    {
        $user->company->accepted = 1;
        $user->company->save();
        if(count($user->roles)){
            $user->roles()->detach();
        }
        $user->roles()->attach(Role::where('slug','organizer')->first());
        $request->session()->flash('status', 'Aanmelding geaccepteerd!');
        return redirect(route('organizers.show'));
    }

    public function deny(User $user, Request $request)
    {
        $user->company->delete();
        $user->delete();
        $request->session()->flash('status', 'Aanmelding afgewezen!');
        return redirect(route('organizers.show'));
    }
}