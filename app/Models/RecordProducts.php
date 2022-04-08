<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordProducts extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_product',
        'exit',
        'income',
        'updated',
    ];
    public $timestamps = false;
    public function product(){
        return $this->belongsTo(Products::class, 'kode_unik', 'id_product');
    }
}
