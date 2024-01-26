<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Divisa;
use App\Models\Inventario;
use App\Models\ordenEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrdenEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Artisan::call('verificar:productos_vencidos');
        $ordenes = ordenEntrega::all();
        return view('orden.index', compact('ordenes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $numeroId = $id;
        $clientes = Cliente::all();
        $products = Inventario::where('disponibilidad', 1)
        ->select('codigo', 'producto', 'precio')
        ->get();
  
        return view("orden.create", compact('numeroId', 'products', 'clientes'));
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
            "products" => 'required'
        ]);
        $arrayProducts = $request->input('products');

            $orden = new ordenEntrega;
            $orden->name = $request->input('name');
            $orden->apellido = $request->input('apellido');
            $orden->direccion = $request->input('direccion');
            $orden->telefono = $request->input('telefono');
            $tasa =  Divisa::where('name', $request->input('divisas') )->select('tasa')->first();
            $orden->abonado = $request->input('abonado') / $tasa->tasa;
            $orden->precio = $request->input('inputSumaPrecio');
            $orden->fecha_de_prestamo = now();
            $orden->fecha_de_entrega = now()->addDays(3);
            $orden->save();
            $orden->ordenInventario()->attach($arrayProducts);
            foreach ($arrayProducts as $key => $codigo) {
                $producto=Inventario::findOrFail($codigo);
                $producto->disponibilidad = 0;
                $producto->alquiler = now();
                $producto->update();
            }
            
            if(!$request->input('cliente')){
                $client = new Cliente;
                $client->name =   $orden->name . " " .  $orden->apellido;
                $client->fecha_nacimiento =$request->input("fechaNacimiento");
                $client->telefono = $request->input("telefono");
                $client->direccion = $request->input("direccion");
                $client->cedula =  $request->input("cedula");
                $client->save();
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
