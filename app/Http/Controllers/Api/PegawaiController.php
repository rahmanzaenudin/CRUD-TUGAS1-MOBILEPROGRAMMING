<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::orderBy('id', 'asc')->get();

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
        $dataPegawai = new Pegawai;

        $rules =[
            'nip'=>'required',
            'nama'=>'required',
            'tanggal_lahir'=>'required|date',
            'nomor_telepon'=>'required',
            'email'=>'required',
            'password'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'Gagal memasukkan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataPegawai->nip = $request->nip;
        $dataPegawai->nama = $request->nama;
        $dataPegawai->tanggal_lahir = $request->tanggal_lahir;
        $dataPegawai->nomor_telepon = $request->nomor_telepon;
        $dataPegawai->email = $request->email;
        $dataPegawai->password = $request->password;

        $post = $dataPegawai->save();

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
        $data = Pegawai::find($id);
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
        $dataPegawai = Pegawai::find($id);
        if(empty($dataPegawai)){
            return response()->json ([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules =[
            'nip'=>'required',
            'nama'=>'required',
            'tanggal_lahir'=>'required|date',
            'nomor_telepon'=>'required',
            'email'=>'required',
            'password'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataPegawai->nip = $request->nip;
        $dataPegawai->nama = $request->nama;
        $dataPegawai->tanggal_lahir = $request->tanggal_lahir;
        $dataPegawai->nomor_telepon = $request->nomor_telepon;
        $dataPegawai->email = $request->email;
        $dataPegawai->password = $request->password;

        $post = $dataPegawai->save();

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
        $dataPegawai = Pegawai::find($id);
        if(empty($dataPegawai)){
            return response()->json ([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPegawai->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
