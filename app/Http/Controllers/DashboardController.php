<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Store;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function get()
    {
        $barang = Barang::get();
        $jumlah_barang = $barang->count();
        $store = Store::get();
        $jumlah_store = $store->count();
        $pegawai = Pegawai::get();
        $jumlah_pegawai = $pegawai->count();
        $transaksi = Transaksi::get();
        $jumlah_transaksi = $transaksi->count();
        $user = User::get();
        $jumlah_user = $user->count();
        return view('index', [
            'jumlah_barang' => $jumlah_barang,
            'jumlah_store' => $jumlah_store,
            'jumlah_pegawai' => $jumlah_pegawai,
            'jumlah_transaksi' => $jumlah_transaksi,
            'jumlah_user' => $jumlah_user
            ]);
    }
}
