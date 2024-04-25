<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        // Verificar si se ha enviado un archivo
        if ($request->hasFile('archivo')) {
            $destinationPath = 'public/payments/';
            // Obtener el nombre original del archivo cargado
            $fileName = $request->file('archivo')->getClientOriginalName();
            // Obtener el contenido del archivo cargado
            $fileContent = file_get_contents($request->file('archivo')->getRealPath());
            // Guardar el archivo en el almacenamiento
            Storage::put($destinationPath . $fileName, $fileContent);
            $documento = new Payform();
            $documento->addMedia(storage_path('app/' . $destinationPath . $fileName))
                ->toMediaCollection('archivo');

            // Si necesitas almacenar la ruta del archivo en la base de datos, hazlo aquí
            $data->file_url = Storage::url($destinationPath . $fileName);
        }

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
            'payment.id',
            'payment.payment_date',
            'payment.created_at',
            'payment_type.name',
            'payment.file_url'
        )
            ->join('payment_type', 'payment.type_payment', '=', 'payment_type.id')
            ->get();

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    // public function storeFile(Request $request)
    // {
    //     // Verificar si se ha enviado un archivo
    //     if ($request->hasFile('archivo')) {
    //         $destinationPath = 'public/payments/';
    //         // Obtener el nombre original del archivo cargado
    //         $fileName = $request->file('archivo')->getClientOriginalName();
    //         dd($fileName);
    //         // Obtener el contenido del archivo cargado
    //         $fileContent = file_get_contents($request->file('archivo')->getRealPath());
    //         dd($fileContent);
    //         // Guardar el archivo en el almacenamiento
    //         Storage::put($destinationPath . $fileName, $fileContent);
    //         dd('Archivo guardado correctamente');
    //         $documento = new Payform();
    //         $documento->addMedia(storage_path('app/' . $destinationPath . $fileName))
    //             ->toMediaCollection('archivo');

    //         // Si necesitas almacenar la ruta del archivo en la base de datos, hazlo aquí
    //         // $data->file = Storage::url($destinationPath . $fileName);
    //     }

    //     return $this->index();
    // }
}
