<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordStocks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_stock',
        'exit',
        'income',
        'updated',
    ];
    public $timestamps = false;
    public function stocks(){
        return $this->belongsTo(Stocks::class, 'kode_unik', 'id_stocks');
    }
}
