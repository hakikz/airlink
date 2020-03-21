<?php

namespace App\Http\Controllers\Backend;

use App\AirWayBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AWBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awbs = AirWayBill::latest()->get();
        return view('backend.awb.index',['awbs' => $awbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.awb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'awb_num' => 'required|unique:air_way_bills',
            'storage_size' => 'required',
        ]);
        $awb = new AirWayBill();
        $awb->awb_num = request('awb_num');
        $awb->storage_size = request('storage_size');
        $awb->save();

        $request->session()->flash('success', 'Successfully Created!');
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
        $awb = AirWayBill::find($id);
        return view('backend.awb.edit', ['awb' => $awb]);
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
        request()->validate([
            'awb_num' => 'required|unique:air_way_bills,awb_num,'.$id,
            'storage_size' => 'required',
        ]);
        $awb = AirWayBill::find($id);
        $awb->awb_num = request('awb_num');
        $awb->storage_size = request('storage_size');
        $awb->save();

        $request->session()->flash('success', 'Successfully Udated!');
        return redirect(route('backend.awb.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AirWayBill::find($id)->delete();
        return redirect(route('backend.awb.index'))->withError('Successfully Deleted!');
    }
}
