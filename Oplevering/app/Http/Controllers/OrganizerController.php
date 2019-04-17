<?php
/**
 * Created by PhpStorm.
 * User: teunissenstefan
 * Date: 4/17/19
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;


use App\User;

class OrganizerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
}