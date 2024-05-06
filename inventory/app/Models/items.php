<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class items extends Model
{
    use HasFactory;

    protected $fillable = [

        'items_name',
        'items_quantity'
    ];

    protected $guarded = [
        'rooms_id'
    ];

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }
}
