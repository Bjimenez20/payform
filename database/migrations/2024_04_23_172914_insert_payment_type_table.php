<?php

use App\Models\State;
use App\Models\Type_payment;
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
        $this->createStates();
        $this->createPaymentTypes();
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }

    public function createStates()
    {
        $states = [
            [
                'id' => 1,
                'name' => 'Activo'
            ],
            [
                'id' => 2,
                'name' => 'Inactivo'
            ]
            ];
            State::insert($states);
    }

    public function createPaymentTypes()
    {
        $type_payment = [
            [
                'id' => 1,
                'name' => 'Nomina',
                'state_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Proveedores',
                'state_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'PSE',
                'state_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'Vuelos',
                'state_id' => 1
            ],
            [
                'id' => 5,
                'name' => 'Portales',
                'state_id' => 1
            ],
            [
                'id' => 6,
                'name' => 'Urgentes',
                'state_id' => 1
            ]
            ];
            Type_payment::insert($type_payment);
    }
};
