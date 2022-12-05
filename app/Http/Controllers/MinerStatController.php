<?php

namespace App\Http\Controllers;

use App\Models\MinerStat;
use Illuminate\Http\Request;
use App\Models\Miner;
use App\Http\Requests\MintMinerRequest;
use App\Http\Requests\MinerIdRequest;
use App\Models\Inventory;
use DateTime;

class MinerStatController extends Controller
{
    /**
     * Display a listing of all miners that the player has.
     *
     * @return \Illuminate\Http\Response
     */
    public function allMiners(MintMinerRequest $request)
    {
            $miners = MinerStat::all()->where('user_id', $request->user_id);
            if($miners){
                return $miners;
            }

    }

    /**
     * Return the player miners inventory
     * Check if the ore amount is minimum of 100
     *
     * @return \Illuminate\Http\Response
     */
    public function mintMiner(MintMinerRequest $request){
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
    // TODO: Form Request
    public function startMining(Request $request){

        return $this->mineStarted($request->miner_id);
    }

    public function receiveOre(MinerIdRequest $request){
        $miner = MinerStat::findOrFail($request->miner_id);

        if($this->checkMiningStatus($miner)){
            $ore_received = $this->oreGenerator($miner->rarity);
            Inventory::where('user_id', $miner->user_id)->increment($ore_received, 1);
            $this->resetMiningTimes($miner);

            $updated_inventory = Inventory::find($miner->user_id);

            return $updated_inventory;
        }
        else if(($miner->mining_start || $miner->mining_end) == null){
            return 'Miner is not mining';
        }
        
        return 'Not yet';
    }
    

    public function boost(MinerIdRequest $request){
        
        $miner = MinerStat::findOrFail($request->miner_id);
        //Need to check if current balance of minecoin in the wallet
        // $mineCoin_amount = balanceOf();
        if($miner->boost_level < 4){
            $miner->boost_level += 1;
        }
        
        $miner->save();
        
        return $miner;
    }
    

    public function checkMiningTimeLeft(MinerIdRequest $request)
    {
        $miner = MinerStat::findOrFail($request->miner_id);

        if($miner){
            if(now()->lte($miner->mining_end)){
                $timeCounter = now()->diffAsCarbonInterval($miner->mining_end);
            }
            else{
                $timeCounter = 0;
            }
            return $timeCounter;
        }
        else{
            return "Miner not found";
        }
    }

    public function cancelMining(Request $request){
        $this->resetMiningTimes($request->miner);

        return "Mining cancelled";
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
        return now()->gte($miner->mining_end);
    }


    private function oreGenerator($miner_rarity): string
    {
        $minerRarityValues = config('miner.rarity.'.$miner_rarity);

        return $this->getOreType($minerRarityValues);
    }

    private function getOreType($minerRarityValues): string
    {
        $random = random_int(1,1000);
        $oreValues = $minerRarityValues['ore'];
        $ore_to_receive = 'diamond_ore';

        if($random >= $oreValues['bronze_ore']['min'] && $random <= $oreValues['bronze_ore']['max']){
            $ore_to_receive = 'bronze_ore';
        }
        else if($random > $oreValues['iron_ore']['min'] && $random <= $oreValues['iron_ore']['max']){
            $ore_to_receive = 'iron_ore';
        }
        else if($random > $oreValues['silver_ore']['min'] && $random <= $oreValues['silver_ore']['max']){
            $ore_to_receive = 'silver_ore';
        }
        else if($random > $oreValues['gold_ore']['min'] && $random <= $oreValues['gold_ore']['max']){
            $ore_to_receive = 'gold_ore';
        }

        return $ore_to_receive;
    }

    private function resetMiningTimes($miner){
        $miner->mining_start = null;
        $miner->mining_end = null;
        $miner->save();
    }




}




