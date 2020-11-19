<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salessummary()
    {
       
        return view('upload.salessummary')->with("upload");
    }

    public function comps()
    {
       
        return view('upload.comps')->with("upload");
    }

    public function voids()
    {
       
        return view('upload.voids')->with("upload");
    }
    public function promos()
    {
       
        return view('upload.promos')->with("upload");
    }
    public function payments()
    {
       
        return view('upload.payments')->with("upload");
    }
    public function mix()
    {
       
        return view('upload.mix')->with("upload");
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        
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
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
