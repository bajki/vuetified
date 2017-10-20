<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWiredPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wired_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('gateway_id');
            $table->string('transaction_no');
            $table->string('sender');
            $table->string('contact_no');
            $table->double('amount', 15, 2);
            $table->string('currency')->default('PHP');
            $table->text('uploads');
            $table->boolean('paid');
            $table->timestamp('date_paid');
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
        Schema::dropIfExists('wired_payments');
    }
}