<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\RecordProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use function PHPSTORM_META\type;

class ProductController extends Controller
{
    //
    public function index(){
        $dataProduct = Products::paginate(10);
        return view('Admin.product', compact('dataProduct'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // set upload image
        if ($request->hasFile('gambar_produk')){
            $request->validate([
                'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->gambar_produk->extension();  
            $request->gambar_produk->move(public_path('uploads'), $imageName);
        }else{
            $imageName= 'default.png';
        }

        // set names of id products
        $code_id = time();
       
        RecordProducts::create([
            'id_product'=>$code_id,
            'income'=>$request->stok_produk,
        ]);

        Products::create([
            'kode_unik'=>$code_id,
            'nama_produk'=>$request->nama_produk,
            'kategori_produk'=>$request->kategori_produk,
            'stok_produk'=>$request->stok_produk,
            'gambar_produk'=>$imageName,
        ]);
        return redirect('product')->with('toast_success', 'Data Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::findorfail($id);
        return view('Templates.Table.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      
        $product = Products::findorfail($id);
        if($request->hasFile('gambar_produk')){
            Storage::delete(public_path('/uploads/'), $product->gambar_produk);
            $request->validate([
                'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->gambar_produk->extension();  
            $request->gambar_produk->move(public_path('uploads'), $imageName);
        }

        // check if changes stok is min
        $current_stock = $product->stok_produk;
        $update_stock = $request->stok_produk;
        $foreign_stock = $product->kode_unik;
        if($update_stock > $current_stock ){
            $change_stock =  $update_stock - $current_stock;
            RecordProducts::create([
                'id_product'=>$foreign_stock,
                'income'=>$change_stock,
            ]);
        } elseif($update_stock < $current_stock ){
            $change_stock =  $current_stock- $update_stock;
            RecordProducts::create([
                'id_product'=>$foreign_stock,
                'exit'=>$change_stock,
            ]);
        }

        $product->update([
            'nama_produk'=>$request->nama_produk,
            'kategori_produk'=>$request->kategori_produk,
            'stok_produk'=>$request->stok_produk,
            'gambar_produk'=> $request->hasFile('gambar_produk')? $imageName: $product->gambar_produk,
        ]);

        return redirect('product')->with('toast_success', 'Data Update Successfully!');
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Products::findorfail($id);
        Storage::delete(public_path('/uploads/'), $product->gambar_produk);
        $uniqueCode = $product->kode_unik;
        $recordFiltered = RecordProducts::where('id_product', $uniqueCode)->first();

        $recordFiltered ->delete();
        $product->delete();
        return back()->with('toast_success', 'Data Deleted Successfully!');
    }
}
