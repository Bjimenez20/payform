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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->string('payment_name');
            $table->string('email');
            $table->string('payment_date');
            $table->string('approximate_amounte');
            $table->string('payment_link')->nullable();
            $table->string('reference')->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->string('payment_instruction')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_bank')->nullable();
            $table->string('identification')->nullable();
            $table->string('airline_link')->nullable();
            $table->string('flight_type')->nullable();
            $table->string('city_origin')->nullable();
            $table->string('destination_city')->nullable();
            $table->string('departure_date')->nullable();
            $table->string('outeard_flight_schedule')->nullable();
            $table->string('ida_observation')->nullable();
            $table->string('city_origin_return')->nullable();
            $table->string('city_destination_return')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_flight_schedule')->nullable();
            $table->string('return_observation')->nullable();
            $table->string('file_url')->nullable();
            $table->foreignId('state_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
