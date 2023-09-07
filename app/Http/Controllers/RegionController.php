<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('region.index')->with("regions", $regions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        $temp = new Region();
        $temp->name = $request->get('name');
        $temp->timestamps = true;
        $temp->last_modified_by = Auth::user()->id;
        $temp->save();

        return redirect()->route('region.index')->with('success','Region created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $regions=Region::find($id);
        return  view('region.index',compact('regions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $regions = Region::find($id);
        return view('region.edit', compact(['regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required']);
        $temp = Region::find($id);
        $temp->name = $request->get('name');
        $temp->last_modified_by = Auth::user()->id;
        $temp->timestamps = true;
        $temp->update();

        return redirect()->route('region.index')->with('success','Region update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        return redirect()->route('region.index')->with('success','Region dropped');
    }
}
