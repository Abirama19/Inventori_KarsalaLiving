<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    //
    public function get()
    {
        $barang = Barang::get();

        return view('barang.index', ['barang' => $barang]);
    }

    public function create()
    {
        return view('barang.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_barang" => "required|string",
            "kategori" => "required|string",
            "satuan" => "required|string",
            "stok" => "required|string",
        ]);
        $fields = $validator->validated();
        Barang::create($fields);

        return redirect('barang');
    }

    public function delete($id)
    {
        Barang::where('id', '=', $id)->delete();

        return redirect('barang');
    }

    public function update($id)
    {
        return view('barang.edit', ['id' => $id]);
    }

    public function updateBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|uuid",
        ]);
        if ($validator->fails()) {
            return response()->json($request, 400);
        };
        $fields = $validator->validated();
        $validator2 = Validator::make($request->all(), [
            "nama_barang" => "string",
            "kategori" => "string",
            "satuan" => "string",
            "stok" => "integer",
        ]);
        $fields2 = $validator2->validated();
        $barang = Barang::where('id', '=', $fields['id'])->first();
        if (!$barang) {
            return response()->json(["error" => "Barang tidak ditemukan"], 400);
        }
        $update = $barang->update($fields2);
        return redirect('barang');
    }
}
