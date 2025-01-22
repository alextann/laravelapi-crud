<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //Register
    public function Register(Request $request) { 
        //return 'register'; 
        $fields = $request->validate([ 
            'name'=>'required', 
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed' 
        ]);
         $user = User::create($fields);
         $token = $user->createToken($request->name); 
         return[ 
            'user' => $user,
            //'token' => $token 
            'token' => $token->plainTextToken ];
         }
    //Login
    public function Login(Request $request){
        //return 'Register';
        $fields = $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password,
            $user->password)){
                return[
                    'message' => 'The credentials are not correct'
                ];
            }
            $token = $user->createToken($user->name);
            return[ 
                'user' => $user,
                'token' => $token->plainTextToken ];
        }   

    //Logout
    public function Logout(Request $request){
        //return 'Logout';
        $request->user()->tokens()->delete();
        return[
            'message' => 'You are logged out'
        ];
    }
}