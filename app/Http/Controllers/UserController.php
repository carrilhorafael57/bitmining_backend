<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Http\Requests\CheckUserRequest;
use App\Models\MinerStat;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function checkUser(CheckUserRequest $request){

        if($user = User::where('wallet_address', $request->wallet_address)->get()->first())
        {
    
            return new UserResource($user);
        }
        else
        {
            $user = User::create([
                'wallet_address' => $request->wallet_address,
                'last_login' => now()
            ]);

            Inventory::create([
                'user_id' => $user->id,
                'iron_ore' => 0,
                'bronze_ore' => 0,
                'silver_ore' => 0,
                'gold_ore' => 0,
                'diamond_ore' => 0
            ]);

            MinerStat::create([
                'user_id' => $user->id,
                'rarity' => 'common',
            ]);

            MinerStat::create([
                'user_id' => $user->id,
                'rarity' => 'common',
            ]);



            return new UserResource($user);
        }
    }

    private function convertingAllOres($userId){
        $inventory = Inventory::find($userId);

        
        
        
    }
}
