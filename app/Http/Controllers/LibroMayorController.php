<?php

namespace App\Http\Controllers;

use App\Models\LibroMayor;
use Carbon\Carbon;
use App\Models\LibroDiario;
use Illuminate\Http\Request;

class LibroMayorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $fecha = $request->input('fecha');

        if ($fecha) {
            $libroMayor = LibroMayor::where('ultimo_saldo', $fecha)->orderBy('ultimo_saldo')->get();
        } else {
            $libroMayor = LibroMayor::all();
        }

        return view('libroMayor.list', compact('libroMayor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libroMayor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'saldo.required' => 'El campo saldo es obligatorio.',
            'saldo.number' => 'El campo saldo debe ser un número.',
            'cuenta.required' => 'El campo cuenta es obligatorio.',
            'cuenta.string' => 'El campo cuenta debe ser una cadena de texto.',
            'icon.required' => 'El campo icono es obligatorio.',
            'icon.string' => 'El campo icono debe ser una cadena de texto.',
        ];
        
        $request->validate([
            'saldo' => 'required|numeric',
            'cuenta' => 'required|string',
            'icon' => 'required|string',
        ], $messages);

        $libroMayor = new LibroMayor;
        $libroMayor->saldo = $request->input('saldo');
        $libroMayor->saldo_inicial = $request->input('saldo');
        $libroMayor->cuenta = $request->input('cuenta');
        $libroMayor->icon = $request->input('icon');
        $libroMayor->tipo = $request->input('tipo');
        $libroMayor->ultimo_saldo = Carbon::now();
        $libroMayor->save();
        $success = array("message" => "Libro Mayor creado Satisfactoriamente", "alert" => "success");
        return redirect()->route('libroMayor.index')->with('success',$success);

        //
    }

    public function showLibroDiario($idMayor) {
         $resultados = LibroDiario::whereJsonContains('debeIdMayor', $idMayor)
         ->orWhereJsonContains('haberIdMayor', $idMayor)
         ->get();
         $libroMayor = LibroMayor::findOrFail($idMayor);
         $registrosRelacionados = [];
    
         foreach ($resultados as $libroDiario) {
             $debeIdMayorArray = $libroDiario->debeIdMayor;
             $haberIdMayorArray = $libroDiario->haberIdMayor;
     
             $registrosRelacionadosDebe = [];
             $registrosRelacionadosHaber = [];
     
             if (!is_null($debeIdMayorArray)) {
                 foreach ($debeIdMayorArray as $id) {
                     $registroRelacionadoDebe = LibroMayor::find($id);
                     $registrosRelacionadosDebe[] = $registroRelacionadoDebe;
                 }
             }
             if (!is_null($haberIdMayorArray)) {
             foreach ($haberIdMayorArray as $id) {
                 $registroRelacionadoHaber = LibroMayor::find($id);
                 $registrosRelacionadosHaber[] = $registroRelacionadoHaber;
             }
            }
     
             $registrosRelacionados[] = [
                 'debe' => $registrosRelacionadosDebe,
                 'haber' => $registrosRelacionadosHaber,
                 'libroDiario' => $libroDiario, 
             ];
            //  dd(  $registrosRelacionados[0]['haber']->id); 
         }


         return view("libroMayor.libro-diario-list", compact('resultados','libroMayor', 'registrosRelacionados'));

    }
//     public function calculateBalance($idMayor)
//     {
//         $libroMayor = LibroMayor::where("id", "=", $idMayor)->firstOrFail();
    
//         $ultimoDebe = LibroDiario::where('debeIdMayor', 'like', '%"'.$idMayor.'"%')->latest('created_at')->first();
//         $ultimoHaber = LibroDiario::where('haberIdMayor', 'like', '%"'.$idMayor.'"%')->latest('created_at')->first();
        

// // Comparar las fechas y determinar el resultado
// if ($ultimoDebe && $ultimoHaber) {
// if ($ultimoDebe->created_at > $ultimoHaber->created_at) {
//     $resultado = $ultimoDebe;
// } else {
//     $resultado = $ultimoHaber;
// }
// } elseif ($ultimoDebe) {
// $resultado = $ultimoDebe;
// } elseif ($ultimoHaber) {
// $resultado = $ultimoHaber;
// } else {
// $resultado = null;
// }

