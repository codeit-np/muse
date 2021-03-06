<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //User Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',
            'is_admin' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->mobile = $request->mobile;
        $user->save();

        return response()->json([
            'message' => 'success'
        ],200);
    }
    //Login 

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        }

        $credentials = request(['email','password']);
        
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized user'
            ],500);
        }

        $user = User::where('email',$request->email)->first();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ],200);
    }

    //Logout

    public function logout(Request $request)        
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([

            'message' => 'success'
        ],200);
    }

    public function changepassword(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json(['message' => 'success']);
    }
}
