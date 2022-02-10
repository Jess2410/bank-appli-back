<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/AuthController.php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{


public function register(Request $request)
{
$validatedData = $request->validate([
'name' => 'required|string|max:255',
                   'email' => 'required|string|email|max:255|unique:users',
                   'password' => 'required|string|min:8',
]);

      $user = User::create([
              'firstname' => $validatedData['firstname'],
              'lastname' => $validatedData['lastname'],
              'birthday' => $validatedData['birthday'],
                   'email' => $validatedData['email'],
                   'password' => Hash::make($validatedData['password']),
       ]);

    //    $user=User::create(['lastname'=>$request->lastname,
    //                   'firstname'=>$request->firstname,
    //                   'birthday'=>$request->birthday,
    //                   'email'=>$request->email,
    //                   'password' => Hash::make($request->password)
    //                 ])->save();
    //     return response()->json($user);

$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
              'access_token' => $token,
                   'token_type' => 'Bearer',
]);
}

public function login(Request $request)
{
if (!Auth::attempt($request->only('email', 'password'))) {
return response()->json([
'message' => 'Invalid login details'
           ], 401);
       }

$user = User::where('email', $request['email'])->firstOrFail();

$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
]);
}
public function me(Request $request)
{
return $request->user();
}
}

