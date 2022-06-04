<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piggy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'range',
        'owner_id'
    ];
}
