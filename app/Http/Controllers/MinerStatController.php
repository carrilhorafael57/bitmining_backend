<?php

namespace App\Http\Controllers;

use App\Models\MinerStat;
use Illuminate\Http\Request;
use App\Models\Miner;
use Carbon\Carbon;
use Illuminate\Http\MintMinerRequest;

class MinerStatController extends Controller
{
    /**
     * Display a listing of all miners that the player has.
     *
     * @return \Illuminate\Http\Response
     */
    public function allMiners(Request $request)
    {
        $miners = MinerStat::all()->where('user_id', $request->user_id);

        return $miners;
    }

    /**
     * Return the player miners inventory
     * Check if the ore amount is minimum of 100
     * 
     * @return \Illuminate\Http\Response
     */
    public function mintMiner(Request $request){

        if($request->ore_amount < 100){
            return;
        }

        $random = random_int(1,100);

        if($random >= 0 && $random < 70){
            $rarity_id = 1;
        }
        else if($random >= 70 && $random <= 90){
            $rarity_id = 2;
        }
        else if($random > 90 && $random <= 99){
            $rarity_id = 3;
        }
        else if($random == 100){
            $rarity_id = 4;
        }

        $miner = Miner::findOrFail($rarity_id);

        $minerMinted = MinerStat::create([
            'user_id' => $request->user_id,
            'rarity' => $miner->rarity,
            'boost_level' =>0,
            'mining_start' => now(),
            'mining_end' => now()
        ]);

        return $minerMinted;
    }
    /*
    *   Set the start mining and end mining times for a specific miner when the user 
    *   select a miner to start
    *  
    */
    public function startMining(Request $request){

        $miner = MinerStat::findOrFail($request->miner_id);

       // checkRarity($miner->rarity);

        switch($miner->rarity){
            case 'common':
                $boost_speed = 15;
                $mining_time = 1440;
                break;
            case 'rare':
                $boost_speed = 30;
                $mining_time = 1320;
                break;
            case 'ultra rare':
                $boost_speed = 45;
                $mining_time = 1200;
                break;
            case 'legendary':
                $boost_speed = 60;
                $mining_time = 1080;
                break;
        }

        switch($miner->boost_level){
            case 0:
                $miner->mining_start = now();
                $miner->mining_end = now()->addMinutes($mining_time - $boost_speed);
                break;
            case 1:
                $miner->mining_start = now();
                $miner->mining_end = now()->addMinutes($mining_time - ($boost_speed * 2));
                break;
            case 3:
                $miner->mining_start = now();
                $miner->mining_end = now()->addMinutes($mining_time - ($boost_speed * 3));
                break;
            case 4:
                $miner->mining_start = now();
                $miner->mining_end = now()->addMinutes($mining_time - ($boost_speed * 4));
                break;
        }

        $miner->save();

        return $miner;
    }

    

}

    /*
    *   Function that returns status based on miner rarity
    *
    */
    function checkRarity($rarity){
        switch($rarity){
            case 'common':
                $boost_speed = 15;
                $mining_time = 1440;
                break;
            case 'rare':
                $boost_speed = 30;
                $mining_time = 1320;
                break;
            case 'ultra rare':
                $boost_speed = 45;
                $mining_time = 1200;
                break;
            case 'legendary':
                $boost_speed = 60;
                $mining_time = 1080;
                break;

                //need to add return
    }


}