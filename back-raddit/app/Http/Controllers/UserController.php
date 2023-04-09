<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

/**
 * @group USER Management
 * 
 * APIs to manage the USER resources.
 */

class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display all users
     */
    public function displayAll()
    {
        // return "test";
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
     * Delete USER - king admin action only
     * 
     */
    public function deleteOne($id)
    {
        //delete on cascade all posts - all data related to him / also comments?
        // return $id;
        $user = User::all();

        $user = $user->find($id);


        $user->delete();

        return $this->success([], message: 'user deleted');
    }

    /**
     * USER REGISTRATION
     */
    public function register(StoreUserRequest $request)
    {

        // return gettype((int)$request->king_admin);
        $adminBool = (int)$request->king_admin;

        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'king_admin' => $adminBool
        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Token API of: ' . $user->name)->plainTextToken
        ]);
    }






    /**
     * USER LOGIN
     */
    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return $this->error('', 'Credentials do not match', 401);
        }
        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Token API of: ' . $user->name)->plainTextToken
        ]);
    }


    /**
     * USER LOGOUT
     */
    public function logout()
    {
        // return response()->json('this is my logout method');
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
