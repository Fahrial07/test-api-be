<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dataUsers = DataUser::find(Auth::user()->id)->get();

            if($dataUsers == ""){
                return response()->json([
                    'status'    =>  'No Content',
                    'message'   =>  'Data tidak di temukan',
                    'data'      =>  $dataUsers
                ], 204);
            } else {
                return response()->json([
                    'message'   =>  'Data berhasil ditampilkan',
                    'data'      =>  $dataUsers
                ], 200);
            }

        } catch (\Throwable $e) {
            # code...
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
            $id_user = Auth::user()->id;
            $name = $request->name;
            $deskripsi = $request->deskripsi;
            $status = $request->status;

            $data = array(
                'id_users' => $id_user,
                'name' => $name,
                'deskripsi' => $deskripsi,
                'status' => $status,
            );

            $data_user = DataUser::find($id_user);

            if(!empty($data_user)){
                $data_user->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'data' => $data_user
                ], 200);

            }else{

            $data = DataUser::create($data);

            return response()->json([
                'status' => 'Created',
                'message' => 'Data berhasil disimpan',
                'data' => $data
            ], 201);

        }
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
