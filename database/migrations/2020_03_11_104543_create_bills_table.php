<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('vat_no');
            $table->float('total');
            $table->boolean('vat_enable');
            $table->float('weight');
            $table->float('service_charge');
            $table->float('door_delivery');
            $table->float('packaging_charge');
            $table->text('awb_id');
            $table->text('delivery_place');
            $table->integer('cartoon_quantity');
            $table->float('price_per_kg');
            $table->float('vat_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
