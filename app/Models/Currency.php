<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array|string[]
     */
    protected array $fillable = [
        'currency',
        'buy',
        'sell',
        'begins_at',
        'office_id'
    ];
}
