<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Region;
use App\User;
use Illuminate\Http\Request;



class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('region.index')->with("regions", $regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regions=Region::find($id);
        return  view('region.index',compact('regions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions = Region::find($id);
        return view('region.edit', compact(['regions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        return redirect()->route('region.index')->with('success','Region dropped');
    }
}
