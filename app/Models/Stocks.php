<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_unik',
        'nama_bahan',
        'kategori_bahan',
        'stok_bahan',
        'gambar_bahan'
    ];
    public $timestamps = false;
    public function record(){
        return $this->hasMany(RecordStocks::class );
    }
}
