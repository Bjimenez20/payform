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
            $table->string('user');
            $table->string('password');
            $table->string('payment_instruction');
            $table->string('account_number');
            $table->string('account_bank');
            $table->string('identification');
            $table->string('airline_link');
            $table->string('flight_type');
            $table->string('city_origin');
            $table->string('destination_city');
            $table->string('departure_date');
            $table->string('outeard_flight_schedule');
            $table->string('ida_observation');
            $table->string('city_origin_return');
            $table->string('city_destination_return');
            $table->string('return_date');
            $table->string('return_flight_schedule');
            $table->string('return_observation');
            $table->string('file_url');
            $table->foreignId('state_id');
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
