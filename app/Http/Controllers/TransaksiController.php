<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Store;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    //
    public function get()
    {
        $transaksi = Transaksi::get()->toArray();
        $barang_id = [];
        foreach ($transaksi as $tr) {
            array_push($barang_id, $tr['id_barang']);
        }
        $barangs = Barang::whereIn('id', $barang_id)->get()->toArray();
        for ($i = 0; $i < count($transaksi); $i++) {
            for ($j = 0; $j < count($barangs); $j++) {
                if ($transaksi[$i]['id_barang'] == $barangs[$j]['id']) {
                    $transaksi[$i]['barang'] = $barangs[$j];
                }
            }
        }
        $store_id = [];
        foreach ($transaksi as $tr) {
            array_push($store_id, $tr['store_id']);
        }
        $stores = Store::whereIn('id', $store_id)->get()->toArray();
        for ($i = 0; $i < count($transaksi); $i++) {
            for ($j = 0; $j < count($stores); $j++) {
                if ($transaksi[$i]['store_id'] == $stores[$j]['id']) {
                    $transaksi[$i]['store'] = $stores[$j];
                }
            }
        }
        $penanggung_jawab_id = [];
        foreach ($transaksi as $tr) {
            array_push($penanggung_jawab_id, $tr['penanggung_jawab_id']);
        }
        $pegawais = Pegawai::whereIn('id', $penanggung_jawab_id)->get()->toArray();
        for ($i = 0; $i < count($transaksi); $i++) {
            for ($j = 0; $j < count($pegawais); $j++) {
                if ($transaksi[$i]['penanggung_jawab_id'] == $pegawais[$j]['id']) {
                    $transaksi[$i]['penanggung_jawab'] = $pegawais[$j];
                }
            }
        }
        return view('transaksi.index', ['transaksi' => $transaksi]);
    }

    public function create()
    {
        $barang = Barang::get();
        $store = Store::get();
        $pegawai = Pegawai::get();
        return view('transaksi.add', [
            'barang' => $barang,
            'store' => $store,
            'pegawai' => $pegawai
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id_barang" => "required|uuid",
            "jumlah" => "required|integer",
            "store_id" => "required|uuid",
            "penanggung_jawab_id" => "required|uuid",
        ]);
        $fields = $validator->validated();
        $jumlah = $fields['jumlah'];
        Barang::find($fields['id_barang'])->decrement('stok', $jumlah);
        Transaksi::create($fields);

        return redirect('transaksi');
    }

    public function delete($id)
    {
        Transaksi::where('id', '=', $id)->delete();

        return redirect('transaksi');
    }
}
