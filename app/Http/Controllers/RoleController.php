<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $name        =   $request->input('name');
        $desk       =   $request->input('deskripsi');
        $status     =   $request->input('status');

        $created = Role::create([
            'name'      =>  $name,
            'deskripsi' =>  $desk,
            'status'    =>  $status,
        ]);

        return response()->json([
            'message'   =>  'Data berhasil ditambahkan',
            'data'      =>  $created
        ], 201);
    }
}
