<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyyer_id');
            $table->string('number');
            $table->string('qr');
            $table->bigInteger('price');
            $table->bigInteger('total');
            $table->integer('payment')->comment("1 = COD, 2 = Transfer");
            $table->string('evidence')->nullable()->comment("If payment is made by transfer, the user is required to send proof of payment. Meanwhile, for COD payments, the admin will fill in the final payment data after the order is completed.");
            $table->integer('status')->comment("1 = process, 2 = delivered, 3 = success, 0 = rejected")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