//     $debe = 0;
//     $haber = 0;
//     if($resultado->debeIdMayor){
//         foreach ($resultado->debeIdMayor as $key => $value) {
//             if($value == $idMayor){
//                 $sum = json_decode($resultado->debe, true)[$key];
//                 $debe +=  $sum ;
//             }

//         }
//         $debeString = json_decode($resultado->debe, true);

//     }
//     if($resultado->haberIdMayor){
//         foreach ($resultado->haberIdMayor as $key => $value) {
//             if($value == $idMayor){
//                 $sum = json_decode($resultado->haber, true)[$key];
//                 $haber +=  $sum ;
//             }

//         }
//     }

//     $libroMayor = LibroMayor::where("id", $idMayor)->firstOrFail();
//     if($libroMayor->tipo == "ingreso"){
//         $libroMayor->saldo = $libroMayor->saldo + ( $debe - $haber);
//     }else{
//         $libroMayor->saldo = $libroMayor->saldo + (-$debe + $haber);

//     }


//         $debe = 0;
//         $haber = 0;
//         if($resultado->debeIdMayor){
//             foreach ($resultado->debe as $key => $value) {
//                 # code...
//             }
//             $debeString = json_decode($resultado->debe, true);

//         }
//         if($resultado->haberIdMayor){

//         }
//         $debeIds = $resultado->debeIdMayor;
//         $haberIds = $resultado->haberIdMayor;
//         $haberString = json_decode($resultado->haber, true);



//         if (is_array($debeIds) ){
//             foreach ($debeIds as $id) {
//                 if(is_array($haberIds)){
//                     foreach ($haberIds as $haberId) {
//                         $libroDebe = LibroMayor::where("id", $id)->firstOrFail();
//                         $libroHaber = LibroMayor::where("id", $haberId)->firstOrFail();
//                         if ($libroDebe->tipo !=  $libroHaber->tipo) {
//                             if (in_array($idMayor, $debeIds)) {
//                                 if($debeString){
//                                     $debe -= array_sum($debeString);
//                                 }
//                             }

//                         } else {
//                             if (in_array($idMayor, $debeIds)) {
//                                 if($debeString){
//                                     $debe += array_sum($debeString);
//                                 }
//                             }
//                         }
//                         }

//                 }else{
//                     if (is_array($debeIds) && in_array($idMayor, $debeIds)) {
//                         if($debeString){
//                             $debe += array_sum($debeString);
//                         }
//                     }
//                 }
//             }
//         }
        
//         if (is_array($haberIds) ){
//             foreach ($haberIds as $id) {
//                 if(is_array($debeIds)){
//                     foreach ($debeIds as $debeId) {
//                         $libroDebe = LibroMayor::where("id", $debeId)->firstOrFail();
//                         $libroHaber = LibroMayor::where("id", $id)->firstOrFail();
//                         if ($libroDebe->tipo !=  $libroHaber->tipo) {
            
//                             if (in_array($idMayor, $haberIds)) {
//                                 if($haberString){
//                                     $haber += array_sum($haberString);

//                                 }
//                             }
//                         } else {
       
//                             if (in_array($idMayor, $haberIds)) {
//                                 if($haberString){
//                                     $haber += array_sum($haberString);

//                                 }
//                             }
//                         }
//                         }

//                 }else{
//                     if (is_array($haberIds) && in_array($idMayor, $haberIds)) {
//                         if($haberString){
//                             $haber += array_sum($haberString);

//                         }

//                     }
//                 }
//             }
//         }
//         // if (is_array($debeIds) && in_array($idMayor, $debeIds)) {
//         //     $debe += array_sum($debeString);
//         // }


//         // if (is_array($haberIds) && in_array($idMayor, $haberIds)) {
//         //     $haber += array_sum($haberString);
//         // }
    
