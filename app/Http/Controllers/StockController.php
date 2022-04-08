<?php

namespace App\Http\Controllers;

use App\Models\RecordStocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Stocks;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataStocks = Stocks::paginate(10);
        return view('Admin.stock', compact('dataStocks'));
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
    public function store(Request $request)
    {
        //
        if ($request->hasFile('gambar_bahan')){
            $request->validate([
                'gambar_bahan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->gambar_bahan->extension();  
            $request->gambar_bahan->move(public_path('uploads'), $imageName);
        }else{
            $imageName= 'default.png';
        }

        // set names of id bahan
        $code_id = time();
       
        RecordStocks::create([
            'id_stock'=>$code_id,
            'income'=>$request->stok_bahan,
        ]);

        Stocks::create([
            'kode_unik'=>$code_id,
            'nama_bahan'=>$request->nama_bahan,
            'kategori_bahan'=>$request->kategori_bahan,
            'stok_bahan'=>$request->stok_bahan,
            'gambar_bahan'=>$imageName,
        ]);
        return redirect('stock')->with('toast_success', 'Data Created Successfully!');
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
        $stock = Stocks::findorfail($id);
        return view('Templates.Table.edit', compact('stock'));
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
        $stock = Stocks::findorfail($id);
        if($request->hasFile('gambar_bahan')){
            Storage::delete(public_path('/uploads/'), $stock->gambar_bahan);
            $request->validate([
                'gambar_bahan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->gambar_bahan->extension();  
            $request->gambar_bahan->move(public_path('uploads'), $imageName);
        }

        // check if changes stok is min
        $current_stock = $stock->stok_bahan;
        $update_stock = $request->stok_bahan;
        $foreign_stock = $stock->kode_unik;
        if($update_stock > $current_stock ){
            $change_stock =  $update_stock - $current_stock;
            RecordStocks::create([
                'id_stock'=>$foreign_stock,
                'income'=>$change_stock,
            ]);
        } elseif($update_stock < $current_stock ){
            $change_stock =  $current_stock- $update_stock;
            RecordStocks::create([
                'id_stock'=>$foreign_stock,
                'exit'=>$change_stock,
            ]);
        }

        $stock->update([
            'nama_bahan'=>$request->nama_bahan,
            'kategori_bahan'=>$request->kategori_bahan,
            'stok_bahan'=>$request->stok_bahan,
            'gambar_bahan'=> $request->hasFile('gambar_bahan')? $imageName: $stock->gambar_bahan,
        ]);

        return redirect('stock')->with('toast_success', 'Data Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $stock = Stocks::findorfail($id);
        $fileName = $stock->gambar_bahan;
        // Storage::disk(public_path('uploads'))->delete($fileName);
        $uniqueCode = $stock->kode_unik;
        $recordFiltered = RecordStocks::where('id_stock', $uniqueCode)->first();

        $recordFiltered ->delete();
        $stock->delete();
        return back()->with('toast_success', 'Data Deleted Successfully!');
    }
}
