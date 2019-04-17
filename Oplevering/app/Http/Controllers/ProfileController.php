<?php
/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 17-4-2019
 * Time: 12:54
 */

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    public function show()
    {

        $data = [
            'organizers' => []
        ];
        return view('profile.edit')->with($data);
    }
}