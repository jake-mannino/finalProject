<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|starts_with:OG,O.G.,drPhill,Dr. Phill,DrPhill,lil,bigHomie,BigHomie,yung,Yung,Dr,Dr.,dr,Professor,professor,Sir,sir,Lord,lord,Shrek,shrek,getOuttaMySwamp|unique:App\Models\User,username',
            'email' => 'nullable|email|max:64|unique:App\Models|User,email_address',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'hella validation errors. so just throw the whole computer away idk come back next year or something..', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        //Creating new user
        $user = User::create($input);


        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('AudioTornado')->accessToken;
        $data['user_data'] = $user;

        return response(['data' => $data, 'message' => 'Digital Qubit clone of your consciousess created successfully! Login asap or else your clone will be *repurposed*..', 'status' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
