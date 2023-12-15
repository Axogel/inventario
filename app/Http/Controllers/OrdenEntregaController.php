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
        //
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
        return view('orden.create');
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
