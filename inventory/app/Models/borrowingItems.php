<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowingItems extends Model
{
    use HasFactory;
    public function borrower()
    {
        return $this->hasMany(Borrowers::class);
    }



    public function borrowedItems()
    {
        return $this->hasManyThrough(Rooms::class, Items::class);
    }
}
