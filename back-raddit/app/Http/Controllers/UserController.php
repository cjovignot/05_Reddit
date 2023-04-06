<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display all users
     */
    public function displayAll()
    {
        $users = User::all();
        return   $users;
    }

    /**
     * Display one user filtered by an id
     */


    public function displayOne($id)
    {

        $user = User::find($id);

        return $user->toJson(JSON_PRETTY_PRINT);;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // store user 
        $created =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture_URL' => $request->profile_picture_URL,
            'banner_picture_URL' => $request->banner_picture_URL
        ]);

        return ["isCreated" => $created];
    }
}
