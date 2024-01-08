<?php

namespace App\Http\Controllers;

use App\Models\LibroDiario;
use Illuminate\Http\Request;

class LibroDiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las fechas distintas de la columna 'fecha' en la tabla libro_diario
        $fechas = LibroDiario::distinct()->pluck('fecha');
 
        return view('libroDiario.list', ['fechas' => $fechas]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LibroDiario $libroDiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibroDiario $libroDiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LibroDiario $libroDiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibroDiario $libroDiario)
    {
        //
    }
}
