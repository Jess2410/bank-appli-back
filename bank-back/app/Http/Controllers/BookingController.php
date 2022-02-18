<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Agent;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        $booking = Booking::orderBy('bookingday')->get();
        return response()->json($booking);
    }
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
    public function store(Request $request)
    {
       
        // Liste des IDs de tous les agents
        $agents_ids = Agent::all()->pluck("id")->toArray();
        
        
        // Liste des IDs de tous les agents bookés
        $booked_agents_ids = Booking::where([['bookingday', $request->bookingday], ['bookinghour', $request->bookinghour]])->pluck("agent_id")->toArray();
   
        // Liste des IDs de tous les agents disponibles
        $available_agents_ids = array_diff($agents_ids, $booked_agents_ids);

        if(count($available_agents_ids) > 0) {
            $agent_index = rand(0, count($available_agents_ids) - 1);
            
            $booking=Booking::create(
                ['bookingday'=>$request->bookingday,
                'bookinghour'=>$request->bookinghour,
                //  'user_id'=>auth()->user(),
                'agent_id'=>$available_agents_ids[$agent_index],
                ])->save();

            return response()->json($booking);
        }

        return response()->json(["message" => "Aucun agent disponible"], 422);
    }

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
        //dans data, on récupère tout ce qu'il y a dans le formulaire
        $booking=Booking::create(['bookingday'=>$request->bookingday,
                                  'bookinghour'=>$request->bookinghour]);
        return response()->json($booking);
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
