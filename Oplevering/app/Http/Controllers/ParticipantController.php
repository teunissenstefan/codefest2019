<?php
/**
 * Created by PhpStorm.
 * User: teunissenstefan
 * Date: 4/17/19
 * Time: 11:30 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth','verified');
        $this->middleware('can:admin_action');
    }

    public function index()
    {
        $participants = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'participant');
        })->get();

        $data = [
            'participants' => $participants
        ];
        return view('admin.participants.index')->with($data);
    }

    public function edit(User $user, Request $request)
    {
        $data = [
            'participant' => $user
        ];
        return view('admin.participants.edit')->with($data);
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->all());
        $user->save();
        $data = [
            'participant' => $user
        ];
        $request->session()->flash('status', 'Deelnemer aangepast!');
        return redirect(route('participants.show'));
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('status', 'Deelnemer verwijderd!');
        return redirect(route('participants.show'));
    }
}