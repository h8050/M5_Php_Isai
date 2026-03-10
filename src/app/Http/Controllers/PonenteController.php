<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePonenteRequest;
use App\Http\Requests\UpdatePonenteRequest;
use App\Models\Ponente;

class PonenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            "ponentes" => Ponente::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePonenteRequest $request)
    {
        //
        try {
            //code...
            $ponente = Ponente::create($request->validated());
            return $ponente;
        } catch (\Throwable $th) {
            //throw $th;
            return respone()->json([
                "mensaje" => "Hubo un error al guardar",
                "error" => $th->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ponente $ponente)
    {
        //
        return $ponente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePonenteRequest $request, Ponente $ponente)
    {
        //
        $ponente->update($request->validated());
        return $ponente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ponente $ponente)
    {
        //
        $ponente->delete();
        return response()->json([
            "mensaje" => "Ponente eliminado",
            "datos" => $ponente,
        ], 200);
    }
}
