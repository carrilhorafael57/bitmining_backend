<?php

namespace App\Http\Controllers;

use App\Models\MinerStat;
use Illuminate\Http\Request;
use App\Models\Miner;
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
     * Return the player object.
     *
     * @return \Illuminate\Http\Response
     */
    public function mintMiner(Request $request){

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
}