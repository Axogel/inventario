<?php

namespace App\Http\Controllers;

use App\Models\LibroDiario;
use App\Models\LibroMayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class LibroDiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fechas = LibroDiario::pluck('fecha');
    
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
        $validator = Validator::make($request->all(), [
            'debeIdMayor' => 'required|array',
            'debe.*' => 'numeric',
            'haberIdMayor' => 'required|array',
            'haber.*' => 'numeric',
            'concepto' => 'required|string',
        ], [
            'debeIdMayor.required' => 'El campo de debeIdMayor es obligatorio.',
            'debeIdMayor.array' => 'El campo de debeIdMayor debe ser un array.',
            'debe.*.numeric' => 'Cada valor en el array de debe debe ser numérico.',
            'haberIdMayor.required' => 'El campo de haberIdMayor es obligatorio.',
            'haberIdMayor.array' => 'El campo de haberIdMayor debe ser un array.',
            'haber.*.numeric' => 'Cada valor en el array de haber debe ser numérico.',
            'concepto.required' => 'El campo de concepto es obligatorio.',
            'concepto.string' => 'El campo de concepto debe ser una cadena de texto.',
        ]);
        
        $validator->after(function ($validator) use ($request) {
            // Realiza la validación personalizada de la suma
            $debeSum = array_sum($request->input('debe'));
            $haberSum = array_sum($request->input('haber'));
            $debe = $request->input("debeIdMayor");
            $haber = $request->input("haberIdMayor");

            foreach ($debe as $key => $debeItem) {
               foreach ($haber as $key => $haberItem) {
                    if($debeItem == $haberItem){
                        $validator->errors()->add('debe', 'Las cuentas del libro mayor tienen que ser diferentes');

                    }
               }
            }
        
            if ($debeSum != $haberSum) {
                $validator->errors()->add('debe', 'La suma de los valores en debe debe ser igual a la suma de los valores en haber.');
            };

        });
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $libroDiario = new LibroDiario;
        $libroDiario->concepto = $request->input('concepto');
        $libroDiario->debe = json_encode($request->input('debe'));  // Convertir a JSON
        $libroDiario->haber = json_encode($request->input('haber')); // Convertir a JSON
        $libroDiario->haberIdMayor = $request->input('haberIdMayor');
        $libroDiario->debeIdMayor = $request->input('debeIdMayor');
        $libroDiario->fecha = now();
        $libroDiario->save();

        $haberIdMayor = $request->input('haberIdMayor');
        $debe = array_sum($request->input('debe'));

        $libroMayor = LibroMayor::where('id', $haberIdMayor)->first();

        if ($libroMayor) {
            $libroMayor->saldo -= $debe;
            $libroMayor->save();
        } else {
            throw new \Exception('No se pudo encontrar la cuenta en el Libro Mayor.');
            }



        $success = array("message" => "Libro diario creado Satisfactoriamente", "alert" => "success");
        return redirect()->route('libroDiario.index')->with('success',$success);


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
