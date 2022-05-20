<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordStocks;
use App\Models\Stocks;


class RecordStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataStocks =Stocks::all();
        $dataRecordStock = RecordStocks::paginate(5);
        $code = [];
        foreach ($dataRecordStock as $item) {
            $uniqueCode = $item->id_stock;
            array_push($code,$uniqueCode);
        }
        $code = array_unique($code);
        $dataFiltered = Stocks::where('kode_unik', $code)->first();

        return view('Admin.recordStock',compact('dataRecordStock','dataStocks','dataFiltered'));
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
       
        $codeStock = $request->unique_code;
        $stockSelected = Stocks::where('kode_unik', '=', $codeStock)->firstOrFail(); 
        $stock = $stockSelected->stok_bahan;
        $countTotalStock = $stock + $changeValue;
        $countMinusStock = $stock - $changeValue;
        if($countMinusStock < 0){
            return redirect('record-stock')->with('toast_error', 'Data Exist Overlimit!');
        }else{
            RecordStocks::create([
                'id_stock'=>$request->unique_code,
                'exit'=> $statusRequest === 'exit'? $changeValue : 0 ,
                'income'=> $statusRequest === 'income'? $changeValue : 0 ,
                'updated'=>$request->updatedAt,
                'editedBy'=>auth()->user()->level,
            ]);
            $stockSelected-> update([
                'stok_bahan'=> $statusRequest ==='income'? $countTotalStock : $countMinusStock ,
            ]);
        }
        
        return redirect('record-stock')->with('toast_success', 'Data Update Successfully!');

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
