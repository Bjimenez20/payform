<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payform;
use App\Models\Type_payment;
use Carbon\Carbon;

class PayformController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        $type_payments = Type_payment::all();
        $date = Carbon::now()->format('Y-m-d');
        return view('create', compact('type_payments', 'date'));
    }

    public function store(Request $request)
    {
        $data = new Payform();

        $data->type_payment = $request->input('tipo_pago');
        $data->email = $request->input('correo_solicitante');
        $data->payment_date = $request->input('fecha_pago');
        $data->approximate_amounte = $request->input('monto_aprox');

        if ($data->save()) {

            return response()->json([
                'status' => 200,
                'title' => 'Éxito',
                'message' => 'Registro creado exitosamente'
            ]);
        }
    }

    public function list()
    {
        $data = Payform::select(
            'payment.payment_date',
            'payment.created_at',
            'payment_type.name')
            ->join('payment_type', 'payment.type_payment', '=', 'payment_type.id')
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
