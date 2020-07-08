<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * 
     */
    function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
            return response($response, 201);
    }

    /**
     * 
     */
    public function index(){
        $usuarios = User::all();

        return response()->json(['data' => $usuarios], 200);
    }

    /**
     * 
     */
    public function show($id){
        $usuario = User::findOrFail($id);

        return response()->json(['data' => $usuario], 200);
    }

    /**
     * 
     */
    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate( $request, $rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request['password']);
        $fields['imagen'] = null;
        $fields['rol'] = User::USUARIO_STUDENT;
        $fields['remember_token']= Str::random(10);

        $user = User::create($fields);

        $token = $user->createToken('my-app-token')->plainTextToken;
        
        $data = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json(['data' => $data], 200);
    }
}
