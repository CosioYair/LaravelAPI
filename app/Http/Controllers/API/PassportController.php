<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controller
{
    public $successStatus = 200;
    public function login(request $request)
    {
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp');
        return response()->json(['success' => $success], $this->successStatus);
      }
      else{
        return response()->json(['error' => 'Usuario o contraseeña invalidos'], 401);
      }
    }
}