//         // foreach ($resultados as $libro) {
//         //     $debeString = json_decode($libro->debe, true);
//         //     $debeIds = $libro->debeIdMayor;
//         //     $haberIds = $libro->haberIdMayor;
//         //     $haberString = json_decode($libro->haber, true);


   
//         //     if (is_array($debeIds) ){
//         //         foreach ($debeIds as $id) {
//         //             if(is_array($haberIds)){
//         //                 foreach ($haberIds as $haberId) {
//         //                     $libroDebe = LibroMayor::where("id", $id)->firstOrFail();
//         //                     $libroHaber = LibroMayor::where("id", $haberId)->firstOrFail();
//         //                     if ($libroDebe->tipo !=  $libroHaber->tipo) {
//         //                         if (in_array($idMayor, $debeIds)) {
//         //                             $debe -= array_sum($debeString);
//         //                         }

//         //                     } else {
//         //                         if (in_array($idMayor, $debeIds)) {
//         //                             $debe += array_sum($debeString);
//         //                         }
//         //                     }
//         //                     }

//         //             }else{
//         //                 if (is_array($debeIds) && in_array($idMayor, $debeIds)) {
//         //                     $debe += array_sum($debeString);
//         //                 }
//         //             }
//         //         }
//         //     }
            
//         //     if (is_array($haberIds) ){
//         //         foreach ($haberIds as $id) {
//         //             if(is_array($debeIds)){
//         //                 foreach ($debeIds as $debeId) {
//         //                     $libroDebe = LibroMayor::where("id", $debeId)->firstOrFail();
//         //                     $libroHaber = LibroMayor::where("id", $id)->firstOrFail();
//         //                     if ($libroDebe->tipo !=  $libroHaber->tipo) {
                
//         //                         if (in_array($idMayor, $haberIds)) {
//         //                             $haber += array_sum($haberString);
//         //                         }
//         //                     } else {
           
//         //                         if (in_array($idMayor, $haberIds)) {
//         //                             $haber += array_sum($haberString);
//         //                         }
//         //                     }
//         //                     }

//         //             }else{
//         //                 if (is_array($haberIds) && in_array($idMayor, $haberIds)) {
//         //                     $haber += array_sum($haberString);
//         //                 }
//         //             }
//         //         }
//         //     }
//         //     // if (is_array($debeIds) && in_array($idMayor, $debeIds)) {
//         //     //     $debe += array_sum($debeString);
//         //     // }
    
    
//         //     // if (is_array($haberIds) && in_array($idMayor, $haberIds)) {
//         //     //     $haber += array_sum($haberString);
//         //     // }
//         // }
    
//         if ($libroMayor->tipo == "egreso") {
//             $saldoFinal =   $libroMayor->saldo - (( -1*$debe) - $haber);
//         } else {
//             $saldoFinal =  $libroMayor->saldo + ($haber - $debe);
//         }
//         $libroMayor->saldo = $saldoFinal;
//         $libroMayor->save();
//     }


// try two
// public function calculateBalance($idMayor)
//     {
//         $registros = LibroDiario::all();

// // Inicializar arrays para sumar los valores de debe y haber por cuenta
// $debePorCuenta = [];
// $haberPorCuenta = [];

// // Recorrer los registros y sumar los valores a los arrays correspondientes
// foreach ($registros as $keytwo => $registro) {
//     if($registro->debeIdMayor){
//         foreach ($registro->debeIdMayor as $key => $cuenta ) {
//             $debePorCuenta[$cuenta] = ($debePorCuenta[$cuenta] ?? 0) +json_decode($registro->debe, true)[$key];
//         }
//     }

//     if($registro->haberIdMayor){
//         foreach ($registro->haberIdMayor as $key => $cuenta) {
//             $haberPorCuenta[$cuenta] = ($haberPorCuenta[$cuenta] ?? 0) +json_decode($registro->debe, true)[$key];
//         }
//     }



// }

// // Inicializar un array para el balance final por cuenta
// $balancePorCuenta = [];

