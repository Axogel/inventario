<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Region;
use App\Sale;
use Auth;
use Validator;
use Hash;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::join('regions', 'users.region_id', '=', 'regions.id')
                        ->get();
        
        //$users = User::all();
        return view('users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $stores = DB::table('sales')->groupBy('store_code')->get();
        $regions = Region::all();
        return view('users.create', compact( "roles", "stores", "regions"));
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
        $temp->last_name = $request->get('last_name');
        $temp->username = $request->get('username');
        $temp->email = $request->get('email');
        $temp->password = bcrypt($request->get('password'));
        $temp->role()->associate($request->get('role'));
        $temp->store_code = $request->get('store');
        $temp->region_id = $request->get('region');

        if($request->get('company_admin')== NULL){
            $temp->company_admin = 0;
        }else{
            $temp->company_admin = $request->get('company_admin');
        }
       
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
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [

            'current-password' => 'required',
            'password' => 'same:password',
            'password-confirmation' => 'same:password',
        ], $messages);

        return $validator;
    }

    public function postCredentials(Request $request)
    {
        if(Auth::Check()){
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);

            if($validator->fails()){
                return redirect()->route('profile')->with('success',array('error' => $validator->getMessageBag()->toArray()));
            }else{
                $current_password = Auth::User()->password;

                if(Hash::check($request_data['current-password'], $current_password)){
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->name = $request_data['name'];
                    $obj_user->email = $request_data['email'];
                    if(($request_data['password']) != null && ($request_data['password']) != '')
                    $obj_user->password = Hash::make($request_data['password']);
                    $obj_user->save();
                    return redirect()->route('profile')->with('success','User data update');
                }else{
                    return redirect()->route('profile')->with('success','Please enter correct current password');
                }
            }
        }else
            return redirect()->to('dashboard');
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
