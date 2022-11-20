<?php

namespace App\Http\Controllers;

use App\Models\MinerStat;
use Illuminate\Http\Request;
use App\Models\Miner;
use App\Http\Requests\MintMinerRequest;
use App\Models\Inventory;

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
    public function mintMiner(MintMinerRequest $request){

        if($request->ore_amount < 100){
            return;
        }

        $rarity_id = $this->generateRarityId();

        $miner = Miner::findOrFail($rarity_id);

        $minerMinted = MinerStat::create([
            'user_id' => $request->user_id,
            'rarity' => $miner->rarity,
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

    public function receiveOre(Request $request){

        $miner = MinerStat::findOrFail($request->miner_id);

        $mining_finished =$this->checkMiningStatus($miner);
        
        if($mining_finished){
            $ore_received = $this->oreGenerator($miner->rarity);

            $updated_inventory = Inventory::where('user_id', $miner->user_id)->increment($ore_received, 1);
            return $updated_inventory;
        }


        //need to check this, because if the time wanst finished should return something?
        return false;

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

    private function checkMiningStatus($miner): bool
    {
        if(now()->gte($miner->mining_end)){
            return true;
        }

        return false;
    }

    private function oreGenerator($miner_rarity){

        $random = random_int(1,1000);

        if($miner_rarity == 'common'){
            if($random >= 1 && $random <= 700){
                $ore_to_receive = 'bronze_ore';
            }
            else if($random > 700 && $random <= 850){
                $ore_to_receive = 'iron_ore';
            }
            else if($random > 850 && $random <= 950){
                $ore_to_receive = 'silver_ore';
            }
            else if($random > 950 && $random <= 995){
                $ore_to_receive = 'gold_ore';
            }
            else{
                $ore_to_receive = 'diamond_ore';               
            }
        }
        else if($miner_rarity == 'rare'){
            if($random >= 1 && $random <= 650){
                $ore_to_receive = 'bronze_ore';
            }
            else if($random > 650 && $random <= 850){
                $ore_to_receive = 'iron_ore';
            }
            else if($random > 850 && $random <= 950){
                $ore_to_receive = 'silver_ore';
            }
            else if($random > 950 && $random <= 995){
                $ore_to_receive = 'gold_ore';
            }
            else{
                $ore_to_receive = 'diamond_ore';               
            }
        }
        else if($miner_rarity == 'ultra rare'){
            if($random >= 1 && $random <= 550){
                $ore_to_receive = 'bronze_ore';
            }
            else if($random > 550 && $random <= 750){
                $ore_to_receive = 'iron_ore';
            }
            else if($random > 750 && $random <= 900){
                $ore_to_receive = 'silver_ore';
            }
            else if($random > 900 && $random <= 995){
                $ore_to_receive = 'gold_ore';
            }
            else{
                $ore_to_receive = 'diamond_ore';               
            }
        }
        else if($miner_rarity == 'legendary'){
            if($random >= 1 && $random <= 450){
                $ore_to_receive = 'bronze_ore';
            }
            else if($random > 450 && $random <= 600){
                $ore_to_receive = 'iron_ore';
            }
            else if($random > 600 && $random <= 800){
                $ore_to_receive = 'silver_ore';
            }
            else if($random > 800 && $random <= 950){
                $ore_to_receive = 'gold_ore';
            }
            else{
                $ore_to_receive = 'diamond_ore';               
            }
        }
        
        return $ore_to_receive;
    }
}




