<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miner_stats', function (Blueprint $table) {
            $table->id('miner_id');
            $table->foreignId('uid');
            $table->integer('boost_level');
            $table->dateTime('mining_start');
            $table->dateTime('mining_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miner_stats');
    }
};
