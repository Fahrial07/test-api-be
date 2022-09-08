<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users  =  User::orderBy('id', 'desc')->get();

            if($users == null){
                return response()->json([
                    'status'    =>  'Ok',
                    'message'   =>  'Data tidak di temukan',
                    'data'      =>  $users
                ], 204);
            }

            return response()->json([
                'status'    =>  'Ok',
                'message'   =>  'Data berhasil ditampilkan',
                'data'      =>  $users,
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status'    =>  'Error',
                'message'   =>  'Internal server error',
                'data'      =>  $e->getMessage()
            ], 500);
        }
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
        try {
            $role_id        =   $request->role_id;
            $name           =   $request->name;
            $email          =   $request->email;
            $password       =   Hash::make($request->password);
            $slug           =   Str::slug($request->name);

            $role = Role::find($role_id)->first();

            $data = array(
                'role_id'   =>  $role_id,
                'name'      =>  $name,
                'email'     =>  $email,
                'password'  =>  $password,
                'role'      =>  $role->name,
                'token'     =>  Str::random(60),
                'is_active' =>  1,
                'slug'      =>  $slug,
                'last_login' =>  now(),
                'created_by' =>  Auth::user()->name
            );

            return response()->json([
                'status'    =>  'Created',
                'message'   =>  'Data berhasil ditambahkan',
                'data'      =>  $data,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status'    =>  'Error',
                'message'   =>  'Internal server error',
                'data'      =>  $e->getMessage()
            ], 500);
        }
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
