<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\RecordProducts;

class RecordProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataProduct =Products::all();
        $dataRecordProduct = RecordProducts::paginate(5);
        $code = [];
        foreach ($dataRecordProduct as $item) {
            $uniqueCode = $item->id_product;
            array_push($code,$uniqueCode);
        }
        $code = array_unique($code);
        $dataFiltered = Products::where('kode_unik', $code)->first();
        // return dd($dataProduct);

        return view('Admin.recordProduct',compact('dataRecordProduct','dataProduct','dataFiltered'));
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
        $statusRequest = $request->statusRecord;
        $changeValue =$request->changeValue;
       
        $codeProduct = $request->unique_code;
        $productSelected = Products::where('kode_unik', '=', $codeProduct)->firstOrFail(); 
        $productStock = $productSelected->stok_produk;
        $countTotalStock = $productStock + $changeValue;
        $countMinusStock = $productStock - $changeValue;
        if($countMinusStock < 0){
            return redirect('record-product')->with('toast_error', 'Data Exist Overlimit!');
        }else{
            RecordProducts::create([
                'id_product'=>$request->unique_code,
                'exit'=> $statusRequest === 'exit'? $changeValue : 0 ,
                'income'=> $statusRequest === 'income'? $changeValue : 0 ,
                'updated'=>$request->updatedAt,
                'editedBy'=>auth()->user()->level,
            ]);
            $productSelected-> update([
                'stok_produk'=> $statusRequest ==='income'? $countTotalStock : $countMinusStock ,
            ]);
        }
        
        return redirect('record-product')->with('toast_success', 'Data Update Successfully!');

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
    }
}
