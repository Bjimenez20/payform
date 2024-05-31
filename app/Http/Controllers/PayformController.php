<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Payform;
use App\Models\Payment_state;
use App\Models\State;
use App\Models\Type_flight;
use App\Models\Type_payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PayformController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function homeothers()
    {
        return view('homeothers');
    }

    public function create()
    {
        $payments_type = Type_payment::all();
        $type_filghts = Type_flight::all();
        $date = Carbon::now()->format('Y-m-d');
        return view('create', compact('payments_type', 'type_filghts', 'date'));
    }

    public function store(Request $request)
    {
        $data = new Payform();


        $data->payment_type = $request->input('payment_type');
        $data->payment_name = $request->input('payment_name');
        $data->email = $request->input('email');
        $data->payment_date = $request->input('payment_date');
        $data->approximate_amounte = $request->input('approximate_amounte');
        $data->payment_link = $request->input('payment_link');
        $data->reference = $request->input('reference_id');
        $data->user = $request->input('user');
        $data->password = $request->input('password');
        $data->payment_instruction = $request->input('payment_instructions');
        $data->account_number = $request->input('account_number');
        $data->account_bank = $request->input('account_bank');
        $data->identification = $request->input('identification');
        $data->airline_link = $request->input('airline_link');
        $data->flight_type = $request->input('flight_type');
        $data->city_origin = $request->input('city_origin');
        $data->destination_city = $request->input('destination_city');
        $data->departure_date = $request->input('departure_date');
        $data->outeard_flight_schedule = $request->input('outeard_flight_schedule');
        $data->ida_observation = $request->input('ida_observation');
        $data->city_origin_return = $request->input('city_origin_return');
        $data->city_destination_return = $request->input('city_destination_return');
        $data->return_date = $request->input('return_date');
        $data->return_flight_schedule = $request->input('return_flight_schedule');
        $data->return_observation = $request->input('return_observation');

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
        $user = Auth::user();
        // dd($user->role);
        $dataQuery = Payform::selectRaw(
            'payment.id,
             payment.payment_date,
             payment.created_at,
             payment_type.name type_name,
             payment.payment_name,
             payment.email,
             payment.file_url,
             payment_states.name payment_states'
        )
            ->join('payment_type', 'payment.payment_type', '=', 'payment_type.id')
            ->join('payment_states', 'payment.state_id', '=', 'payment_states.id')
            ->where('payment_states.name', '=', 'Cargado');
        if($user->role == 'Solicitante'){

            $dataQuery->where('payment.email', $user->email);

        }
        $data = $dataQuery->get();

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function listother()
    {
        $data = Payform::selectRaw(
            'payment.id,
             payment.payment_date,
             payment.created_at,
             payment_type.name type_name,
             payment.payment_name,
             payment.email,
             payment.file_url,
             payment_states.name payment_states'
        )
            ->join('payment_type', 'payment.payment_type', '=', 'payment_type.id')
            ->join('payment_states', 'payment.state_id', '=', 'payment_states.id')
            ->where('payment_states.name', '!=', 'Cargado')
            ->get();

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = Payform::findOrFail($id);

        $states = State::all();
        $filghts_type = Type_flight::all();
        $payments_type = Type_payment::all();
        $payments_states = Payment_state::all();
        return view('edit', compact('data', 'states', 'filghts_type', 'payments_type', 'payments_states'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        payform::where('id', $id)->update([
            'payment_type' => $request->input('payment_type'),
            'payment_name' => $request->input('payment_name'),
            'state_id' => $request->input('payment_state'),
            'email' => $request->input('email'),
            'payment_date' => $request->input('payment_date'),
            'approximate_amounte' => $request->input('approximate_amounte'),
            'payment_link' => $request->input('payment_link'),
            'reference' => $request->input('reference_id'),
            'user' => $request->input('user'),
            'password' => $request->input('password'),
            'payment_instruction' => $request->input('payment_instructions'),
            'account_number' => $request->input('account_number'),
            'account_bank' => $request->input('account_bank'),
            'identification' => $request->input('identification'),
            'airline_link' => $request->input('airline_link'),
            'flight_type' => $request->input('flight_type'),
            'city_origin' => $request->input('city_origin'),
            'destination_city' => $request->input('destination_city'),
            'departure_date' => $request->input('departure_date'),
            'outeard_flight_schedule' => $request->input('outeard_flight_schedule'),
            'ida_observation' => $request->input('ida_observation'),
            'city_origin_return' => $request->input('city_origin_return'),
            'city_destination_return' => $request->input('city_destination_return'),
            'return_date' => $request->input('return_date'),
            'return_flight_schedule' => $request->input('return_flight_schedule'),
            'return_observation' => $request->input('return_observation')

        ]);

        return response()->json([
            'title' => 'Éxito',
            'status' => 200,
            'message' => 'Registro actualizado exitosamente'
        ]);
    }
}
