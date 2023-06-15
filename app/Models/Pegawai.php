<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuids;
    protected $fillable = [
        'nama_pegawai',
        'jenis_kelamin',
        'jabatan',
        'no_handphone',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'penanggung_jawab_id');
    }
}
