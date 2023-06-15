<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuids;
    protected $fillable = [
        'nama_store',
        'alamat_store',
        'no_telephone',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'store_id');
    }
}
