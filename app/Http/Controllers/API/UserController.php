<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('auth', ['except' => 'login']);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){

        Auth::user()->token()->revoke();

        return response()->json(null, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function courses(Request $request)
    {
        $courses = $request->user()->courses()->get();

        return response()->json($courses);
    }
}
