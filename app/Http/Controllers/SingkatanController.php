<?php

namespace App\Http\Controllers;

use App\Models\Singkatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SingkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $singkatan = Singkatan::orderBy('id', 'desc')->get();

            if ($singkatan == " ") {
                return response()->json([
                    'status'    =>  'No Content',
                    'message'   =>  'Data tidak di temukan',
                    'data'      =>  $singkatan
                ], 204);
            }

            return response()->json([
                'status'    =>  'Ok',
                'message'   =>  'Data berhasil ditampilkan',
                'data'      =>  $singkatan
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
            $role   =   $request->id_role;
            $name   =   $request->name;
            $singkatan  =   $request->singkatan;
            $deskripsi  =   $request->deskripsi;
            $status =  $request->status;
            $slug   =   Str::slug($name);

            $singkatan  =   Singkatan::create([
                'id_role'   =>  $role,
                'name'      =>  $name,
                'singkatan' =>  $singkatan,
                'deskripsi' =>  $deskripsi,
                'status'    =>  $status,
                'slug'      =>  $slug
            ]);


            return response()->json([
                'status'    =>  'Created',
                'message'   =>  'Data berhasil ditambahkan',
                'data'      =>  $singkatan
            ], 201);

        } catch (\Throwable $e) {
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
        try {
            $role       =   $request->id_role;
            $name       =   $request->name;
            $singkatan  =   $request->singkatan;
            $deskripsi  =   $request->deskripsi;
            $status     =  $request->status;
            $slug       =   Str::slug($name);

            $singkatan  =   Singkatan::where('id', $id)->update([
                'id_role'   =>  $role,
                'name'      =>  $name,
                'singkatan' =>  $singkatan,
                'deskripsi' =>  $deskripsi,
                'status'    =>  $status,
                'slug'      =>  $slug
            ]);

                return response()->json([
                    'status'    =>  'Ok',
                    'message'   =>  'Data berhasil di update',
                    'data'      =>  $singkatan
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $singkatan  =   Singkatan::destroy($id);

            return response()->json([
                'status'    =>  'Ok',
                'message'   =>  'Data berhasil di hapus',
                'data'      =>  $singkatan
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status'    =>  'Error',
                'message'   =>  'Internal server error',
                'data'      =>  $e->getMessage()
            ], 500);
        }
    }
}
