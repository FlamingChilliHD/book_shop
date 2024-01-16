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
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('town');
            $table->string('postcode');
            $table->string('country');
            $table->string('county');
            $table->integer('phone_number')->nullable();
            $table->integer('subtotal');
            $table->string('shipping');
            $table->integer('shipping_fee');
            $table->decimal('discount', 6, 2)->nullable();
            $table->decimal('tax', 6, 2)->nullable();
            $table->decimal('total', 6, 2)->nullable();
            $table->timestamps();
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
