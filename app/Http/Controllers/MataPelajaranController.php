<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $get = MataPelajaran::orderBy('id', 'desc')->get();

            if ($get == null || $get == "") {
                return response()->json([
                    'status'    =>  'No Content',
                    'message'   =>  'Data tidak di temukan',
                    'data'      =>  $get
                ], 204);
            } else {
                return response()->json([
                    'status'    =>  'Ok',
                    'message'   =>  'Data behrasil di temukan',
                    'data'      =>  $get
                ], 200);
            }
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
            $id_role =     $request->id_role;
            $id_jenis_mata_pelajaran =     $request->id_jenis_mata_pelajaran;
            $name =     $request->name;
            $deskripsi = $request->deskripsi;
            $status =   $request->status;

            $data = [
                'id_role' => $id_role,
                'id_jenis_mata_pelajaran' => $id_jenis_mata_pelajaran,
                'name'      =>  $name,
                'deskripsi' =>  $deskripsi,
                'status'    =>  $status
            ];

            $store = MataPelajaran::create($data);

            if ($store) {
                return response()->json([
                    'status'    =>  'Created',
                    'message'   =>  'Data berhasil ditambahkan',
                    'data'      =>  $store
                ], 201);
            } else {
                return response()->json([
                    'status'    =>  'Bad Request',
                    'message'   =>  'Data gagal ditambahkan',
                    'data'      =>  $store
                ], 400);
            }
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

            $id_role =     $request->id_role;
            $id_jenis_mata_pelajaran =     $request->id_jenis_mata_pelajaran;
            $name =     $request->name;
            $deskripsi = $request->deskripsi;
            $status =   $request->status;

            $data = [
                'name'      =>  $name,
                'deskripsi' =>  $deskripsi,
                'status'    =>  $status
            ];

            $update = MataPelajaran::where('id', $id)->update($data);

            if ($update) {
                return response()->json([
                    'status'    =>  'Created',
                    'message'   =>  'Data berhasil diupdate',
                    'data'      =>  $update
                ], 200);
            } else {
                return response()->json([
                    'status'    =>  'Bad Request',
                    'message'   =>  'Data gagal diupdate',
                    'data'      =>  $update
                ], 400);
            }
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
        try{
            $delete = MataPelajaran::destroy($id);

            if ($delete) {
                return response()->json([
                    'status'    =>  'Created',
                    'message'   =>  'Data berhasil didelete',
                    'data'      =>  $delete
                ], 201);
            } else {
                return response()->json([
                    'status'    =>  'Bad Request',
                    'message'   =>  'Data gagal didelete',
                    'data'      =>  $delete
                ], 400);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'status'    =>  'Error',
                'message'   =>  'Internal server error',
                'data'      =>  $e->getMessage()
            ], 500);
        }
    }
}
