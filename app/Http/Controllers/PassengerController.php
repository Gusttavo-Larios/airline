<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        $allPassengers = Passenger::all();

        return response()->json($allPassengers);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'cpf' => ['required', 'size:14'],
                'full_name' => ['required']
            ]);


            $newPassenger = Passenger::create($request->all());

            return response()->json([
                'passenger' => $newPassenger,
                'status' => 'created'
            ])->setStatusCode(200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Não foi possível cadastrar o passageiro",
                'status' => 'error'
            ])->setStatusCode(400);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            Passenger::where('id', $id)->update($request->all());

            $passenger = Passenger::where('id', $id)->get();

            return response()->json([
                'passenger' => $passenger,
                'status' => 'updated'
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Não foi possível atualizar o passageiro",
                'status' => 'error'
            ])->setStatusCode(400);
        }
    }

    public function delete(Request $request, string $id)
    {
        try {
            $passenger = Passenger::where('id', $id)->get();

            if (count($passenger) === 0) {
                throw new Exception("Passageiro não encontrado", 1);
            }

            Passenger::where('id', $id)->delete();

            return response()->json([
                'message' => 'Passageiro removido com sucesso',
                'status' => 'success'
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possivel excluir o passageiro',
                'status' => 'error'
            ])->setStatusCode(400);
        }
    }
}
