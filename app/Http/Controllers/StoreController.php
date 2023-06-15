<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    //
    public function get()
    {
        $store = Store::get();

        return view('store.index', ['store' => $store]);
    }

    public function create()
    {
        return view('store.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_store" => "required|string",
            "alamat_store" => "required|string",
            "no_telephone" => "required|string",
        ]);
        $fields = $validator->validated();
        Store::create($fields);

        return redirect('store');
    }

    public function delete($id)
    {
        Store::where('id', '=', $id)->delete();

        return redirect('store');
    }

    public function update($id)
    {
        return view('store.edit', ['id' => $id]);
    }

    public function updateStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required|uuid",
        ]);
        if ($validator->fails()) {
            return response()->json($request, 400);
        };
        $fields = $validator->validated();
        $validator2 = Validator::make($request->all(), [
            "nama_store" => "string",
            "alamat_store" => "string",
            "no_telephone" => "string",
        ]);
        $fields2 = $validator2->validated();
        $store = Store::where('id', '=', $fields['id'])->first();
        if (!$store) {
            return response()->json(["error" => "Store tidak ditemukan"], 400);
        }
        $update = $store->update($fields2);
        return redirect('store');
    }
}
