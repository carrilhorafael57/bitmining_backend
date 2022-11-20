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

        $rarity_id = $this->generateRarityId();

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

        return $this->mineStarted($request->miner_id);
    }

    private function mineStarted($minerId): MinerStat
    {
        $miner = MinerStat::findOrFail($minerId);
        $rarityValues = config('miner.rarity.'.$miner->rarity);
        $boost_speed = $rarityValues['boost_speed'];
        $mining_time = $rarityValues['mining_time'];
        $miner->mining_start = now();
        $defaultMultiplicator = 1;
        $boostSpeedLevel = $miner->boost_level + $defaultMultiplicator;
        $miner->mining_end = now()->addMinutes($mining_time - ($boost_speed * $boostSpeedLevel));
        $miner->save();

        return $miner;
    }

    private function generateRarityId(): int
    {
        $random = random_int(1,100);

        if($random >= 0 && $random < 70){
            return $rarity_id = 1;
        }
        else if($random >= 70 && $random <= 90){
            return  $rarity_id = 2;
        }
        else if($random > 90 && $random <= 99){
            return  $rarity_id = 3;
        }

        return $rarity_id = 4;
    }
}




