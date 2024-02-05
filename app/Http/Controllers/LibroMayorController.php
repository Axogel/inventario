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


         return view("libroMayor.libro-diario-list", compact('resultados'));

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
}
