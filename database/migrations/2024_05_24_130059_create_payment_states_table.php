<?php

use App\Models\Payment_state;
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
        Schema::create('payment_states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $this->insertdataPaymentStates();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_states');
    }

    public function insertdataPaymentStates()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Cargado'
            ],
            [
                'id' => 2,
                'name' => 'Firmado'
            ],
            [
                'id' => 3,
                'name' => 'Constancia exitosa'
            ],
            [
                'id' => 4,
                'name' => 'Pago con rechazo'
            ],
        ];
        Payment_state::insert($data);
    }
};
