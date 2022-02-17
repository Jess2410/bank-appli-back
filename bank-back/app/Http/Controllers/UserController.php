<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    
    // {
    //     $user= User::where('email', $request->email)->first();
    //     // print_r($data);
    //         if (!$user || !Hash::check($request->password, $user->password)) {
    //             return response([
    //                 'message' => ['Les données saisies ne correspondent pas à celles enregistrées.']
    //             ], 404);
    //         }
        
    //          $token = $user->createToken('my-app-token')->plainTextToken;
        
    //         $response = [
    //             'user' => $user,
    //             'token' => $token
    //         ];
        
    //          return response($response, 201);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
//     {
//         try {
        
//         $user=User::create(['lastname'=>$request->lastname,
//                       'firstname'=>$request->firstname,
//                       'birthday'=>$request->birthday,
//                       'email'=>$request->email,
//                       'password' => Hash::make($request->password)
//                     ])->save();
//                     return response()->json($user);
// } catch (\Throwable $th) {
//     return response()->json([
//         'status' => 400,
//         'error' => 'Cet email est déjà utilisé.',
//         'msg' => $th->getMessage()
//     ]);
// }
//     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
