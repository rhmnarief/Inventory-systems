<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $faker = Faker::create('App\Products');
        Products::truncate();
        Products::create([
            'nama_produk' => "Test nama Produk",
        	'kategori_produk' => "Test kategori_produk",
        	'stok_produk' => 30,
        ]);
    }
}
