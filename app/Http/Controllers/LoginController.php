<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'     =>  'required|email',
            'password'  =>  'required|string'
        ]);

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(
            $request->only('email', 'password')
        )){
            $user = User::where('email', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                return response()->json([
                    'message'   =>  'Unautorized',
                ], 401);
            }

            $token = $user->createToken('testbeapi')->plainTextToken;

            return response()->json([
                'status'    =>  'Ok',
                'message'   =>  'Login berhasil',
                'data'      =>  $user,
                'token'     =>  $token
            ], 200);
        }
        return response()->json([
            'message'   =>  'Unautorized',
        ], 401);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
