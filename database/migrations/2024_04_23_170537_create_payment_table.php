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
            $table->string('payment_link');
            $table->string('reference');
            $table->string('payment_instruction');
            $table->string('user');
            $table->string('password');
            $table->string('account_number');
            $table->string('bank_account');
            $table->string('identification_who_receives');
            $table->string('airline_link');
            $table->string('flight_type');
            $table->string('city_origin_ida');
            $table->string('destination_city_outward');
            $table->string('departure_date');
            $table->string('outeard_flight_schedule');
            $table->string('ida_oservation');
            $table->string('city_origin_return');
            $table->string('city_destination_return');
            $table->string('date_return');
            $table->string('return_flight_schedule');
            $table->string('return_oservation');
            $table->string('file_url');
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
