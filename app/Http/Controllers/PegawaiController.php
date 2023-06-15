<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    //
    public function get()
    {
        $pegawai = Pegawai::get();

        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    public function create()
    {
        return view('pegawai.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_pegawai" => "required|string",
            "jenis_kelamin" => "required|string",
            "jabatan" => "required|string",
            "no_handphone" => "required|string",
        ]);
        $fields = $validator->validated();
        Pegawai::create($fields);

        return redirect('pegawai');
    }

    public function delete($id)
    {
        Pegawai::where('id', '=', $id)->delete();

        return redirect('pegawai');
    }

    public function update($id)
    {
        return view('pegawai.edit', ['id' => $id]);
    }

    public function updatePegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|uuid",
        ]);
        if ($validator->fails()) {
            return response()->json($request, 400);
        };
        $fields = $validator->validated();
        $validator2 = Validator::make($request->all(), [
            "nama_pegawai" => "string",
            "jenis_kelamin" => "string",
            "jabatan" => "string",
            "no_handphone" => "string",
        ]);
        $fields2 = $validator2->validated();
        $pegawai = Pegawai::where('id', '=', $fields['id'])->first();
        if (!$pegawai) {
            return response()->json(["error" => "Pegawai tidak ditemukan"], 400);
        }
        $update = $pegawai->update($fields2);
        return redirect('pegawai');
    }
}
