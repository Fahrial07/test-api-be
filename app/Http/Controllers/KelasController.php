<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $get = Kelas::orderBy('id', 'DESC')->get();

            if($get == null || $get == ""){
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
            $kelas =     $request->kelas;

            $data = [
                'kelas'      =>  $kelas,
            ];

            $store = Kelas::create($data);

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
            $kelas =     $request->kelas;

            $data = [
                'kelas'      =>  $kelas,
            ];

            $up = Kelas::where('id',$id)->update($data);

            if ($up) {
                return response()->json([
                    'status'    =>  'Updated',
                    'message'   =>  'Data berhasil diupdate',
                    'data'      =>  $up
                ], 201);
            } else {
                return response()->json([
                    'status'    =>  'Bad Request',
                    'message'   =>  'Data gagal diupdate',
                    'data'      =>  $up
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
        try {
            $del= Kelas::destroy($id);

            if ($del) {
                return response()->json([
                    'status'    =>  'Created',
                    'message'   =>  'Data berhasil dihapus',
                    'data'      =>  $del
                ], 201);
            } else {
                return response()->json([
                    'status'    =>  'Bad Request',
                    'message'   =>  'Data gagal dihapus',
                    'data'      =>  $del
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
