<?php

namespace App\Http\Controllers\Backend;

use App\Bill;
use App\Branch;
use App\Product;
use App\Setting;
use App\AirWayBill;
use App\BillProduct;
use App\BillCustomer;
use Barryvdh\DomPDF\Facade as PDF;
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
        $bills = Bill::latest()->get();
        return view('backend.bill.index', ['bills' => $bills]);
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
            $bill_id = (int)$id->bill_id + 1;
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
        $main_price = $request->weight * $request->per_kg;
        $vat = $request->vat / 100;
        if(empty($request->service_charge) && empty($request->door_delivery) && empty($request->packaging_charge)){
            $vat_price = $main_price * $vat;
        }
        elseif(empty($request->service_charge) && empty($request->door_delivery)){
            $total = $request->packaging_charge + $main_price;
            $vat_price = $total * $vat;
        }
        elseif(empty($request->service_charge) && empty($request->packaging_charge)){
            $total = $request->door_delivery + $main_price;
            $vat_price = $total * $vat;
        }
        elseif(empty($request->door_delivery) && empty($request->packaging_charge)){
            $total = $request->service_charge + $main_price;
            $vat_price = $total * $vat;
        }
        elseif(empty($request->service_charge)){
            $total = $request->door_delivery + $request->packaging_charge + $main_price;
            $vat_price = $total * $vat;
        }
        elseif(empty($request->door_delivery)){
            $total = $request->service_charge + $request->packaging_charge + $main_price;
            $vat_price = $total * $vat;
        }
        elseif(empty($request->packaging_charge)){
            $total = $request->service_charge + $request->door_delivery + $main_price;
            $vat_price = $total * $vat;
        }
        else{
            $total = $request->service_charge + $request->door_delivery + $request->packaging_charge + $main_price;
            $vat_price = $total * $vat;
        }

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
        // dd($request->all());
        $bill = new Bill();
        $bill->bill_id = request('bill_id');
        $bill->vat_no = request('vat_no');
        $bill->total = request('total');
        $bill->branch = request('branch');
        $bill->vat_enable = request('vat_check');
        $bill->vat = request('vat');
        $bill->weight = request('weight');
        $bill->service_charge = request('service_charge');
        $bill->door_delivery = request('door_delivery');
        $bill->packaging_charge = request('packaging_charge');
        $bill->awb_num = request('awb_num');
        $bill->delivery_place = request('delivery_place');
        $bill->cartoon_quantity = request('qty_cartoon');
        $bill->price_per_kg = request('per_kg');
        $bill->vat_price = $vat_price;
        $bill_saved = $bill->save();
        if($bill_saved){
            $bill_customer = new BillCustomer();
            $bill_customer->bill_id = request('bill_id');
            $bill_customer->from_name = request('from_name');
            $bill_customer->from_address = request('from_address');
            $bill_customer->from_phone = request('from_phone');
            $bill_customer->to_name = request('to_name');
            $bill_customer->to_address = request('to_address');
            $bill_customer->to_phone = request('to_phone');
            $bill_customer->place = request('delivery_place');
            $bill_customer_saved = $bill_customer->save();
            if($bill_customer_saved){
                foreach($request->product_id as $key => $product_id){
                    $bill_product = new BillProduct();
                    $bill_product->bill_id = request('bill_id');
                    $bill_product->product_id = $product_id;
                    $bill_product->quantity = $request->quantity[$key];
                    $bill_product->save();
                }
                $request->session()->flash('success', 'Successfully Created!');
                echo "<script>window.open('".route('backend.bill.edit',request('bill_id'))."', '_blank')</script>";
                return redirect(route('backend.bill.create'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::where('bill_id', $id)->firstOrFail();
        $bill_customer = BillCustomer::where('bill_id', $id)->firstOrFail();
        $bill_products = BillProduct::where('bill_id', $id)
        ->leftJoin('products', 'bill_products.product_id', '=', 'products.id')
        ->select('products.name', 'bill_products.quantity')->get();
        
        return view('backend.bill.show', [
            'bill' => $bill, 
            'bill_customer' => $bill_customer,
            'bill_products' => $bill_products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::latest()->get();
        $prodcuts = Product::latest()->get();
        $bill = Bill::where('bill_id', $id)->firstOrFail();
        $bill_customer = BillCustomer::where('bill_id', $id)->firstOrFail();
        $bill_products = BillProduct::where('bill_id', $id)->get();
        $awbs = AirWayBill::latest()->get();
        $setting = Setting::find(1);

        // echo $bill->id;
        return view('backend.bill.edit', 
        [
            'branches' => $branches,
            'products' => $prodcuts,
            'bill' => $bill, 
            'bill_customer' => $bill_customer, 
            'bill_products' => $bill_products,
            'awbs' => $awbs,
            'setting' => $setting
        ]);
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
        if($request->vat_check == 1){
            $main_price = $request->weight * $request->per_kg;
            $vat = $request->vat / 100;
            if(empty($request->service_charge) && empty($request->door_delivery) && empty($request->packaging_charge)){
                $vat_price = $main_price * $vat;
            }
            elseif(empty($request->service_charge) && empty($request->door_delivery)){
                $total = $request->packaging_charge + $main_price;
                $vat_price = $total * $vat;
            }
            elseif(empty($request->service_charge) && empty($request->packaging_charge)){
                $total = $request->door_delivery + $main_price;
                $vat_price = $total * $vat;
            }
            elseif(empty($request->door_delivery) && empty($request->packaging_charge)){
                $total = $request->service_charge + $main_price;
                $vat_price = $total * $vat;
            }
            elseif(empty($request->service_charge)){
                $total = $request->door_delivery + $request->packaging_charge + $main_price;
                $vat_price = $total * $vat;
            }
            elseif(empty($request->door_delivery)){
                $total = $request->service_charge + $request->packaging_charge + $main_price;
                $vat_price = $total * $vat;
            }
            elseif(empty($request->packaging_charge)){
                $total = $request->service_charge + $request->door_delivery + $main_price;
                $vat_price = $total * $vat;
            }
            else{
                $total = $request->service_charge + $request->door_delivery + $request->packaging_charge + $main_price;
                $vat_price = $total * $vat;
            }
        }
        else{
            $vat_price = NULL;
        }

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
        $bill = Bill::where('bill_id', $id)->firstOrFail();
        $bill->bill_id = request('bill_id');
        $bill->vat_no = request('vat_no');
        $bill->total = request('total');
        $bill->branch = request('branch');
        $bill->vat_enable = request('vat_check');
        $bill->vat = request('vat');
        $bill->weight = request('weight');
        $bill->service_charge = request('service_charge');
        $bill->door_delivery = request('door_delivery');
        $bill->packaging_charge = request('packaging_charge');
        $bill->awb_num = request('awb_num');
        $bill->delivery_place = request('delivery_place');
        $bill->cartoon_quantity = request('qty_cartoon');
        $bill->price_per_kg = request('per_kg');
        $bill->vat_price = $vat_price;
        $bill_saved = $bill->save();
        if($bill_saved){
            $bill_customer = BillCustomer::where('bill_id', $id)->firstOrFail();;
            $bill_customer->bill_id = request('bill_id');
            $bill_customer->from_name = request('from_name');
            $bill_customer->from_address = request('from_address');
            $bill_customer->from_phone = request('from_phone');
            $bill_customer->to_name = request('to_name');
            $bill_customer->to_address = request('to_address');
            $bill_customer->to_phone = request('to_phone');
            $bill_customer->place = request('delivery_place');
            $bill_customer_saved = $bill_customer->save();
            if($bill_customer_saved){
                foreach($request->product_id as $key => $product_id){
                    $bill_product = BillProduct::updateOrCreate(
                        ['id' => $request->p_id[$key], 'bill_id' => $id],
                        ['product_id' => $product_id, 'quantity' => $request->quantity[$key]]
                    );
                }
                $request->session()->flash('success', 'Successfully Updated!');
                return redirect(route('backend.bill.edit', $id));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::where('bill_id', $id)->delete();
        return redirect(route('backend.bill.index'))->withError('Successfully Deleted!');
    }

    public function generatePDF($id)
    {
        // $data = ['title' => 'coding driver test title', 'id' => $id];
        // $pdf = PDF::loadView('backend.bill.pdf', $data);
  
        // return $pdf->download('codingdriver.pdf');
        $bill = Bill::where('bill_id', $id)->firstOrFail();
        $bill_customer = BillCustomer::where('bill_id', $id)->firstOrFail();
        $bill_products = BillProduct::where('bill_id', $id)
        ->leftJoin('products', 'bill_products.product_id', '=', 'products.id')
        ->select('products.name', 'bill_products.quantity')->get();

        // ini_set('max_execution_time', 1200);
        $pdf = PDF::loadView('backend.bill.pdf', [
            'bill' => $bill,
            'bill_customer' => $bill_customer,
            'bill_products' => $bill_products
        ]);
        // return $pdf->download('bill.pdf');
        return $pdf->stream();

        // return view('backend.bill.pdf', [
        //     'bill' => $bill, 
        //     'bill_customer' => $bill_customer,
        //     'bill_products' => $bill_products
        // ]);
    }

}
