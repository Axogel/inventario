<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create')->with("roles", $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'email'=>'required', 'password'=>'required', 'direccion' => 'string', 'telefono' => 'string' ]);

        $temp = new User();
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->password = bcrypt($request->get('password'));
        $temp->role()->associate($request->get('role'));
        $temp->save();

        $content = new \stdClass();
        $content->receiver = $request->get('name');

        Mail::to($request->get('email'))->send(new WelcomeMail($request->get('email')));

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user::find($id);
        return  view('users.index',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        $roles = Role::all();
        return view('users.edit', compact(['user','roles']));
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
        $this->validate($request,[ 'name'=>'required', 'email'=>'required', 'role' => 'required']);

        $temp = User::find($id);
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->role()->associate($request->get('role'));
        $temp->save();

        if($request->get('role') == 1){
            return redirect()->route('users.index')->with('success','User update');
        }else{
            return redirect()->route('users.index')->with('success','Data update');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User dropped');
    }
}
