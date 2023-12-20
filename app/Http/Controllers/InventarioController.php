<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventario = Inventario::all();
        return view("inventario.index", compact("inventario"));
        //
    }
    public function disponible()
    {
        $inventario = Inventario::where("disponibilidad", 1)->get();
        return view("disponible.index", compact("inventario"));
    }
    public function alquilado()
    {
    $inventario = Inventario::where("disponibilidad", 0)->get();
    return view("alquilado.index", compact("inventario"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventario.create');
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

            $producto = new Inventario;
            $producto->nombre = $request->input('nombre');
            $producto->marca = $request->input('marca');
            $producto->talla = $request->input('talla');
            $producto->precio = $request->input('precio');
            $producto->tipo = $request->input('tipo');
            $producto->color = $request->input('color');
            $producto->disponibilidad = $request->has('disponibilidad') && $request->input('disponibilidad') === 'on' ? 0 : 1;
            $producto->alquiler = $request->input('disponibilidad') === 'on' ? Carbon::now() :  null; // Establecerá la fecha y hora actual

      
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
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventario = Inventario::find($id);
        return view('inventario.edit', compact('inventario'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inventario::find($id)->delete();
        return redirect()->route('inventario.index')->with('success','Producto Eliminado.');
    }
    public function exportExcel() {
        $data = Inventario::all();


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados de columna
        $columns = [
            'Columna1',
            'Columna2',
            // ...
            'ColumnaN',
        ];

        // Agregar encabezados a la hoja de cálculo
        foreach ($columns as $key => $column) {
            $sheet->setCellValueByColumnAndRow($key + 1, 1, $column);
        }

        // Agregar datos a la hoja de cálculo
        foreach ($data as $rowIndex => $rowData) {
            foreach ($rowData->toArray() as $columnIndex => $value) {
                // Convierte $columnIndex a un número antes de la suma
                $columnNumber = intval($columnIndex);
            
   
                // Asigna el resultado a la celda de la hoja de cálculo
                $sheet->setCellValueByColumnAndRow($columnNumber + 1, $rowIndex + 2,$value);
            }
            
        }

        // Guardar la hoja de cálculo en un archivo
        $writer = new Xlsx($spreadsheet);
        $filename = 'datos.xlsx';
        $path = 'exports/' . $filename;

        // Utilizar el método save para guardar el archivo
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('app/' . $path));

        // Descargar el archivo
        return response()->download(storage_path('app/' . $path))->deleteFileAfterSend(true);

    }
}
