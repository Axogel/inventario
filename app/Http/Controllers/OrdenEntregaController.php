<?php

namespace App\Http\Controllers;

use App\Models\Divisa;
use App\Models\Inventario;
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
    public function create($id)
    {
        $numeroId = $id;
        $products = Inventario::where('disponibilidad', 1)
        ->select('id', 'nombre', 'precio')
        ->get();
  
        return view("orden.create", compact('numeroId', 'products'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'apellido' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'abonado' => 'required|numeric',
            'inputSumaPrecio' => 'required|numeric',
        ]);
        $arrayProducts = $request->input('products');

            $orden = new ordenEntrega;
            $orden->name = $request->input('name');
            $orden->apellido = $request->input('apellido');
            $orden->direccion = $request->input('direccion');
            $orden->telefono = $request->input('telefono');
            $tasa =  Divisa::where('name', $request->input('divisas') )->select('tasa')->first();
            $orden->abonado = $request->input('abonado') * $tasa->tasa;
           
            $orden->precio = $request->input('inputSumaPrecio');
            $orden->fecha_de_prestamo = now();
            $orden->fecha_de_entrega = now()->addDays(3);

      
            $orden->save();
            $orden->ordenInventario()->attach($arrayProducts);
            foreach ($arrayProducts as $key => $id) {
                $producto=Inventario::findOrFail($id);
                $producto->disponibilidad = 0;
                $producto->alquiler = now();
                $producto->update();
            }

  
            $success = array("message" => "Orden creada Satisfactoriamente", "alert" => "success");
            return redirect()->route('orden.index')->with('success',$success);
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
