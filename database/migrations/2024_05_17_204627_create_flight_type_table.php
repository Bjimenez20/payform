<?php

use App\Models\Type_flight;
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
        Schema::create('flight_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('state_id')->constrained("states")->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });
        $this->insertdataflightType();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_type');
    }

    public function insertdataflightType()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Ida y Vuelta',
                'state_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Solo Ida',
                'state_id' => 1
            ],
        ];
        Type_flight::insert($data);
    }
};
