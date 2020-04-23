<?php

namespace App;

use App\Bill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BillProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id','product_id', 'quantity'
    ];

    public function bill(){
        return $this->belongsTo('App\Bill', 'bill_id');
    }
}
