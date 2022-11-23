<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinerStat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'rarity',
        'boost_level',
        'mining_start',
        'mining_end'
    ];

    /**
     * Get the user associated with the miner.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
