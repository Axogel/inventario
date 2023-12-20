<?php

namespace App\Http\Controllers;

use App\Models\ordenEntrega;
use Illuminate\Http\Request;

class OrdenEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = ordenEntrega::all();
        return view('orden.index', compact('ordenes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("orden.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'marca' => 'required|string',
            'precio' => 'required|numeric',
            'talla' => 'required|string',
            'tipo' => 'required|string',
            'color' => 'required|string',
             'disponibilidad' => 'nullable|string',
        ]);

            $producto = new ordenEntrega;
            $producto->nombre = $request->input('nombre');
            $producto->marca = $request->input('marca');
            $producto->talla = $request->input('talla');
            $producto->precio = $request->input('precio');
            $producto->tipo = $request->input('tipo');
            $producto->color = $request->input('color');
            $producto->disponibilidad = $request->has('disponibilidad') && $request->input('disponibilidad') === 'on' ? 0 : 1;
            // $producto->alquiler = $request->input('disponibilidad') === 'on' ? Carbon::now() :  null; // Establecerá la fecha y hora actual

      
            $producto->save();
            if($request->input('disponibilidad') === 'on'){
                return redirect()->route('orden.create')->with('id', $producto->id);
            }
            $success = array("message" => "Producto creado Satisfactoriamente", "alert" => "success");
            return redirect()->route('inventario.index')->with('success',$success);
    }

    /**
     * Display the specified resource.
     */
    public function show(ordenEntrega $ordenEntrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ordenEntrega $ordenEntrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordenEntrega $ordenEntrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordenEntrega $ordenEntrega)
    {
        //
    }
}
