<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pasien::orderBy('id', 'asc')->get();

        return response()->json([
            'status'=> true,
            'message'=> 'Data ditemukan',
            'data'=> $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPasien = new Pasien;

        $rules =[
            'nomor_rm'=>'required',
            'nama'=>'required',
            'tanggal_lahir'=>'required|date',
            'nomor_telepon'=>'required',
            'alamat'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukkan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataPasien->nomor_rm= $request->nomor_rm;
        $dataPasien->nama = $request->nama;
        $dataPasien->tanggal_lahir = $request->tanggal_lahir;
        $dataPasien->nomor_telepon = $request->nomor_telepon;
        $dataPasien->alamat = $request->alamat;

        $post = $dataPasien->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses Memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pasien::find($id);
        if ($data){
            return response()-> json([
                'status'=> true,
                'message'=> 'Data ditemukan',
                'data'=> $data
            ], 200);
        } else{
            return response()-> json([
                'status'=> false,
                'message'=> 'Data tidak ditemukan', 
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPasien = Pasien::find($id);
        if(empty($dataPasien)){
            return response()->json ([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules =[
            'nomor_rm'=>'required',
            'nama'=>'required',
            'tanggal_lahir'=>'required|date',
            'nomor_telepon'=>'required',
            'alamat'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataPasien->nomor_rm= $request->nomor_rm;
        $dataPasien->nama = $request->nama;
        $dataPasien->tanggal_lahir = $request->tanggal_lahir;
        $dataPasien->nomor_telepon = $request->nomor_telepon;
        $dataPasien->alamat = $request->alamat;

        $post = $dataPasien->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses melakukan update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPasien = Pasien::find($id);
        if(empty($dataPasien)){
            return response()->json ([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPasien->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
