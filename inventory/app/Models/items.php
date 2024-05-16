<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class items extends Model
{
    use HasFactory;

    protected $fillable = ['items_name', 'items_quantity'];

    public function roomInventories()
    {
        return $this->hasMany(RoomInventory::class);
    }

    public function availableItem()
    {
        return $this->hasOne(availableItems::class);
    }
}
