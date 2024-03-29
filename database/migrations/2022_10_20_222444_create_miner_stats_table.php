<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('rarity');
            $table->integer('boost_level')->default(0);
            $table->dateTime('mining_start')->nullable();
            $table->dateTime('mining_end')->nullable();
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
