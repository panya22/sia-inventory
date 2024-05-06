<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'rooms_num'
    ];
    protected $guarded = [
        'id'
    ];


    public function itemcon(): HasMany
    {
        return $this->hasMany(Items::class);
    }
}
