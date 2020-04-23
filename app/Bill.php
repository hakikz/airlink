<?php

namespace App;

use App\BillProduct;
use App\BillCustomer;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function bill_customer(){
        return $this->hasMany('App\BillCustomer', 'bill_id');
    }

    public function bill_products(){
        return $this->hasMany('App\BillProduct', 'bill_id');
    }
}
