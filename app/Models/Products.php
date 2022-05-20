<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_unik',
        'nama_produk',
        'kategori_produk',
        'stok_produk',
        'gambar_produk',
        'catatan',
    ];
    public $timestamps = false;
    public function record(){
        return $this->hasMany(RecordProducts::class);
    }
}
