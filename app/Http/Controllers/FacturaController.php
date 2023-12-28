<?php

namespace App\Http\Controllers;

use App\Models\Divisa;
use App\Models\Factura;
use App\Models\ordenEntrega;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas =  Factura::all();
        $divisa = Divisa::all();
        return view('factura.index', compact('facturas', 'divisa'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */   
     public function create($id)
    {
        $orden = ordenEntrega::find($id);
        $divisa = Divisa::all();


        return view("factura.create", compact('orden', 'divisa'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'rif' => 'required|string',
            'control' => 'required|string',
            'inputSumaPrecio' => 'required|numeric',
            'divisas' => 'required|string',
        ]);
    
        // Creación del objeto en la base de datos
        // Supongamos que tienes un modelo llamado "Empresa"
        $factura = new Factura;
        $factura->name = $request->input('name');
        $factura->direccion = $request->input('direccion');
        $factura->telefono = $request->input('telefono');
        $factura->RIF = $request->input('rif');
        $factura->control= $request->input('control');
        $factura->subtotal = $request->input('inputSumaPrecio');
        $factura->divisa = $request->input('divisas');
        $factura->save();








    
        // Puedes hacer más cosas aquí, como redireccionar a una vista o devolver una respuesta JSON
        $success = array("message" => "Factura creada Satisfactoriamente", "alert" => "success");
        return redirect()->route('factura.index')->with('success',$success);    }
    

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
