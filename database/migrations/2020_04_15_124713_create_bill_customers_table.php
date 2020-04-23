<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->string('from_name');
            $table->string('from_address');
            $table->string('from_phone');
            $table->string('to_name');
            $table->string('to_address');
            $table->string('to_phone');
            $table->text('place');
            $table->timestamps();
            $table->foreign('bill_id')->references('bill_id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_customers');
    }
}
