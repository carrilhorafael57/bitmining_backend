<?php

namespace App\Http\Controllers;

use App\Models\MinerStat;
use Illuminate\Http\Request;

class MinerStatController extends Controller
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
     * @param  \App\Models\MinerStat  $minerStat
     * @return \Illuminate\Http\Response
     */
    public function show(MinerStat $minerStat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MinerStat  $minerStat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MinerStat $minerStat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MinerStat  $minerStat
     * @return \Illuminate\Http\Response
     */
    public function destroy(MinerStat $minerStat)
    {
        //
    }


    public function mintMiner(MintMinerRequest $mintMinerRequest){
        $minerMinted = MinerStat::create([
            $mintMinerRequest,
            random_int(1,4),
            '0',
            null,
            null
        ]);

        return $minerMinted->rarity;
    }
}
