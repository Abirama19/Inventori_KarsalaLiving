<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuids;
    protected $fillable = [
        'id_barang',
        'jumlah',
        'store_id',
        'penanggung_jawab_id',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'penanggung_jawab_id');
    }
}
