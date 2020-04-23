<?php

namespace App\Http\Controllers\Backend;

use App\BillProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillProductController extends Controller
{
    /**
     * Remove the Bill Product specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteProduct($id){
        BillProduct::find($id)->delete();
        echo "YES";
    }
}
