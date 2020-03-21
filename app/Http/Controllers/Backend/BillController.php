<?php

namespace App\Http\Controllers\Backend;

use App\Bill;
use App\Branch;
use App\Product;
use App\Setting;
use App\AirWayBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.bill.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::latest()->get();
        $prodcuts = Product::latest()->get();
        $setting = Setting::find(1);
        $awbs = AirWayBill::latest()->get();
        $bill = Bill::get();

        if(count($bill) > 0){
            $id = Bill::latest()->get()->first();
            $bill_id = $id + 1;
        }
        else{
            $bill_id = 547;
        }
        $bill_id_length = strlen((string)$bill_id);
        $zero_fill = (int)$bill_id_length + 1;
        return view('backend.bill.create', [
            'branches' => $branches, 
            'products' => $prodcuts,
            'setting' => $setting,
            'bill_id' => $bill_id,
            'zero_fill' => $zero_fill,
            'awbs' => $awbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // foreach($request->product_id as $key => $product_id){
        //     echo $request->quantity[$key] ."=>". $product_id."<br>";
        // }
        request()->validate([
            'from_name' => 'required',
            'from_address' => 'required',
            'from_phone' => 'required|min:10',
            'to_name' => 'required',
            'to_address' => 'required',
            'to_phone' => 'required|min:10',
            'awb_num' => 'required',
            'product_id.*' => 'required',
            'quantity.*' => 'required|integer',
            'delivery_place' => 'required',
            'qty_cartoon' => 'required',
            'weight' => 'required',
        ]);
        dd($request->all());
        // $bill = new Bill();
        // $awb->awb_num = request('awb_num');
        // $awb->storage_size = request('storage_size');
        // $awb->save();

        // $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.awb.create'));
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
