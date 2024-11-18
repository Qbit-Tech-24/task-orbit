<?php

namespace App\Http\Controllers\Client;

use App\Models\ClientUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Client\User\CreateRequest;

class LoginController extends Controller
{
    public function registerPage(){
        return view('auth.client_register');
    }
    public function loginPage(){
        return view('auth.clientLogin');
    }
    public function clientRegister(CreateRequest $request)
    {
        $user = ClientUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);
        Auth::guard('clinetuser')->login($user);
        return redirect()->route('client.dashboard')->with('success', 'Registration successful!');
    }
    public function LoginClient(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::guard('clinetuser')->attempt($credentials)) {
            return redirect()->route('client.dashboard')->with('success', 'Login Successfully!!');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function ClientLogout(){
        Auth::guard('clinetuser')->logout();
        return redirect()->route('clientlogin.page')->with('success','Logout Successfully!!'); 
    }
}
