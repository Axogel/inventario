<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::all();
        return view('site.index')->with("sites", $sites);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        return view('site.create')->with('regions', $regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['license_key'=>'required', 'Store_name'=>'required', 'Store_address'=>'required']);

        $temp = new Site();
        $temp->license_key = $request->get('license_key');
        $temp->store_name = $request->get('Store_name');
        $temp->store_address = $request->get('Store_address');
        $temp->region_id = $request->get('region');
        $temp->timestamps = true;
        $temp->last_modified_by = Auth::user()->id;
        $temp->save();

        return redirect()->route('site.index')->with('success','Site created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sites=Site::find($id);
        return  view('site.index',compact('sites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sites = Site::find($id);
        $regions = Region::all();
        return view('site.edit', compact(['sites', 'regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['license_key'=>'required', 'store_name'=>'required', 'store_address'=>'required']);

        $temp = Site::find($id);
        $temp->license_key = $request->get('license_key');
        $temp->store_name = $request->get('store_name');
        $temp->store_address = $request->get('store_address');
        $temp->region_id = $request->get('region');
        $temp->last_modified_by = Auth::user()->id;
        $temp->timestamps = true;
        $temp->update();

        return redirect()->route('site.index')->with('success','Site update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Site::find($id)->delete();
        return redirect()->route('site.index')->with('success','Site dropped');
    }
}
