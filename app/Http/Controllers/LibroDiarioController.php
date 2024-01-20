<?php

namespace App\Http\Controllers;

use App\Models\LibroDiario;
use App\Models\LibroMayor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class LibroDiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fechas = LibroDiario::distinct()->pluck('fecha');
 
        return view('libroDiario.list', ['fechas' => $fechas]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libroMayor = LibroMayor::all();
        return view("libroDiario.create", compact('libroMayor'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'debeIdMayor' => [
                'required',
                Rule::notIn([$request->input('haberIdMayor')]),
            ],
            'haberIdMayor' => [
                'required',
                Rule::notIn([$request->input('debeIdMayor')]),
            ],
            'concepto' => 'required|string',
            'debe' => 'required|numeric',
            'haber' => 'required|numeric',

        ]);

        $libroDiario = new LibroDiario;
        $libroDiario->concepto= $request->input('concepto');
        $libroDiario->debe=$request->input('debe');
        $libroDiario->haber =$request->input('haber');
        $libroDiario->haber =$request->input('haberIdMayor');
        $libroDiario->haber =$request->input('debeIdMayor');

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
