<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();

        if($roles == ""){
            return response()->json([
                'status'    =>  'Ok',
                'message'   =>  'Data tidak di temukan',
                'data'      =>  $roles
            ], 204);
        } else {
            return response()->json([
                'message'   =>  'Data berhasil ditampilkan',
                'data'      =>  $roles
            ], 200);
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

            // $request->validate([
            //     'name'          =>  'required|string|max:255',
            //     'deskripsi'   =>  'required|string|max:255',
            //     'status'        =>  'required|string|max:255',
            // ]);

            $name        =   $request->name;
            $desk       =   $request->deskripsi;
            $status     =   $request->status;

            $check = Role::where('name', $name)->first();

            if($check){
                return response()->json([
                    'status'    =>  'Error',
                    'message'   =>  'Data sama dengan data yang ada',
                ], 409);
            }

            $created = Role::create([
                'name'      =>  $name,
                'deskripsi' =>  $desk,
                'status'    =>  $status,
            ]);


            return response()->json([
                'status'    =>  'Created',
                'message'   =>  'Data berhasil ditambahkan',
                'data'      =>  $created
            ], 201);

        } catch (\Throwable $e) {

            return response()->json([
                'message'   =>  'Error',
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
        try {
            $name           =   $request->input('name');
            $desk           =   $request->input('deskripsi');
            $status         =   $request->input('status');

            $updated = Role::where('id', $id)->update([
                'name'      =>  $name,
                'deskripsi' =>  $desk,
                'status'    =>  $status,
            ]);

            return response()->json([
                'status'    =>  'Updated',
                'message'   =>  'Data berhasil diupdate',
                'data'      =>  $updated
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'message'   =>  'Error',
                'data'      =>  $e
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted =  Role::destroy($id);

            return response()->json([
                'status'    =>  'Deleted',
                'message'   =>  'Data berhasil dihapus',
                'data'      =>  $deleted
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'message'   =>  'Error',
                'data'      =>  $e
            ], 500);
        }
    }
}
