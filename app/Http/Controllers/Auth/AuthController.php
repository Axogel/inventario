<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request){
    	$request->validate([
    		'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
    	]);

    	$credentials = request(['email', 'password']);

    	if (!Auth::attempt($credentials))
            return response()->json(['error' => 'No auth', 'message' => 'Wrong user or password'], 401);

        $user = $request->user();

        //see the user tokenizer and implements with oauth
        /*
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();*/
        //unused while
        /*return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user'         => $user->load('role')
        ]);*/

        return view('blog-3');
    }

    public function register(Request $request){
        $request->validate([
            'first_name'  => 'required|string|max:100',
            'email'    => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:8|confirmed',
        ]);
        
        // \App\User::create([
        //     'email'    => $request->email,
        //     'password' => bcrypt($request->password),
        //     'role_id'  => 2
        // ])->sendEmailVerificationNotification();

        Mail::to($request->input('email'))->send(new MailConfirm(
            $request->input('first_name'),
            $request->input('email')
        ));

        return response()->json(['message' => 'Show your inbox to complete the register.'], 200);
    }

    public function confirm(Request $request, Event $evento){
        $request->validate([
            'email'    => 'required|string|email|max:255',
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ]);
    
        
        Mail::to($request->input('email'))->send(new MailConfirmarCupo(
            $evento,
            $request->input('email'),
            $request->input('first_name'),
            $request->input('last_name')
        ));

        return response()->json(['message' => 'Succeful'], 200);
    }


    public function logout(Request $request) {
        $request->user()->token()->revoke();
        
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function user(Request $request) {
        return response()->json($request->user());
    }

    public function sendPasswordResetLink(Request $request) {
        return $this->sendResetLinkEmail($request);
    }

    /**
    * Handle reset password 
    */
    public function callResetPassword(Request $request) {
        return $this->reset($request);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    **/
    protected function sendResetLinkResponse(Request $request, $response){
        return response()->json(['message' => 'Request to reset the password', 'data' => $response]);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Can`t send email'], 422);
    }

    protected function resetPassword($user, $password){
        $user->password = bcrypt($password);
        $user->save();

        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    **/
    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'The password has successfully been changed'], 200);
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    **/
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['error' => 'Failed param', 'message' => 'Invalid Token'], 422);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }
}
