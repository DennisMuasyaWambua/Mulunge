<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    //
    public function register(Request $request){
        //validate data
        $data = $request->only('name', 'email', 'password');
        $validator = Validator::make($data,[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6|max:50'
        ]);

        //sending falied response if request is not valid
        if($validator->fails()){
            return response()->json(['error'=>$validator->messages()],200);
        }

        //request is valid create new user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        //user created return success response
        return response()->json([
            'success'=>true,
            'message'=>'user created successfully',
            'data'=>$user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        //valid credentials
        $validator = Validator::make($credentials, [
            'email'=>'required|email',
            'password'=>'required|string|min:6|max:50'
        ]);

        //send failed response if request is not valid 
        if($validator->fails()){
            return response()->json(['error'=>$validator->messages()], 200);
        }

        //request is validated create token
        try{
            if(!$token=JWTAuth::attempt($credentials)){
                return response()->json([
                    'success'=>false,
                    'message'=>'Log in credentials are invalid.',
                ], 400);
            }
        }catch(JWTException $e){
            return $credentials;
            return response()->json([
                'success'=>false,
                'message'=>'could not create token.',
            ], 500);
        }
         
        //token created , return with success response and jwt token
        return response()->json([
            'success'=>true,
            'token'=>$token,
        ]);
    }

    public function logout(Request $request){
        //valid credentials
        $validator = Validator::make($request->only($token),[
            'token'=>'required'
        ]);

        //send failed response if request is not valid
        if($validator->fails()){
            return response()->json(['error'=>$validator->messages()],200);
        }

        //request is validated do logout
        try{
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success'=>true,
                'message'=>'User has been logged out'
            ]);
        }catch(JWTException $exception){
            return response()->json([
                'success'=>false,
                'message'=>'Sorry, user cannot be logged out'
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function get_user(Request $request){
        $this->validate($request, [
            'token'=>'required'
        ]);
        $user=JWTAuth::authenticate($request->token);
        return response()->json(['User'=>$user]);
    }
}
