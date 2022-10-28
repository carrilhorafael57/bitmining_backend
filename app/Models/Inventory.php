<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'iron_ore',
        'bronze_ore',
        'silver_ore',
        'gold_ore',
        'diamond_ore'
    ];

     /**
     * Get the user associated with the inventory.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