// // Calcular el balance final restando los egresos de los ingresos
// foreach (array_keys($debePorCuenta + $haberPorCuenta) as $cuenta) {
//     $balancePorCuenta[$cuenta] = ($haberPorCuenta[$cuenta] ?? 0) - ($debePorCuenta[$cuenta] ?? 0);
// }
// dd($balancePorCuenta);
//     }
 public function calculateBalance($idMayor){
    
    $libroMayor = LibroMayor::where("id", "=", $idMayor)->firstOrFail();
    
    $ultimoDebe = LibroDiario::where('debeIdMayor', 'like', '%"'.$idMayor.'"%')->latest('created_at')->first();
    $ultimoHaber = LibroDiario::where('haberIdMayor', 'like', '%"'.$idMayor.'"%')->latest('created_at')->first();
    

// Comparar las fechas y determinar el resultado
if ($ultimoDebe && $ultimoHaber) {
if ($ultimoDebe->created_at > $ultimoHaber->created_at) {
$resultado = $ultimoDebe;
} else {
$resultado = $ultimoHaber;
}
} elseif ($ultimoDebe) {
$resultado = $ultimoDebe;
} elseif ($ultimoHaber) {
$resultado = $ultimoHaber;
} else {
$resultado = null;
}

$debe = 0;
$haber = 0;
if($resultado->debeIdMayor){
    foreach ($resultado->debeIdMayor as $key => $value) {
        $libroMayorDebe = LibroMayor::where("id", $value)->firstOrFail();
        if($resultado->haberIdMayor){
            foreach ($resultado->haberIdMayor as $keyarray => $contrario) {
                $libroMayorHaber = LibroMayor::where("id", $contrario)->firstOrFail();
                if($libroMayorHaber){
                    if($libroMayorHaber->tipo == $libroMayorDebe->tipo ){
                        if($value == $idMayor){
                            $sum = json_decode($resultado->debe, true)[$key];
                            $debe +=  $sum ;
                        }
                    }else{
                        if($value == $idMayor){
                            $sum = json_decode($resultado->debe, true)[$key];
                            $debe +=  $sum ;
                        }
                    }
                }
            }
        }else{
            if($value == $idMayor){
                $sum = json_decode($resultado->debe, true)[$key];
                $debe +=  $sum ;
            }  
        }
    }

}
if($resultado->haberIdMayor){
    foreach ($resultado->haberIdMayor as $key => $value) {
        $libroMayorHaber = LibroMayor::where("id", $value)->firstOrFail();
        if($resultado->debeIdMayor){
            foreach ($resultado->debeIdMayor as $keyarray => $contrario) {
                $libroMayorDebe = LibroMayor::where("id", $contrario)->firstOrFail();
                if($libroMayorDebe){
                    if($libroMayorHaber->tipo == $libroMayorDebe->tipo ){
                        if($value == $idMayor){
                            $sum = json_decode($resultado->haber, true)[$key];
                            $haber +=  $sum ;
                        }
                    }else{
                        if($value == $idMayor){
                            $sum = json_decode($resultado->haber, true)[$key];
                            $haber +=  $sum ;
                        }
                    }
                }    
            }
        }else{
            if($value == $idMayor){
                $sum = json_decode($resultado->haber, true)[$key];
                $haber +=  $sum ;
            }
        }
    }
}

$libroMayor = LibroMayor::where("id", $idMayor)->firstOrFail();
if($libroMayor->tipo == "ingreso"){

    $libroMayor->saldo = $libroMayor->saldo + ($debe - $haber);
}else{

    $libroMayor->saldo = $libroMayor->saldo + ($haber- $debe);

}
        $libroMayor->save();


 }


    public function destroy(LibroMayor $libroMayor)
    {
        $libroMayor->delete();
        return redirect()->route('libroMayor.index')->with('success', 'Libro Mayor Eliminado.');

    }

    public function edit($id) {
        $libro = LibroMayor::find($id);
        return view('libroMayor.edit', compact('libro'));

    }

    public function update (Request $request, $id) {

       $libro = LibroMayor::find($id);

       $libro->cuenta = $request->input('cuenta');
       $libro->icon = $request->input('icon');
       $libro->tipo = $request->input('tipo');

       $libro->save();

       return redirect()->route('libroMayor.index');
        
    }

    public function show() 
    {

    }
}
