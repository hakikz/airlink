<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillCustomer extends Model
{
    public function bill(){
        return $this->belongsTo('App\Bill', 'bill_id');
    }
}
