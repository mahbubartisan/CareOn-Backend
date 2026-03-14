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
        Schema::create('nursing_service_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();

            // Prices
            $table->string('location_group')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_price')->nullable();

            // Selected Services
            $table->json('selected_services')->nullable();

            // Total Price
            $table->string('total_price')->nullable();

            // Payment
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nursing_service_bookings');
    }
};
