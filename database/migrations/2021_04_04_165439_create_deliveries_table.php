<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id()->startingValue(20210701);
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('service_id');
            $table->string('sender_phone');
            $table->string('sender_city');
            $table->string('sender_address');
            $table->unsignedBigInteger('rider_id')->nullable();
            $table->string('destination');
            $table->string('reciever');
            $table->string('reciever_phone');
            $table->string('reciever_city');
            $table->double('weight',8,2);
            $table->double('cod_amount', 8,2)->nullable();
            $table->double('delivery_charges', 8,2);
            $table->double('total_charges', 8,2);
            $table->string('payment_method')->nullable();
            $table->enum('status', ['booked','dispatched', 'delivered'])->default('booked');
            $table->date('booking_date');
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
