<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Airplane;

class AirplaneController {
    public function index() {
        try {
            $allAirplanes = Airplane::all();

            return response()->json([
                "item" => $allAirplanes,
                "status" => "success"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Não foi possível listar as aeronaves.",
                "status" => "error"
            ])->setStatusCode(404, "Not found");
        }
    }

    public function store(Request $request) {
        try {

            $request->validate([
                "serial_number" => ["required"],
                "model" => ["required"]
            ]);

            $newAirplane = Airplane::create($request->all());

            return response()->json([
                "item" => $newAirplane,
                "message" => "Aeronave criada com sucesso!",
                "status" => "success",
            ])->setStatusCode(201, "Created");

        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Não foi possível cadastrar a aeronave.",
                "status" => "error"
            ])->setStatusCode(422, "Unable process entity");
        }
    }
}