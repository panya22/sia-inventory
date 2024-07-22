<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class items extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_quantity' ,
        'category',
        'unit_of_measure',
        'room_number',
        'school_level',
        'acceptedby',
        'items_needed',
        'borrowed_items',
        'overdue_items',
        'damaged_items'];
}
