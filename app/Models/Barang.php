<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;
    protected $fillable = [
        'nama_barang',
        'kategori',
        'satuan',
        'stok',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_barang');
    }
}
